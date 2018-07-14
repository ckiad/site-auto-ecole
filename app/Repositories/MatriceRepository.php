<?php

namespace App\Repositories;

use App\Matrice;
use App\Repositories\UserRepository;

class  MatriceRepository 
{

	protected $matrice;
	protected $userRepository;

    public function __construct(Matrice $matrice, UserRepository $userRepository)
	{
		$this->matrice = $matrice;
		$this->userRepository = $userRepository;
	}

	public function save($nbre_fils_enreg, $active, $user_id)
	{
		$matrice = new Matrice;
		$matrice->nombre_fils_enreg = $nbre_fils_enreg;
		$matrice->active = $active;

		$user = $this->userRepository->getById($user_id);
		$matrice->user()->associate($user);

		$matrice->save();
		
		return $matrice;
	}

	public function ajouteMatriceActiveIfNotExist($nbre_fils_enreg, $active, $user_id)
	{
		$user = $this->userRepository->getById($user_id);
		$matrices = $user->matrices;
		//dd($matrices);
		$trouve = 0;
		foreach($matrices as $matrice)
		{
			if($matrice->active == true)
			{
				$trouve = 1;
				return $matrice;
			}
				
		}
		if($trouve == 0)
		{
			/**
			 * Alors on doit ajouter une matrice de plus pour l'utilisateur car soit il entre 
			 * dans le réseau pour la premère fois soit il a déjà parcouru les niveaux 1, 2, 3 et doit 
			 * donc recommencer à 0.
			 */
			return $this->save($nbre_fils_enreg, $active, $user_id);
		}
	}

	public function getPaginate($n)
	{
		
	}

	public function store(Array $inputs)
	{
		
	}

	public function getById($id)
	{
		return $this->matrice->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		
	}

	public function destroy($id)
	{
		
	}

	//Ajout de ckiadjeu
	public function getProchainNumeroUsersPourReseau($user)
	{
		//dd($user);
		$matrices = $user->matrices;
		//dd($user->matrices);
		$trouve = 0;
		if($matrices != null)
		{
			foreach($matrices as $matrice)
			{
				if($matrice->active == true)
				{
					$trouve = 1;
					return $user->numero_nw;
				}
			}
		}
		
		if($trouve == 0)
		{
			$matrices = Matrice :: all();
			return $matrices->count()+1;
		}
	}

	public function getActiveMatriceUsers($user_numero_nw)
	{
		$user = $this->userRepository->findUserByNumero_NW($user_numero_nw);
		$matrices = $user->matrices;
		foreach($matrices as $matrice)
		{
			if($matrice->active == true)
			{
				$trouve = 1;
				return $matrice;
			}
				
		}
		return null;
	}

	public function getMatriceUsers($user_numero_nw)
	{

	}

	public function incrementeNbreFilsEnreg($matrice)
	{
		$matrice->nombre_fils_enreg = $matrice->nombre_fils_enreg + 1;

		$matrice->save();
		
		return $matrice;

	}

	public function desactiveMatrice($id)
	{
		$matrice = $this->getById($id);
		$matrice->active = false;
		$matrice->save();
		return $matrice;
	}

	public function addUserInNetwork($user_id)
	{
		$user = $this->userRepository->getById($user_id);
		//Calcul du numéro que le user aura dans le réseau
		$numero_nw = $this->getProchainNumeroUsersPourReseau($user);
		//dd($numero_nw);
		//Il faut mettre à jour le numero du user dans le réseau
		$user = $this->userRepository->updateNumeroNW($user->id, $numero_nw);
		//dd($user->numero_nw);
		/**
		 * On ajoute donc une matrice active pour l'user dans le réseau avec son nombre fils à 1 
		 * car il est lui meme compté
		 */
		$nbre_fils_enreg = 1;
		$active = true;
		$matrice_user = $this->ajouteMatriceActiveIfNotExist($nbre_fils_enreg, $active, $user->id);
		//dd($matrice_user);
		/**
		 * maintenant que le user est dans le réseau après le paiement de sa souscription, il faut 
		 * que les users qui sont arrivé avant lui dans le réseau subissent des changement dans leurs 
		 * matrices respectives selon l'algorithme. 
		 * Il faut déjà connaitre son père dans le réseau car c'est lui le premier qui subira la modification 
		 */
		$numero_user_pere_in_reseau = intval(intval($user->numero_nw) /2);
		//dd($numero_user_pere_in_reseau);
		//dd($this->userRepository->findUserByNumero_NW(1));
		while($numero_user_pere_in_reseau != 0)
		{
			/**
			 * Plusieurs utilisateurs ne peuvent avoir le même numéro une fois introduit dans la matrice
			 */
			
			$matrice_user_pere = $this->getActiveMatriceUsers($numero_user_pere_in_reseau);
			if($matrice_user_pere == null) break;

			$user_pere = $this->userRepository->findUserByNumero_NW($numero_user_pere_in_reseau);

			$matrice_user_pere = $this->incrementeNbreFilsEnreg($matrice_user_pere);

			$n1 = 4 * intval($numero_user_pere_in_reseau) + 3;
			$n2 = 16 * intval($numero_user_pere_in_reseau) + 15;
			$n3 = 64 * intval($numero_user_pere_in_reseau) + 63;
			$n4 = 256 * intval($numero_user_pere_in_reseau) + 255;

			if($user->numero_nw == $n1)
			{
				$new_niveau = 1;
				$user_pere = $this->userRepository->updateNiveau($user_pere->id, $new_niveau);
			}
			else if($user->numero_nw == $n2)
			{
				$new_niveau = 2;
				$user_pere = $this->userRepository->updateNiveau($user_pere->id, $new_niveau);
			}
			else if($user->numero_nw == $n3)
			{
				$new_niveau = 3;
				$user_pere = $this->userRepository->updateNiveau($user_pere->id, $new_niveau);
			}
			else if($user->numero_nw == $n4)
			{
				/**
				 * Le niveau 3 a été franchi donc l'user doit sortir du réseau
				 * pour cela il faut simplement que sa matrice soit desactiver, 
				 * son niveau soit remi à 0, son numero_nw à 0 ainsi il devra repayer 
				 * une souscription pour rentrer dans le réseau.
				 */
				$new_niveau = 0;
				$user_pere = $this->userRepository->updateNiveau($user_pere->id, $new_niveau);
				$new_numero_nw = 0;
				$user_pere = $this->userRepository->updateNumeroNW($user_pere->id, $new_numero_nw);
				$matrice_desactivee = $this->desactiveMatrice($matrice_user_pere->id);
			}

			$numero_user_pere_in_reseau = intval($numero_user_pere_in_reseau/2);
		}
		return 1;
		//dd('user dans le reseau et réseau à jour et on doit redirectionner vers la page qui affiche sa matrice');
	}

	public function getReseauUser($user_id)
	{
		$user = $this->userRepository->getById($user_id);
	}

}
