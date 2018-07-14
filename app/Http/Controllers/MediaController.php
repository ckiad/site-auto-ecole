<?php

namespace App\Http\Controllers;

use Sentinel;
use App\Media;
use Illuminate\Http\Request;
use App\Repositories\MediaRepository;
use App\Repositories\PostRepository;
use App\Repositories\CoursRepository;
use App\Http\Requests\MediaRequest;
use App\Utils\FileManager;

class MediaController extends Controller
{
    protected $mediaRepository;
    protected $nbreParPage = 4;

    public function __construct(MediaRepository $mediaRepository){
        $this->mediaRepository = $mediaRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //on liste ici tous les medias disponible dans la bd
    public function getMedias()
    {
        $medias = $this->mediaRepository->getListMedia();
        $nbreMedia = $medias->count();
        $count = 1;
        return view('admin/admin-gestion-medias')->with(['medias'=>$medias,
         '$nbreMedia' => $nbreMedia, 'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addMedia()
    {
        $mediaToAdd = "add";
        return redirect('admin/admin-medias')->with(['mediaToAdd'=>$mediaToAdd]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaRequest $request, $fichier)
    {
        $media = $this->mediaRepository->store($request->all(), $fichier);
        return $media;
    }

    public function postaddMedia(MediaRequest $request, FileManager $fileManager)
    {
        //on specifie le nom du repertoire pour uploader
        $dest_folder ="medias";
        $nomFichier = $fileManager->uploadFichier($request->file('fichier'),$dest_folder);

        if($nomFichier !== "")
        {
            $media = $this->store($request, $nomFichier);
            $message = "le media ".$media->label." à été créé avec succès.";
            return redirect('admin/admin-medias')->with(['message'=>$message]);
        }
        $error = "Votre fichier n'a pas été envoyé !!! veuillez reessayer ";
        return redirect('admin/admin-medias')->with(['error'=>$error]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMedia($id)
    {
        $mediaToDisplay = $this->mediaRepository->getById($id);

        return redirect('admin/admin-medias')->with(['mediaToDisplay'=>$mediaToDisplay]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMedia($id)
    {
        $mediaToUpdate = $this->mediaRepository->getById($id);
        return redirect('admin/admin-medias')->with(['mediaToUpdate'=>$mediaToUpdate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postupdateMedia(Request $request, FileManager $fileManager)
    {
        $dest_folder = "medias";
        if($request->file('fichier')!=null)
        {
            $nomFichier = $fileManager->upload($request->file('fichier'), $dest_folder);
            if($nomFichier!== "")
            {
                $mediaUpdate = $this->mediaRepository->update($request->all(),$nomFichier);

                $message = "Le media  a été modifié avec succès. Consulter la liste pour confirmer";

                $request->session()->forget('mediaToUpdate');

                return redirect('admin/admin-medias')->with(['message'=>$message]);
            }
            
        }else{
            $mediaUpdate = $this->mediaRepository->updateSansFichier($request->all());

            $message = "Le media  a été modifié avec succès. Consulter la liste pour confirmer";

            $request->session()->forget('mediaToUpdate');

            return redirect('admin/admin-medias')->with(['message'=>$message]);
        }
        $error = "Le fichier n'a pas pue être chargée !";
        return redirect('admin/admin-medias')->with(['error'=>$error]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->mediaRepository->destroy($id);
        return redirect()->back();
    }

    public function nbreVuMedia($id)
    {
        $media = $this->mediaRepository->getById($id);
        $this->mediaRepository->updateStatus($id,['nbre_vu'=>$post->nbrevu+1]);
        return redirect()->back();
    }
    public function nbreOkMedia($id)
    {
        $media = $this->mediaRepository->getById($id);
        $this->mediaRepository->updateStatus($id,['nbre_ok'=>$media->nbreok+1]);
        return redirect()->back();
    }
    public function nbreKoMedia($id)
    {
        $media = $this->mediaRepository->getById($id);
        $this->mediaRepository->updateStatus($id,['nbre_ko'=>$media->nbreko+1]);
        return redirect()->back();
    }
    public function onlineMedia($id)
    {
        $this->mediaRepository->updateStatus($id,['en_ligne'=>1]);
        return redirect()->back();
    }
    public function offlineMedia($id)
    {
        $this->mediaRepository->updateStatus($id,['en_ligne'=>0]);
        return redirect()->back();
    }

}
