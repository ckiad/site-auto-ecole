<?php

namespace App\Http\Controllers;

use App\Post;
use App\Media;
use Sentinel;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;
use App\Repositories\MediaRepository;

class PostController extends Controller
{
    protected $postRepository;
    protected $mediaRepository;
    protected $nbreParPage=4;

    public function __construct(PostRepository $postRepository, MediaRepository $mediaRepository){
        $this->postRepository = $postRepository;
        $this->mediaRepository = $mediaRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts()
    {

	    $count = 1;
      if (session('statut')==="admin") {
        $posts = Post::where('enligne', '=', 1)->orWhere('enligne', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('admin/admin-gestion-posts',compact('posts','count'));
      } else {
        $posts = Post::where('enligne', '=', 1)->orderBy('created_at', 'desc')->get();
        return view('user/user-actualites',compact('posts','count'));
      }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPost()
    {
        $postToAdd = "add";
        return redirect('admin/admin-posts')->with(['postToAdd'=>$postToAdd]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postaddPost(Request $request)
    {
       $pagetitle = 'Ajouter une formation';
       // dd($request->all());
       $post = $this->postRepository->store($request->all());
      // $user = Sentinel::getUser();
       $message = "Le Post  " . $post->label ." a été créé avec succès.";
       return redirect('admin/admin-posts')->with(['message'=>$message]);/*'user','pagetitle',*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost($id)
    {
        $postToDisplay = $this->postRepository->getById($id);
        return redirect('admin/admin-posts')->with(['postToDisplay'=>$postToDisplay]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost($id)
    {
        $postToUpdate = $this->postRepository->getById($id);
        /*
        *Il faut aussi afficher du même cout les medias qui sont déjà dans le post
        */
        $medias_post = $this->postRepository->getListMediaPost($id);
        $count_media_post = $medias_post->count();

        /*
        *Il faut la liste des medias des medias disponibles pour qu'il puisse choisir ce qu'il
        * peut augmenter au post
        */
        $medias = $this->mediaRepository->getListMedia();
        //dd($cours);

        return redirect('admin/admin-posts')->with(['postToUpdate'=>$postToUpdate, 
        'medias_post'=>$medias_post, 'count_media_post'=>$count_media_post, 'medias'=>$medias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postupdatePost(PostRequest $request)
    {
        $postToUpdate = $this->postRepository->update($request->all());
        $message = "Le Post  " . $postToUpdate->label ." a été mise à jour avec succès.";
        $request->session()->forget('postToUpdate');
        $request->session()->forget('medias');
        return redirect('admin/admin-posts')->with(['message'=>$message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePost($id)
    {
        $this->postRepository->destroy($id);
        return redirect()->back();
    }

    public function nbreVuPost($id)
    {
        $post = $this->postRepository->getById($id);
        $this->postRepository->updateStatus($id,['nbrevu'=>$post->nbrevu+1]);
        return back();
    }
    public function nbreOkPost($id)
    {
        $post = $this->postRepository->getById($id);
        $this->postRepository->updateStatus($id,['nbreok'=>$post->nbreok+1]);
        return back();
    }
    public function nbreKoPost($id)
    {
        $post = $this->postRepository->getById($id);
        $this->postRepository->updateStatus($id,['nbreko'=>$post->nbreko+1]);
        return back();
    }
    public function onlinePost($id)
    {
        $this->postRepository->updateStatus($id,['enligne'=>1]);
        return redirect()->back();
    }
    public function offlinePost($id)
    {
        $this->postRepository->updateStatus($id,['enligne'=>0]);
        return redirect()->back();
    }

    public function deletePostMedia($post_id, $media_id)
    {
        $this->postRepository->destroyPostMedia($cours_id, $media_id);
        return redirect()->back();
    }


}
