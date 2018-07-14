<?php

namespace App\Repositories;

use App\Parametre;

class  ParametreRepository implements ParametreRepositoryInterface
{

    protected $parametre;

    public function __construct(Parametre $parametre)
	{
		$this->parametre = $parametre;
	}

	public function save(Parametre $parametre, Array $inputs)
	{
		$parametre->cle = $inputs['cle'];
		$parametre->valeur = $inputs['valeur'];
		$parametre->date_debut = $inputs['date_debut'];
		$parametre->date_fin = $inputs['date_fin'];
				
		$parametre->save();
	}

	public function getPaginate($n)
	{
		return $this->parametre->paginate($n);
	}

	public function store(Array $inputs)
	{
		$parametre = new $this->parametre;		
		$parametre->en_ligne = 0;

		$this->save($parametre, $inputs);

		return $parametre;
	}

	public function getById($id)
	{
		return $this->parametre->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}