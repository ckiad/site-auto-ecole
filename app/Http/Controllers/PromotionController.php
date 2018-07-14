<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\Formation;
use App\Repositories\PromotionRepository;
use App\Repositories\UserRepository;
use App\Repositories\FormationRepository;
use App\Http\Requests\PromotionRequest;

class PromotionController extends Controller
{
    protected $promotionRepository;
    protected $nbreParPage = 4;

    public function __construct(PromotionRepository $promotionRepository)
    {
        $this->promotionRepository = $promotionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPromotions()
    {
        $formations = Formation::all();
        $promotions = Promotion::all();
	    $count = 1;
        return view('admin/admin-gestion-promotions',compact('promotions','count','formations'));
    }

    
    public function addPromotion()
    {
        $promotionToAdd = 'add';
        return redirect('admin/admin-promotions')->with(['promotionToAdd'=>$promotionToAdd]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postaddPromotion(PromotionRequest $request)
    {
        $promotion=$this->promotionRepository->store($request->all());
        $message = "La promotion a été créé avec succès.";
        return redirect('admin/admin-promotions')->with(['message'=>$message]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPromotion($id)
    {
        $promotionToDisplay = $this->promotionRepository->getById($id);

         return redirect('admin/admin-promotions')->with(['promotionToDisplay'=>$promotionToDisplay]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePromotion($id)
    {
        $promotionToUpdate = $this->promotionRepository->getById($id);
        return redirect('admin/admin-promotions')->with(['promotionToUpdate'=>$promotionToUpdate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postupdatePromotion(PromotionRequest $request)
    {
        $promotionToUpdate = $this->promotionRepository->update($request->all());
        $message = "La Promotion  " . $promotionToUpdate->id ." a été mise à jour avec succès.";
        $request->session()->forget('promotionToUpdate');
        return redirect('admin/admin-promotions')->with(['message'=>$message]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->promotionRepository->destroy($id);
        return redirect()->back();
    }

    public function nbreVuPromotion($id)
    {
        $promotion = $this->promotionRepository->getById($id);
        $this->promotionRepository->update($id,['nbre_vu'=>$promotion->nbre_vu+1]);
    }
    public function nbreOkPromotion($id)
    {
        $promotion = $this->promotionRepository->getById($id);
        $this->promotionRepository->update($id,['nbre_ok'=>$promotion->nbre_ok+1]);
    }
    public function nbreKoPromotion($id)
    {
        $promotion = $this->promotionRepository->getById($id);
        $this->promotionRepository->update($id,['nbre_ko'=>$promotion->nbre_ko+1]);
    }
    public function publishPromotion($id)
    {
        //$temoignage = $this->temoignageRepository->getById($id);
        $this->promotionRepository->publishPromotion($id);
    }
    public function unpublishPromotion($id)
    {
        //$temoignage = $this->temoignageRepository->getById($id);
        $this->promotionRepository->unpublishPromotion($id);
    }

}
