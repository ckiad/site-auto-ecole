<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Formation;
use App\Tranche;
use App\Repositories\FormationRepository;
use App\Repositories\TrancheRepository;
use App\Http\Requests\TrancheRequest;

class TrancheController extends Controller
{
    /*
  *** Objet repository contenant toutes les methodes de gestion des messages ****
  */
  protected $trancheRepository;

  /*Constructeur pour que Laravel puisse injecter la dépendance
  vers le MessageRepository*/
  public function __construct(TrancheRepository $trancheRepository){
    $this->trancheRepository = $trancheRepository;
  }

  public function configTrancheFormation($id)
  {

    $formation = $this->trancheRepository->getFormation($id);
    //dd($formation);
    //Il faut chercher la liste des tranches de la formation dont l'id est passe en parametre
    //dd("afficher la vue de gestion des tranches de la formation ".$id);
    $tranches = $this->trancheRepository->getTranchesFormation($id);
    //dd($tranches);
    //dd($tranches->count());
    $canAddTranche = $this->trancheRepository->canAddTrancheFormation($id);
    return view('admin/admin-gestion-tranches')->with(['formation'=>$formation, 'tranches'=>$tranches, 'canAddTranche'=>$canAddTranche]);
  }

  public function addTrancheFormation($id)
  {
    $trancheToAdd ="add";
    $canAddTranche = $this->trancheRepository->canAddTrancheFormation($id);
    $resteAPayer = $this->trancheRepository->getResteMontantAPayerFormation($id);
    //dd($canAddTranche.'    '.$resteAPayer);
    //if($canAddTranche == 1) return redirect('admin/config-tranche-formation/'.$id)->with(['trancheToAdd'=>$trancheToAdd]);
    return redirect('admin/config-tranche-formation/'.$id)->with(['trancheToAdd'=>$trancheToAdd]);
    /*$error = "Les tranches définies atteignent déjà le montant de la formation";
    return redirect('admin/config-tranche-formation/'.$id)->with(['error'=>$error]);*/
  }
  
  public function postaddTrancheFormation(TrancheRequest $request)
  {
    /*
    *Est ce que le montant saisi pour la tranche est valid
    */
    //dd('fffffffffff');
    $id = $request['id'];//formation_id
    $formation = $this->trancheRepository->getFormation($id);
    $montantTranche1 = $request['montantTranche1'];
    //dd($montantTranche1);
    //dd(is_numeric($montantTranche1));
    $montantTranche2 = $request['montantTranche2'];
    //dd($montantTranche2);
    $montantTranche3 = $request['montantTranche3'];
    //dd($montantTranche3);
    $cumulMontantTranche = 0;



    if(is_numeric($montantTranche1) == true)
    {
      $cumulMontantTranche = $cumulMontantTranche + floatval($montantTranche1);
    }
    else{
      dd('le montant doit être une valeur valide 1');
    }

    if(is_numeric($montantTranche2) == true)
    {
      $cumulMontantTranche = $cumulMontantTranche + floatval($montantTranche2);
    }
    else{
      //dd('le montant doit être une valeur valide 2');
    }

    if(is_numeric($montantTranche3) == true)
    {
      $cumulMontantTranche = $cumulMontantTranche + floatval($montantTranche3);
    }
    else{
      //dd('le montant doit être une valeur valide 3');
    }
    
    if($cumulMontantTranche != $formation->montant)
    {
      $error = "Le somme cumulée des montants des tranches doit être egale au montant de la formation";
      return redirect('admin/config-tranche-formation/'.$id)->with(['error'=>$error]);
    }
    //dd('enregiistrer tranche');
    $this->trancheRepository->save($request->all());

    $message="les tranches ont été enregistrées avec succès";
    return redirect('admin/config-tranche-formation/'.$id)->with(['message'=>$message]);
  }



}
