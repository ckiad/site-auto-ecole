<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Lang;
use Redirect;
use Sentinel;
use View;
use DB;
use Illuminate\Cookie\CookieJar;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;
use App\Gestion\UserGestionInterface;
use Illuminate\Support\Facades\Auth;
use Activation;
use App\Gestion\UserGestion;
use App\Repositories\UserRepository;
use App\Utils\FileManager;
use App\Post;
use App\Repositories\TemoignageRepository;
use App\Repositories\MatriceRepository;
use App\Utils\MailManager;
use Reminder;

class IndexController extends Controller
{

  protected $userRepository;
  protected $temoignageRepository;
  protected $matriceRepository;

  public function __construct(UserRepository $userRepository, TemoignageRepository $temoignageRepository, MatriceRepository $matriceRepository){
     $this->userRepository = $userRepository;
     $this->temoignageRepository = $temoignageRepository;
    
     /**
      * Pour des test de l'enregistrement dans le réseau
      */
      $this->matriceRepository = $matriceRepository;
  }


  public function getIndex(){
    
    //return redirect('/')->with(['posts'=>$posts]);

    /*
   *Pour l'accès à la plateforme qui s'obtient en chargeant la vue index il faut charger les 6 témoignages les plus récents
   *vers les moins récents
   */
   

    return view('index');
  }

  public function getActualites()
  {
    $posts = Post::where('enligne', '=', 1)->orderBy('created_at', 'desc')->take(3)->get();
    session(['posts'=>$posts]);
    $n = 6;
   $temoignages = $this->temoignageRepository->getTemoignagesRecent($n);
   //dd($temoignages);
   /*foreach($temoignages as $temoignage)
   {
     dd($temoignage->user);
   }*/
   session(['temoignages' => $temoignages]);
    return view('actualites');

  }


  // Gestion de la connexion
  public function getLogin()
  {
    // Is the user logged in?
    if (Sentinel::check()) {
      //$user = Sentinel::getUser();
      if(Sentinel::inRole('admin')==true)
      {
        //$statut = 'admin';
        session(['statut'=>'admin']);
        return Redirect::to('admin/admin-home');//->with(['statut'=>$statut]);
      }
      else{
        if((Sentinel::inRole('apprenant')) && (Sentinel::inRole('marketeur'))){
          $statut = 'apprenant-marketeur';
          session(['statut'=>$statut]);
        }elseif(!(Sentinel::inRole('apprenant')) && (Sentinel::inRole('marketeur'))){
          $statut = 'marketeur';
          session(['statut'=>'marketeur']);
        }elseif((Sentinel::inRole('apprenant')) && !(Sentinel::inRole('marketeur'))){
          session(['statut'=> 'apprenant']);
        }
        return Redirect::to('user/user-home');//->with(['statut'=>$statut]);
      }
    }else{
      return View('login');
    }
  }

  public function postLogin(Request $request)
  {
    // dd($request->all());
    Sentinel::authenticate($request->all());
    if (Sentinel::check()){
    if(Sentinel::inRole('admin')==true){
      //$statut ='admin';
      session(['statut' => 'admin']);
      //dd(session('statut'));
      return Redirect::to('admin/admin-home');//->with(['statut'=>$statut]);
    }else{
      if(Sentinel::inRole('apprenant')){
        //$statut ='admin';
        session(['statut'=>'apprenant']);
      }elseif(Sentinel::inRole('marketeur')){
        //$statut ='admin';
        session(['statut'=>'marketeur']);
      }
      return Redirect::to('user/user-home');//->with(['statut'=>$statut]);
    }
  }else{
    return redirect()->back()->withOk('Inscrivez vous ou verifiez que vos parametres de connexions sont correct !!!');
  }

  }

  public function souscrireFormation()
  {
    return View::make('inscription-formation');
  }

  public function storeFormation(Request $request)
  {
    $user = Sentinel::registerAndActivate($request->all());

    $role = Sentinel::findRoleBySlug('apprenant');
   // $role = Sentinel::findRoleBySlug('admin');
    $role->users()->attach($user);
    //return Redirect::to('account_user');
    return Redirect::to('/');
  }

  // Inscription pour le marketing relationnel
  public function souscrireMarketing()
  {
    return View::make('inscription-marketing');
  }


  public function storeMarketing(Request $request)
  {
    $user = Sentinel::registerAndActivate($request->all());

    $role = Sentinel::findRoleBySlug('marketeur');

    $role->users()->attach($user);

    $lien_invitation = 'http://localhost:8000/invitation/'.$user->id;
    $user->mon_lien_invitation = $lien_invitation;
    $user->save();//Appel de save de eloquent pour la mise à jour de $user
    //return Redirect::to('account_user');
    return Redirect::to('/');
  }

  /**
   * Cette fonction a été implémneté que pour les tests
   */
  public function storeSerieMarketeur(Request $request)
  {
    //dd('Enregistrer les users marketeur de test');
    for ($i=12; $i<=12; $i++) {
      $inputs = array(
        'nom'=>'nom'.$i,
        'prenom'=>'prenom'.$i,
        'datenaiss'=>Carbon::now(),
        'telephone'=>'678470262',
        'numero_cni'=>'157489621'.$i,
        'nationalite'=>'nationalite',
        'pays'=>'pays',
        'langue'=>'fr',
        'email'=>'m'.$i.'_ckia@lnec.cm',
        'password'=>'123456'
      );

      $user = Sentinel::registerAndActivate($inputs);

      $role = Sentinel::findRoleBySlug('marketeur');

      $role->users()->attach($user);

      $lien_invitation = 'http://localhost:8000/invitation/'.$user->id;
      $user->mon_lien_invitation = $lien_invitation;
      $user->save();

      /**
       * On introduit le user dans le réseau
       */
      $this->matriceRepository->addUserInNetwork($user->id);

    }
    //dd($inputs);
    /*for ($i=5; $i<=105; $i++) {
      
    }*/
    return redirect()->back();
  }

  public function getApprenants()
  {
    $apprenants = $this->userRepository->listerApprenants();
    //dd($apprenants);
    //$count = $apprenants->count();
    $count = 0;
    return view('admin/admin-gestion-apprenants')
    ->with(['apprenants'=>$apprenants,'count'=>$count]);
  }


  public function getLogout(Request $request)
  {
    // Log the user out
    Sentinel::logout();

    //Faut du meme cout vider la session de toute variable
    $request->session()->flush();
    // Redirect to the users page
    return Redirect::to('/')->with('success', 'You have successfully logged out!');
  }

  public function showApprenant($id)
  {
    $apprenant = $this->userRepository->getById($id);
    return redirect('admin/admin-apprenants');
  }

  public function deleteApprenant($id)
  {
    $apprenant = $this->userRepository->destroy($id);
    return redirect('admin/admin-apprenants');
  }

  // Annuler une action
  public function cancel()
  {
    return back();
  }


  public function getElements(Request $request){
    $token = $request->input('recherche');
    $search = new FileManager;
    $apprenants = $search->listerApprenants($token);
    $marketeurs = $search->listerMarketeurs($token);
    $cours = $search->rechercheCours($token);
    $evaluations = $search->rechercheEvaluation($token);
    $formations = $search->rechercheFormation($token);
    $medias = $search->rechercheMedia($token);
    $posts = $search->recherchePost($token);
    $temoignages = $search->rechercheTemoignage($token);
    //dd($cours);
    //if($search->rechercheCours($token)!=null);
    return view ('recherche')->with(['apprenants'=>$apprenants,'marketeurs'=>$marketeurs,
    'cours'=>$cours, 'evaluations'=>$evaluations, 'formations'=>$formations,
    'medias'=>$medias, 'posts'=>$posts, 'temoignages'=>$temoignages])."#resultat-recherche";


  }

  //gestions des mots de passe
  public function getForgotPassword()
  {
    return View::make('forgotpwd');

  }


  public function postForgotPassword(Request $request, MailManager $mailManager)
  {
        try {
            // Get the user password recovery code
            $user1 =User::whereEmail($request->get('email'))->first();
            $user = Sentinel::findById($user1->id);
            if (!$user) {
                return Redirect::route('forgotpassword')->with('error', Lang::get('auth/message.account_email_not_found'));
            }

            $activation = Activation::completed($user);
            if (!$activation) {
                return Redirect::route('forgotpassword')->with('error', Lang::get('auth/message.account_not_activated'));
            }

            $reminder = Reminder::exists($user) ?: Reminder::create($user);

            // Send the activation code through email
            $mailManager->sendMail($user,$reminder->code);

        } catch (UserNotFoundException $e) {
            // Even though the email was not found, we will pretend
            // we have sent the password reset code through email,
            // this is a security measure against hackers.
        }

        //  Redirect to the forgot password
        return redirect()->back()->with('success', Lang::get('auth/message.forgot-password.success'));
  }

    /**
     * Forgot Password Confirmation page.
     *
     * @param  string $passwordResetCode
     * @return View
     */
  public function getForgotPasswordConfirm($userId, $passwordResetCode = null)
  {
        if (!$user = Sentinel::findById($userId)) {
            // Redirect to the forgot password page
            return Redirect::route('forgotpassword')->with('error', Lang::get('auth/message.account_not_found'));
        }

        if($reminder = Reminder::exists($user))
        {
            if($passwordResetCode == $reminder->code)
            {
                return View::make('forgotpwd-confirm', compact(['userId', 'passwordResetCode']));
            }
            else{
                return 'code does not match';
            }
        }
        else
        {
            return 'does not exists';
        }

  }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param  string $passwordResetCode
     * @return Redirect
     */
  public function postForgotPasswordConfirm(Request $request, $userId, $passwordResetCode = null)
  {

        $user = Sentinel::findById($userId);
        if (!$reminder = Reminder::complete($user, $passwordResetCode, $request->get('password'))) {
            // Ooops.. something went wrong
            return Redirect::route('login')->with('error', Lang::get('auth/message.forgot-password-confirm.error'));
        }

        // Password successfully reseted
        return Redirect::route('login')->with('success', Lang::get('auth/message.forgot-password-confirm.success'));
  }


}
