<?php namespace App\Http\Controllers;

use Activation;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\Tranche;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use File;
use Hash;
use Illuminate\Http\Request;
use Lang;
use Mail;
use Redirect;
use Reminder;
use Sentinel;
use URL;
use View;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Cookie\CookieJar;
use App\Repositories\UserRepository;

class UserController extends Controller
{
	protected $userRepository;
	protected $trancheRepository;
	public function __construct(UserRepository $userRepository, TrancheRepository $trancheRepository){
		$this->userRepository = $userRepository;
		$this->trancheRepository = $trancheRepository;
	}

	/**
	* get user details and display
	*/
	public function editAccount()//User $user
	{
		$user = Sentinel::getUser();
		if (session('statut')==="admin") {
			return View::make('admin.editprofile', compact('user'));
		} else {
			return View::make('user.editprofile', compact('user'));
		}
	}
	

	public function posteditAccount(Request $request)
	{
		//	dd($request->all());
		$id = Sentinel::getUser()->id;
		$this->userRepository->update($id, $request->all());
		$user = Sentinel::getUser();
		if (session('statut')==="admin") {
			return redirect('admin.edit-profile',compact('user'));
		} else {
			return redirect('user.edit-profile',compact('user'));
		}
	}

	public function utilisateurs()
	{
		$user = Sentinel::getUser();
		//recuperer tous les utilisateurs
		//$utilisateurs = User::all();
		$utilisateurs = DB::table('users')->orderBy('actif', 'desc')->get();
		//->groupBy('en_ligne')->get();
		//map code activation => user_id
		$activations_tab =[];
		$activations = DB::table('activations')->get();
		foreach ($activations as $activation){
			$activations_tab[''.$activation->user_id] = $activation->code;
		}

		//dd($activations_tab);
		$count = 1;
		//dd($utilisateurs);
		$pagetitle = 'Tous les utilisateurs';
		return View::make('admin.utilisateurs',compact('activations_tab','user','pagetitle','utilisateurs','count'));
	}

	public function getuser($id)
	{
		$utilisateur = User::find($id);
		return View::make('utilisateur',compact('utilisateur'));
	}

	// Fonction pour rechercher un utilisateur suivant un critère
	public function getUserByCriteria(Request $request){

		$users = [];
		$critere = $request->critere;
		$indication = $request->indication;

		if($critere == "cni"){
			$users = $this->userRepository->findUserByCNI($indication);
		}else if($critere == "nom"){
			$users = $this->userRepository->findUserByName($indication);
		}else if($critere == "mail"){
			$users = $this->userRepository->findUserByMail($indication);
		}else if($critere == "telephone"){
			$users = $this->userRepository->findUserByPhone($indication);
		}
		$count = 1;
		return view('admin.admin-recherche-user', compact('users','count'));
	}
}
