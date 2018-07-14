<?php

namespace App\Repositories;

use App\Cours;
use App\Formation;
use App\Media;

class  CoursRepository implements CoursRepositoryInterface
{

	protected $cours;
	protected $media;
	protected $formationRepository;
	protected $mediaRepository;

	public function __construct(Cours $cours, FormationRepository $formationRepository,
	MediaRepository $mediaRepository, Media $media)
	{
		$this->cours = $cours;
		$this->media = $media;
		$this->mediaRepository = $mediaRepository;
		$this->formationRepository = $formationRepository;
	}

	public function save(Array $inputs)
	{
   		$cours = new Cours;
		$cours->label = $inputs['label'];
		$cours->type = $inputs['type'];
		$cours->description = $inputs['description'];
		//$cours->nbre_ok = isset($inputs['nbre_ok']);
		//$cours->nbre_ko = isset($inputs['nbre_ko']);
		//$cours->nbre_vue = isset($inputs['nbre_vue']);
		//$cours->formations_id =isset($inputs['formation_id']);
		//$cours->en_ligne = isset($inputs['en_ligne']) ? 1 : 0;
		$formation = $this->formationRepository->getById($inputs['formation_id']);
		$cours->formation()->associate($formation);

		$cours->save();

		return $cours;
	}

	public function getPaginate($n)
	{
		return $this->cours->paginate($n);
	}

	public function store(Array $inputs)
	{
		//$cours = new $this->cours;
		//$cours->en_ligne = 0;
		$cours = $this->save($inputs);
		return $cours;
	}

	public function getById($id)
	{
		return $this->cours->findOrFail($id);
	}

	//addMediaToPost($media, $post)
	public function addMediaToCours($media, $cours)
	{
		if(!($cours->media->contains($media)))
		{
			$cours->media()->attach($media);
		}
	}

	public function update(Array $inputs)
	{
    	$id = $inputs['id'];
		$cours = $this->getById($id);
    	$cours->label = $inputs['label'];
		$cours->type = $inputs['type'];
		$cours->description = $inputs['description'];
		$formation = $this->formationRepository->getById($inputs['formation_id']);
		$cours->formation()->associate($formation);

		$cours->save();

		$medias_id = $inputs['media_check'];
		foreach($medias_id as $media_id)
		{
			//Enregistrement du media dans cours
			//($media_id);
			$media = $this->mediaRepository->getById($media_id);
			/*
			*On ajoute le media au post que si ce media n'est pas déjà
			*dans ce post
			*/
			if(!($cours->medias->contains($media)))
			{
				$cours->medias()->attach($media);
			}
		}


    	return $cours;
	}
	public function updateStatus($id, Array $inputs)
	{
    $cours = new Cours;
    $cours = $this->getById($id);
		$cours->update($inputs);
	}

	public function getListMediaCours($id)
	{
		$cours = $this->getById($id);
		return $cours->medias;
	}

	public function destroyCoursMedia($cours_id, $media_id)
	{
		$cours = $this->getById($cours_id);
		$media = $this->mediaRepository->getById($media_id);
		$cours->medias()->detach($media);
	}


	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
