<?php

namespace App\Repositories;

use App\Temoignage;
use App\User;

class  TemoignageRepository implements TemoignageRepositoryInterface
{

    protected $temoignage;
    protected $userRepository;

    public function __construct(Temoignage $temoignage, UserRepository $userRepository)
	{
		$this->temoignage = $temoignage;
    $this->userRepository = $userRepository;
	}

	public function save(Temoignage $temoignage, Array $inputs)
	{
		$temoignage->contenu = $inputs['contenu'];
		$temoignage->nbreok = $inputs['nbreok'];
		$temoignage->nbreko = $inputs['nbreko'];
		$temoignage->date = $inputs['date'];
		$temoignage->en_ligne = $inputs['en_ligne'];

		//$temoignage->user_id = $inputs[$iduser];
    $user = $this->userRepository->getById($inputs['user_id']);
		$temoignage->user()->associate($user);

		$temoignage->save();
	}

	public function getPaginate($n)
	{
		return $this->temoignage->paginate($n);
	}

	public function store(Array $inputs)
	{
		$temoignage = new $this->temoignage;
		$temoignage->en_ligne = 1;//On a décider que les témoignages doivent etre publier par défaut

		$this->save($temoignage, $inputs);

		return $temoignage;
	}

	public function getById($id)
	{
		return $this->temoignage->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
    $temoignage = $this->getById($id);
    if(isset($inputs['contenu']) == true)
    {
      $temoignage->contenu = $inputs['contenu'];
    }

    if(isset($inputs['nbrevu']) == true)
    {
      $temoignage->nbrevu = $inputs['nbrevu'];
    }

    if(isset($inputs['nbreok']) == true)
    {
      $temoignage->nbreok = $inputs['nbreok'];
    }

    if(isset($inputs['nbreko']) == true)
    {
      $temoignage->nbreko = $inputs['nbreko'];
    }

    if(isset($inputs['date']) == true)
    {
      $temoignage->date = $inputs['date'];
    }

    if(isset($inputs['en_ligne']) == true)
    {
      $temoignage->en_ligne = $inputs['en_ligne'];
    }

		//$temoignage->user_id = $inputs[$iduser];
    if(isset($inputs['user_id']) == true)
    {
      $user = $this->userRepository->getById($inputs['user_id']);
  		$temoignage->user()->associate($user);
    }

		$temoignage->save();
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

  public function getTemoignagesRecent($n)
  {
    $temoignages = Temoignage::where('en_ligne', true)->orderBy('created_at', 'desc')->limit($n)->get();
    return $temoignages;
  }

}
