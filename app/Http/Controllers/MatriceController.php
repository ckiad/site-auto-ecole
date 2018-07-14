<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sentinel;
use App\Matrice;
use App\Repositories\MatriceRepository;
use App\Repositories\UserRepository;
use App\Http\Requests\MatriceRequest;

class MatriceController extends Controller
{
    protected $matriceRepository;
    protected $userRepository;
    protected $nbreParPage = 4;

    public function __construct(MatriceRepository $matriceRepository, UserRepository $userRepository)
    {
        $this->matriceRepository = $matriceRepository;
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * $user_sentinel est le modèle user de sentinel. Ca ne correspond pas au notre
         * Un Sentinel::getUser() n'est pas du même modele que notre app\User
         */
        $user_sentinel = Sentinel::getUser();
        //dd($user_sentinel);
        $user = $this->userRepository->getById($user_sentinel->id);
        //dd($user);
        
	    $matrices = $this->matriceRepository->getPaginate($this->nbreParPage);
	    $count = 1;
        if (session('statut')==="admin") 
        {
            return view('admin.matrices',compact('matrices','count','user'));
        } 
        else 
        {
            /**
             * La matrice d'un user est une liste de 7 users maximums lui même y compris et occupant la racine
             * de l'abre. Les autres users sont ceux qui ont été introduit dans le réseau imédiatement 
             * apres lui. Les numéros étant consécutif et unique lorsqu'ils sont dans le réseau, la matrice
             * d'un user n s'obtient en chargeant s'il existe les users n, n+1, n+2, n+3, n+4, n+5, n+6. 
             * Il faut donc charger en session tous les users s'il existent qui forment le réseau du 
             * user connecté sachant que luui même forme la racine de son réseau
            */
            //On charge la racine du réseau qui est constitué de lui même
            //dd(intval($user->numero_nw));
            if(intval($user->numero_nw) > 0)
            {
                //dd(intval($user->numero_nw));
                session(['user_pere'=>$user]);
                /**
                 * On gardera aussi en session la matrice active de ce user
                 */
                $user_pere_matrice = $this->matriceRepository->getActiveMatriceUsers(intval($user->numero_nw));
                session(['user_pere_matrice'=>$user_pere_matrice]);
            }
            $x = intval($user->numero_nw); 
            $y = 2*intval($user->numero_nw);
            $z = 2*intval($user->numero_nw)+1;
            $t = 4*(intval($user->numero_nw));
            $u = 4*(intval($user->numero_nw))+1;
            $v = 4*(intval($user->numero_nw))+2;
            $w = 4*(intval($user->numero_nw))+3;
            
            //dd('  '.$x.'  '.$y.'  '.$z.'  '.$t.'  '.$u.'  '.$v.'  '.$w);

            //On cherche son premier fils dont le numero est 2*numero_pere
            $user_first_child = $this->userRepository->findUserByNumero_NW($y);
            
            if($user_first_child != null)
            {
                session(['user_first_child'=>$user_first_child]);
                
                $user_first_child_matrice = $this->matriceRepository->getActiveMatriceUsers(intval($user_first_child->numero_nw));
                session(['user_first_child_matrice'=>$user_first_child_matrice]);
                //dd($user_first_child_matrice);
            }

            //On cherche son second fils
            $user_second_child = $this->userRepository->findUserByNumero_NW($z);
            if($user_second_child != null)
            {
                session(['user_second_child'=>$user_second_child]);
                $user_second_child_matrice = $this->matriceRepository->getActiveMatriceUsers(intval($user_second_child->numero_nw));
                session(['user_second_child_matrice'=>$user_second_child_matrice]);
            }

            //On cherche son premier petit fils
            $user_first_small_child = $this->userRepository->findUserByNumero_NW($t);
            if($user_first_small_child != null)
            {
                session(['user_first_small_child'=>$user_first_small_child]);
                $user_first_small_child_matrice = $this->matriceRepository->getActiveMatriceUsers(intval($user_first_small_child->numero_nw));
                session(['user_first_small_child_matrice'=>$user_first_small_child_matrice]);
            }

            //On cherche son second petit fils
            $user_second_small_child = $this->userRepository->findUserByNumero_NW($u);
            if($user_second_small_child != null)
            {
                session(['user_second_small_child'=>$user_second_small_child]);
                $user_second_small_child_matrice = $this->matriceRepository->getActiveMatriceUsers(intval($user_second_small_child->numero_nw));
                session(['user_second_small_child_matrice'=>$user_second_small_child_matrice]);
            }

            //On cherche son troisieme petit fils
            $user_third_small_child = $this->userRepository->findUserByNumero_NW($v);
            if($user_third_small_child != null)
            {
                session(['user_third_small_child'=>$user_third_small_child]);
                $user_third_small_child_matrice = $this->matriceRepository->getActiveMatriceUsers(intval($user_third_small_child->numero_nw));
                session(['user_third_small_child_matrice'=>$user_third_small_child_matrice]);
            }

            //On cherche son quatrieme petit fils
            $user_fourth_small_child = $this->userRepository->findUserByNumero_NW($w);
            if($user_fourth_small_child != null)
            {
                session(['user_fourth_small_child'=>$user_fourth_small_child]);
                $user_fourth_small_child_matrice = $this->matriceRepository->getActiveMatriceUsers(intval($user_fourth_small_child->numero_nw));
                session(['user_fourth_small_child_matrice'=>$user_fourth_small_child_matrice]);
            }

            return view('user.user-matrice',compact('matrices','count','user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Sentinel::getUser();
        return view('admin', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriceRequest $request)
    {
        $user = Sentinel::getUser();
        $inputs = array_merge($request->all(), ['user_id'=>$user->id]);
        $this->matriceRepository->store($inputs);
        return view('admin', compact('user','matrice'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matrice = $this->matriceRepository->getById($id);
        return view('admin',compact('matrice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matrice = $this->matriceRepository->getById($id);
        return view('admin',compact('matrice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatriceRequest $request, $id)
    {
        $this->matriceRepository->update($id, $request->all());
        return redirect('admin')
        ->withOk("La matrice ".$request->input('id').'a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->matriceRepository->destroy($id);
        return redirect()->back();
    }


    public function activeMatrice($id)
    {
        //$temoignage = $this->temoignageRepository->getById($id);
        $this->matriceRepository->update($id,['active'=>1]);
    }
    public function desactiveMatrice($id)
    {
        //$temoignage = $this->temoignageRepository->getById($id);
        $this->matriceRepository->update($id,['active'=>0]);
    }
    public function jaimeMatrice($id)
    {
        //$temoignage = $this->temoignageRepository->getById($id);
        $this->matriceRepository->update($id,['jaime'=>1]);
    }
    public function detesteMatrice($id)
    {
        //$temoignage = $this->temoignageRepository->getById($id);
        $this->matriceRepository->update($id,['jaime'=>0]);
    }
}
