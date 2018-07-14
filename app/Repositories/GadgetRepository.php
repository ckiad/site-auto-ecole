<?php

namespace App\Repositories;

use App\Gadget;

class  GadgetRepository implements GadgetRepositoryInterface
{
    protected $gadget;

    public function __construct(Gadget $gadget)
	{
		$this->gadget = $gadget;
	}

	public function save(Array $inputs, $photo)
	{
		$newGadget = new Gadget;
		$newGadget->label = $inputs['label'];
		$newGadget->valeur = $inputs['valeur'];
		$newGadget->description = $inputs['description'];
		$newGadget->photo = $photo;
		$newGadget->type = $inputs['type'];

		$newGadget->save();

		return $newGadget;
	}

	public function getPaginate($n)
	{
		return $this->gadget->paginate($n);
	}

	public function getAllGadget(){
		return Gadget :: all();
	}

	public function store(Array $inputs, $photo)
	{

		$gadget = $this->save($inputs, $photo);

		return $gadget;
	}

	public function getById($id)
	{
		return $this->gadget->findOrFail($id);
	}

	public function update(Array $inputs, $photo)
	{
		$id = $inputs['id'];
		$gadgetToUpdate = $this->getById($id);
		//$this->save($this->getById($id), $inputs);
		$gadgetToUpdate->label = $inputs['label'];
		$gadgetToUpdate->valeur = $inputs['valeur'];
		$gadgetToUpdate->description = $inputs['description'];
		$gadgetToUpdate->photo = $photo;
		$gadgetToUpdate->type = $inputs['type'];

		$gadgetToUpdate->save();

		return $gadgetToUpdate;
	}

	public function updateSansPhotos(Array $inputs)
	{
		$id = $inputs['id'];
		$gadgetToUpdate = $this->getById($id);
		//$this->save($this->getById($id), $inputs);
		$gadgetToUpdate->label = $inputs['label'];
		$gadgetToUpdate->valeur = $inputs['valeur'];
		$gadgetToUpdate->description = $inputs['description'];
		$gadgetToUpdate->type = $inputs['type'];

		$gadgetToUpdate->save();

		return $gadgetToUpdate;
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
