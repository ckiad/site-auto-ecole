<?php

namespace App\Http\Controllers;

use Sentinel;
use App\Parametre;
use App\Http\Requests\ParametreRequest;
use App\Http\Requests\ParametreRepository;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    protected $parametreRepository;
    protected $nbreParPage = 4;

    public function __construct(ParametreRepository $parametreRepository)
    {
        $this->parametreRepository = $parametreRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Sentinel::getUser();
        $parametres = $this->parametreRepository->getPaginate($this->nbreParPage);
        $count = 1;
        return view('chemin.file', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Sentinel::getUser();
        return view('admin.addparametre', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Sentinel::getUser();
        $post = $this->parametreRepository->store($request->all());
        return view('admin.parametres', compact('user','parametre'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parametre = $this->parametreRepository->getById($id);
        return view('admin.parametres',compact('parametre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parametre = $this->parametreRepository->getById($id);
        return view('admin.parametres',compact('parametre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParametreRequest $request, $id)
    {
        $this->parametreRepository->update($id, $request-all());
        return redirect('admin.parametre')->withOk("Le parametre ".$request->input('key').'a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->parametreRepository->destroy($id);
        return redirect()->back();
    }
}
