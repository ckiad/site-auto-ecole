<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class InvitationController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
     }

     public function addInvite($user_id)
     {
        /*le slug en paramètre ici représente l'id de l'utilisateur qui a envoyé l'invitation dans la boite
        *email de celui qui a suivi le lien et est tombé dans ce controleur.
        *Il faut donc appeler la route inscription-marketing. 
        *Avant l'affichage de la vue il faut charger en session l'utilisateur qui à envoyé l'invitation 
        *afin que le champ 'lien_invitation' soit initialisé lors de l'enregistrement de l'invité. 
        */
        //dd($user_id);
        $user_mentor = $this->userRepository->getById($user_id);
        //dd($user_mentor);

        return redirect('/inscription-marketing')->with('user_mentor',$user_mentor);
        
     }
}
