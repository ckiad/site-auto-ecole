<?php

namespace App\Http\Controllers;

use Sentinel;
use App\Temoignage;
use App\Repositories\TemoignageRepository;
use App\Repositories\UserRepository;
use App\Http\Requests\TemoignageRequest;
use DB;

use Illuminate\Http\Request;

class TemoignageController extends Controller
{
    protected $temoignageRepository;
    protected $nbreParPage = 4;

    public function __construct(TemoignageRepository $temoignageRepository)
    {
        $this->temoignageRepository = $temoignageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTemoignages()
    {
	    $temoignages = Temoignage::all();
	    $count = 1;
        return view('admin.admin-gestion-temoignages',compact('temoignages','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Sentinel::getUser();
        return view('admin-temoignages', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemoignageRequest $request)
    {
        $user = Sentinel::getUser();
        $inputs = array_merge($request->all(), ['user_id'=>$user->id]);
        $this->temoignageRepository->store($inputs);
        return view('admin-temoignages', compact('user','temoignage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTemoignage($id)
    {
        $temoignageToDisplay = $this->temoignageRepository->getById($id);
        return redirect('admin/admin-temoignages')->with('temoignageToDisplay',$temoignageToDisplay);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $temoignage = $this->temoignageRepository->getById($id);
        return view('admin-temoignages',compact('temoignage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TemoignageRequest $request, $id)
    {
        $this->temoignageRepository->update($id, $request->all());
        return redirect('admin-temoignages')
        ->withOk("Le temoignage ".$request->input('id').'a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTemoignage($id)
    {
        $this->temoignageRepository->destroy($id);
        return redirect()->back();
    }

    public function getContenuTemoignageEtIncrementeNbreVue($id)
    {
        $temoignage = $this->temoignageRepository->getById($id);
        $this->temoignageRepository->update($id,['nbrevu'=>$temoignage->nbrevu + 1]);
        $temoignage->nbrevu = $temoignage->nbrevu + 1;
        //dd($temoignage);
        return redirect()->back()->with(['temoignage'=>$temoignage]);
    }

    public function nbreOkTemoignage($id)
    {
        $temoignage = $this->temoignageRepository->getById($id);
        $this->temoignageRepository->update($id,['nbreok'=>$temoignage->nbreok+1]);
    }

    public function nbreKoTemoignage($id)
    {
        $temoignage = $this->temoignageRepository->getById($id);
        $this->temoignageRepository->update($id,['nbreko'=>$temoignage->nbreko+1]);
    }

    public function onlineTemoignage($id)
    {
        //$temoignage = $this->temoignageRepository->getById($id);
        $this->temoignageRepository->update($id,['en_ligne'=>true]);
        return redirect()->back();
    }

    public function offlineTemoignage($id)
    {
        //$temoignage = $this->temoignageRepository->getById($id);
        $this->temoignageRepository->update($id,['en_ligne'=>false]);
        return redirect()->back();
    }
}
