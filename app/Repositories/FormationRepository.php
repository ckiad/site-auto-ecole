<?php

namespace App\Repositories;

use App\Formation;

class  FormationRepository implements FormationRepositoryInterface
{

    protected $formation;

    public function __construct(Formation $formation)
	{
		$this->formation = $formation;
	}

	public function save(Array $inputs)
	{
		$formation = new Formation;
		$formation->label = $inputs['label'];
		$formation->description = $inputs['description'];
		//$formation->montant = isset($inputs['montant']);
		$formation->montant = floatval($inputs['montant']);
		$formation->save();
		return $formation;
	}

	public function getPaginate($n)
	{
		return $this->formation->paginate($n);
	}

	public function store(Array $inputs)
	{
		$formation = new $this->formation;
		//$formation->en_ligne = 0;

		$this->save($inputs);
		return $formation;
	}

	public function getById($id)
	{
		return $this->formation->findOrFail($id);
	}

	public function update(Array $inputs)
	{
		$id = $inputs['id'];
		$formation = $this->getById($id);
		$formation->label = $inputs['label'];
		$formation->description = $inputs['description'];
		//$formation->montant = isset($inputs['montant']);
		$formation->montant = floatval($inputs['montant']);
		$formation->save();
		return $formation;
	}

  public function updateStatus($id, Array $inputs)
	{
    $formation = new Formation;
    $formation = $this->getById($id);
		$formation->update($inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
