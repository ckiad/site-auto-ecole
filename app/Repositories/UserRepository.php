<?php

namespace App\Repositories;

use App\User;
use Sentinel;

class  UserRepository implements UserRepositoryInterface
{

    protected $user;

    public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function save(User $user, Array $inputs)
	{
		$user->nom = $inputs['nom'];
		$user->prenom = $inputs['prenom'];
		$user->datenaiss = $inputs['datenaiss'];
		$user->login = $inputs['email'];
		$user->email = $inputs['email'];
		$user->tel = $inputs['tel'];
		$user->num_cni = $inputs['num_cni'];
		$user->actif = $inputs['actif'];
		$user->nationalite = $inputs['nationalite'];
		$user->numero_NW = $inputs['numero_NW'];
		$user->password = $inputs['password'];

		$user->pays = $inputs['pays'];
		$user->langue = $inputs['langue'];
		$user->ville = $inputs['ville'];
		$user->region = $inputs['region'];
		$user->password = $inputs['password'];


		$user->save();
	}

	public function getPaginate($n)
	{
		return $this->user->paginate($n);
	}

	public function store(Array $inputs)
	{
		$user = new $this->user;
		$user->password = bcrypt($inputs['password']);

		$this->save($user, $inputs);

		return $user;
	}

	public function getById($id)
	{
		return $this->user->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

	public function findUserByName($nom)
    {
        return $this->user->findUserByName($nom);

    }

    public function findUserByCNI($cni)
    {
        return $this->user->findUserByCNI($cni);
    }

    public function findUserByPhone($phone)
    {
        return $this->user->findUserByPhone($phone);
    }

    public function findUserByMail($mail)
    {
        return $this->user->findUserByMail($mail);
	}

	public function listerApprenants()
    {
		//on recupere le role de l'utilisateur
		$role = Sentinel::findRoleBySlug("apprenant");
		//on fabrique une liste d'apprenants ayant le slug specifié
		$apprenants = $role->users()->get();
        return $apprenants;
	}

	public function listerMarketeurs()
	{
		$role = Sentinel::findRoleBySlug("marketeur");

		$marketeurs = $role->users()->get();
		return $marketeurs;
	}

	//Ajout de ckiadjeu
	public function getPartenaires($id)
	{
		$partenaires = User::all()->where('lien_invitation',''.$id);
		return $partenaires;
	}

	public function paiementSouscription($telephone)
	{
		/*
		*Toutes les méthodes de l'api de paiement seront appele depuis cette méthode
		*le parametre telephone désigne finalement le compte qui sera débité pour effectuer le paiement
		*Une fois le paiement effectif la methode devra retourner true et false si une erreur s'est produite
		*avec le code de l'erreur dans la session pour qu'il soit signaler à l'utilisateur. 
		*/
		return true;
	}

	public function updateNiveau($id, $niveau)
	{
		$user = $this->getById($id);
		$user->niveau_reseau = $niveau;

		$user->save();
		return $user;
	}

	public function updateNombreInvite($id, $nbre_invite)
	{
		$user = $this->getById($id);
		$user->nbre_invite = $nbre_invite;

		$user->save();
		return $user;
	}

	public function updateNumeroNW($id, $numero_nw)
	{
		$user = $this->getById($id);
		$user->numero_nw = $numero_nw;

		$user->save();
		return $user;
	}

	public function findUserByNumero_NW($numero_nw)
	{
		/**
		* Plusieurs utilisateurs ne peuvent avoir le même numéro une fois introduit dans la matrice
		*/
		$user = User::where('numero_nw', $numero_nw)->first();
		return $user;
	}

}
