<?php

namespace App\Repositories;

use App\Media;

class  MediaRepository implements MediaRepositoryInterface
{
    protected $media;

    public function __construct(Media $media)
	{
		$this->media = $media;
	}

	public function save(Array $inputs, $fichier)
	{
		$media = new Media;
		$media->label = $inputs['label'];
		$media->fichier = $fichier;	
		$media->type = $inputs['type'];		
		$media->save();

		return $media;
	}

	public function getPaginate($n)
	{
		return $this->media->paginate($n);
	}

	public function getListMedia()
	{
		return Media::all();//->take(10);
	}

	public function store(Array $inputs, $fichier)
	{
		$media = $this->save($inputs, $fichier);

		return $media;
	}
	
	public function getById($id)
	{
		return $this->media->findOrFail($id);
	}

	public function update(Array $inputs, $fichier)
	{
		$id = $inputs['id'];
		$mediaToUpdate = $this->getById($id);
		$mediaToUpdate->label = $inputd['label'];
		$mediaToUpdate->fichier = $fichier;
		$mediaToUpdate->type = $inputs['type'];
		$mediaToUpdate->save();
		return $mediaToUpdate;
	}

	public function updateSansFichier(Array $inputs)
	{
		$id = $inputs['id'];
		$mediaToUpdate = $this->getById($id);

		$mediaToUpdate->label = $inputd['label'];
		$mediaToUpdate->type = $inputs['type'];

		$mediaToUpdate->save();
		return $mediaToUpdate;
	}

	public function destroy($id)
	{
		$media = $this->post->findOrFail($id);
		$media->posts()->detach();
		$media->delete();
	}

}