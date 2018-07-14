<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GadgetRepositoryInterface;
use App\Repositories\GadgetRepository;
use App\Http\Requests\GadgetRequest;
use App\Gadget;
use App\Utils\FileManager;

class GadgetController extends Controller
{

  /*
  *** Objet repository contenant toutes les methodes de gestion des messages ****
  */
  protected $gadgetRepository;

  /*Constructeur pour que Laravel puisse injecter la dépendance
  vers le MessageRepository*/
  public function __construct(GadgetRepository $gadgetRepository){
    $this->gadgetRepository = $gadgetRepository;
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  /*
  * Lister tous les gadgets de la base de données
  */
  public function getGadgets()
  {
    //$gadgets = Gadget :: all();
    $gadgets = $this->gadgetRepository->getAllGadget();
    $nbreGadget = $gadgets->count();
    $count = 1;
    return view('admin/admin-gestion-gadgets')->with(['gadgets'=>$gadgets, 'count'=>$count]);
  }


  // Lancer le formulaire de l'ajout d'un gadget
  public function addGadget()
  {
    $gadgetToAdd = "add";
    return redirect('admin/admin-gadgets')->with(['gadgetToAdd'=>$gadgetToAdd]);
  }


  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(GadgetRequest $request,$photo)
  {
    // Vérifier si la valeur est un entier
    $r = is_int($request['valeur']);
    if(intval($request['valeur']) == 0) return redirect('admin/erreur404');

    $gadget = $this->gadgetRepository->store($request->all(),$photo);
    return $gadget;
  }

  public function postaddGadget(GadgetRequest $request, FileManager $fileManager)
  {
    //dd('affichons la vue de creation du gadget');
    //return view('admin/admin-gestion-add-gadgets');

    // Specifier le nom du répertoire pour uploader
    $dest_folder = "gadgets";
    $nomFichier = $fileManager->upload($request->file('photo'), $dest_folder);

    if($nomFichier !== ""){

      $gadget = $this->store($request, $nomFichier);

      $message = "Le gadget  " . $gadget->label . " de valeur  ".$gadget->valeur." a été créé avec succès.";
      return redirect('admin/admin-gadgets')->with(['message'=>$message]);
    }

    $error = "La photo n'a pas pue être chargée !";
    return redirect('admin/admin-gadgets')->with(['error'=>$error]);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function showGadget($id)
  {
    $gadgetToDisplay = $this->gadgetRepository->getById($id);

    return redirect('admin/admin-gadgets')->with(['gadgetToDisplay'=>$gadgetToDisplay]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $gadget = $this->gadgetRepository->getById($id);


    return view('gadget.edit',  compact('gadget'));
  }

  public function updateGadget($id)
  {
    //dd($id);
    $gadgetToUpdate = $this->gadgetRepository->getById($id);
    //dd($gadgetToUpdate);

    //return view('admin/admin-gestion-gadgets')->with('gadgetToUpdate', $gadgetToUpdate);
    return redirect('admin/admin-gadgets')->with(['gadgetToUpdate'=>$gadgetToUpdate]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(GadgetRequest $request, $id, $photo)
  {
    $this->gadgetRepository->update($id, $request->all(), $photo);

    return redirect('gadget.update');
  }


  public function postupdateGadget(GadgetRequest $request, FileManager $fileManager)
  {
    // Specifier le nom du répertoire pour uploader
    $dest_folder = "gadgets";
    if($request->file('photo')!=null)
    {
      $nomFichier = $fileManager->upload($request->file('photo'), $dest_folder);

      if($nomFichier !== ""){
        $gadgetUpdate = $this->gadgetRepository->update($request->all(),$nomFichier);

        $message = "Le gadget  a été modifié avec succès. Consulter la liste pour confirmer";

        $request->session()->forget('gadgetToUpdate');

        return redirect('admin/admin-gadgets')->with(['message'=>$message]);

      }
    }
    else{
      $gadgetUpdate = $this->gadgetRepository->updateSansPhotos($request->all());

      $message = "Le gadget  a été modifié avec succès. Consulter la liste pour confirmer";

      $request->session()->forget('gadgetToUpdate');

      return redirect('admin/admin-gadgets')->with(['message'=>$message]);
    }
    
    $error = "La photo n'a pas pue être chargée !";
    return redirect('admin/admin-gadgets')->with(['error'=>$error]);

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $this->gadgetRepository->destroy($id);


    return back();//revenir à l'url precedente. celle de la page l'url qui a conduit a cette fonction à été demandée.
  }

  public function deleteGadget($id)
  {
    $this->gadgetRepository->destroy($id);


    return back();//revenir à l'url precedente. celle de la page l'url qui a conduit a cette fonction à été demandée.
  }


}
