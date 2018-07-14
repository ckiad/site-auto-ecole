<?php

namespace App\Repositories;

use App\Post;
use App\Media;

class  PostRepository implements PostRepositoryInterface
{

	protected $post;
	protected $media;
	protected $mediaRepository;

    public function __construct(Post $post, Media $media, MediaRepository $mediaRepository)
	{
		$this->post = $post;
		$this->media = $media;
		$this->mediaRepository = $mediaRepository;
	}

	public function save(Array $inputs)
	{
		$post = new Post;
		$post->label = $inputs['label'];
		$post->contenu = $inputs['description'];
		//$post->date_creation = $inputs['date_creation'];
		//$post->enligne = $inputs['enligne'];
		$post->type = $inputs['type'];
		$post->url = $inputs['url'];
		$post->lieu = $inputs['lieu'];
		$post->save();

		return $post;
	}

	public function getPaginate($n)
	{
		return $this->post->paginate($n);
	}

	public function store(Array $inputs)
	{
		$post = new $this->post;
		//$post->enligne = 0;

		$post = $this->save($inputs);
		//$post->enligne = 0;

		return $post;
	}
//addMediaToPost($media, $post)
	public function addMediaToPost($media, $post)
	{
		if(!($post->media->contains($media)))
		{
			$post->media()->attach($media);
		}
	}

	public function getById($id)
	{
		return $this->post->findOrFail($id);
	}

	public function update(Array $inputs)
	{
		$id = $inputs['id'];
		$post = $this->getById($id);
		$post->label = $inputs['label'];
		$post->contenu = $inputs['description'];
		$post->type = $inputs['type'];
		$post->url = $inputs['url'];
		$post->lieu = $inputs['lieu'];
		$post->save();

		$medias_id = $inputs['media_check'];
		foreach($medias_id as $media_id)
		{
			//Enregistrement du media dans post
			//($media_id);
			$media = $this->mediaRepository->getById($media_id);
			/*
			*On ajoute le media au post que si ce media n'est pas déjà
			*dans ce post
			*/
			if(!($post->medias->contains($media)))
			{
				$post->medias()->attach($media);
			}
		}

		return $post;
	}

  public function updateStatus($id, Array $inputs)
	{
    $post = new Post;
    $post = $this->getById($id);
		$post->update($inputs);
	}

	public function getListMediaPost($id)
	{
		$post = $this->getById($id);
		return $post->medias;
	}

	public function destroyPostMedia($post_id, $media_id)
	{
		$post = $this->getById($post_id);
		$media = $this->mediaRepository->getById($media_id);
		$post->medias()->detach($media);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}


	
}
