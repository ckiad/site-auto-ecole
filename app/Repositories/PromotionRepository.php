<?php

namespace App\Repositories;

use App\Promotion;

class  PromotionRepository implements PromotionRepositoryInterface
{

    protected $promotion;

    public function __construct(Promotion $promotion)
	{
		$this->promotion = $promotion;
	}

	public function save(Array $inputs)
	{
		$promotion = new Promotion;

		$promotion->date_debut = $inputs['date_debut'];
		$promotion->duree = $inputs['duree'];
		$promotion->active = $inputs['active'];
		$promotion->montant = $inputs['montant'];
		$promotion->formation_id = $inputs['formation_id'];
				
		$promotion->save();
		return $promotion;
	}

	public function getPaginate($n)
	{
		return $this->promotion->paginate($n);
	}

	public function store(Array $inputs)
	{
		$promotion = new $this->promotion;		
		$this->save($inputs);
		return $promotion;
	}

	public function getById($id)
	{
		return $this->promotion->findOrFail($id);
	}

	public function update(Array $inputs)
	{
		$id = $inputs['id'];
		$promotion = $this->getById($id);
		$promotion->date_debut = $inputs['date_debut'];
		$promotion->duree = $inputs['duree'];
		$promotion->active = $inputs['active'];
		$promotion->montant = $inputs['montant'];
		$promotion->formation_id = $inputs['formation_id'];
				
		$promotion->save();

		return $promotion;
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

	public function unpublishPromotion($id){
		$promotion = $this->getById($id);
		$promotion->active = 0;
		$promotion->save();

	}

  	public function publishPromotion($id){
		$promotion = $this->getById($id);
		$promotion->active = 1;
		$promotion->save();

   	}

}