<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use Sentinel;
use App\Cours;
use App\Media;
use App\Repositories\CoursRepository;
use App\Repositories\MediaRepository;
use App\Http\Requests\CoursRequest;
use App\Formation;

class CoursController extends Controller {
  /* objet repository contenant les methodes de gestion du cours */
  protected $coursRepository;
  protected $mediaRepository;

  // protected $nbrPerPage = 4;
  public function __construct(CoursRepository $coursRepository, MediaRepository $mediaRepository)
  {
    $this->coursRepository = $coursRepository;
    $this->mediaRepository = $mediaRepository;
  }

  public function getCours(){
    //$cours = Cours::all();//->groupBy('formations_id')
    //dd($cours);
    $count = 1;
    $cours = new Collection();
    $formations = Formation::all();//->sortBy('label');
    //dd($formations);
    foreach($formations as $formation)
    {
      $cours = $cours->merge($formation->cours()->get());
    }
    //dd($cours);
    if (session('statut')==="admin") {
      return view('admin/admin-gestion-cours')->with(['cours'=> $cours,'count'=>$count,'formations'=>$formations]);
    } else {
      return view('user/user-cours')->with(['cours'=> $cours,'count'=>$count,'formations'=>$formations]);
    }
  }

  public function addCours()
  {
    $coursToAdd= "add";
    $formations = Formation::all()->sortBy('label');
    return redirect('admin/admin-cours')->with(['coursToAdd'=>$coursToAdd,'formations'=>$formations]);
  }

  public function store(CoursRequest $request)
  {
    $cours = $this->coursRepository->store($request->all());
    return $cours;
  }

  public function postaddcours(CoursRequest $request)
  {
    $cours = $this->store($request);
   // $formations = Formation::all();

    $message = "cours inseré avec succès";
    return redirect('admin/admin-cours')->with(['message'=>$message]);
  }

  public function activatecours($id)
  {
    $this->coursRepository->updateStatus($id,['en_ligne'=>1]);
    return redirect()->back();
  }

  public function desactivatecours($id)
  {
    $this->coursRepository->updateStatus($id,['en_ligne'=>0]);
    return redirect()->back();
  }

  public function showCours($id)
  {
    $coursToDisplay = $this->coursRepository->getById($id);

    return redirect('admin/admin-cours')->with(['coursToDisplay'=>$coursToDisplay]);
  }

  public function updateCours($id)
  {
    $coursToUpdate =  $this->coursRepository->getById($id);

    /*
        *Il faut aussi afficher du même cout les medias qui sont déjà dans le post
        */
        $medias_cours = $this->coursRepository->getListMediaCours($id);
        $count_media_cours = $medias_cours->count();

        /*
        *Il faut la liste des medias des medias disponibles pour qu'il puisse choisir ce qu'il
        * peut augmenter au post
        */
        $medias = $this->mediaRepository->getListMedia();
        //dd($cours);

    return redirect('admin/admin-cours')->with(['coursToUpdate'=>$coursToUpdate, 
    'medias_cours'=>$medias_cours, 'count_media_cours'=>$count_media_cours, 'medias'=>$medias]);
  }


  public function postupdateCours(CoursRequest $request)
  {
    $coursToUpdate =  $this->coursRepository->update($request->all());
    $request->session()->forget('coursToUpdate');
    $request->session()->forget('medias');
    $message = "le cours a ete mise a jours avec success";
    return redirect('admin/admin-cours')->with(['message'=>$message]);

  }

  public function destroyCours($id)
  {
    $this->coursRepository->destroy($id);
    return redirect()->back();//revenir à l'url precedente. celle de la page l'url qui a conduit a cette fonction à été demandée.
  }

  public function deleteCoursMedia($cours_id, $media_id)
    {
        $this->coursRepository->destroyCoursMedia($cours_id, $media_id);
        return redirect()->back();
    }

}
