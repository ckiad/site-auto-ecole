<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Formation;
use App\RessourceFormation;
use App\Repositories\FormationRepository;
use App\Http\Requests\FormationRequest;

class FormationController extends Controller
{
    protected $formationRepository;

    public function __construct(FormationRepository $formationRepository)
    {
		$this->formationRepository = $formationRepository;
	  }

    public function getFormations(){

     $count = 1;
     if (session('statut')==="admin") {
       $formations = Formation::all()->sortBy('label');
       return view('admin.admin-gestion-formations')->with(['formations'=> $formations,'count'=>$count]);
     } else {
      $formations = Formation::all()->sortBy('label');
       //$formations = Formation::where('en_ligne', '=', 1)->orderBy('label','ASC');
       return view('user.user-formations')->with(['formations'=> $formations,'count'=>$count]);
     }


     //return view('admin.formations',compact('formations','count'));
    }

    public function addFormation()
    {
      $formationToAdd ="add";
      return redirect('admin/admin-formations')->with(['formationToAdd'=>$formationToAdd]);
      //return view('admin.addformation',compact('user','pagetitle'));
    }

    public function store(FormationRequest $request)
    {
      if(is_numeric($request['montant']) == true)
      {
        $formation = $this->formationRepository->store($request->all());
        return $formation;
      }
      else{
        dd('le montant doit être une valeur valide ');
      }

    }

    public function postaddFormation(FormationRequest $request)
    {
      $formation = $this->store($request);
      $message = "Formation enregistré avec succès.";
      return redirect('admin/admin-formations')->with(['message'=>$message]);
       //return view('admin.addformation',compact('user','pagetitle'));
    }

    public function activateFormation($id)
    {
        $this->formationRepository->updateStatus($id,['en_ligne'=>1]);
        return redirect()->back();
    }

    public function desactivateFormation($id)
    {
        $this->formationRepository->updateStatus($id,['en_ligne'=>0]);
        return redirect()->back();
    }

    public function editFormation($id)
    {
      $formation = $this->formationRepository->getById($id);
      return view('admin-gestion-formations',  compact('formation'));
        //return view('editformation',compact('user','pagetitle'));
    }

    public function showFormation($id)
    {
      $formationToDisplay = $this->formationRepository->getById($id);

      return redirect('admin/admin-formations')->with(['formationToDisplay'=>$formationToDisplay]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function updateFormation($id)
    {
      //dd($id);
      $formationToUpdate = $this->formationRepository->getById($id);
      //dd($gadgetToUpdate);

      //return view('admin/admin-gestion-gadgets')->with('gadgetToUpdate', $gadgetToUpdate);
      return redirect('admin/admin-formations')->with(['formationToUpdate'=>$formationToUpdate]);
    }

    public function postupdateFormation(FormationRequest $request)
    {
        $formationUpdate = $this->formationRepository->update($request->all());
        $message = "Formation modifié avec succès !!!";

        $request->session()->forget('formationToUpdate');

        return redirect('admin/admin-formations')->with(['message'=>$message]);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
      $this->formationRepository->destroy($id);
      return back();//revenir à l'url precedente. celle de la page l'url qui a conduit a cette fonction à été demandée.
    }

    public function deleteFormation($id)
    {
      $this->formationRepository->destroy($id);
      return back();//revenir à l'url precedente. celle de la page l'url qui a conduit a cette fonction à été demandée.
    }

}
