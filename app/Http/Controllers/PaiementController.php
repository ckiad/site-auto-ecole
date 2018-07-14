<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\MatriceRepository;
use Sentinel;
use Curl;
use Mail;
use App\Http\Requests\PaiementRequest;
use App\Matrice;

class PaiementController extends Controller
{
    //
    protected $userRepository;
    protected $matriceRepository;

    public function __construct(UserRepository $userRepository, MatriceRepository $matriceRepository){
        $this->userRepository = $userRepository;
        $this->matriceRepository = $matriceRepository;
    }

    public function initPaiementSouscription()
    {
        if (Sentinel::check())
        {
            $userConnecte = Sentinel::getUser();
            session(['userconnecte'=>$userConnecte]);
            return view('user/user-gestion-paiement');
        }
    }

    public function postInitPaiementSouscription(PaiementRequest $request)
    {
        //dd($request->all());
        $userConnecte = Sentinel::getUser();
        $rep_paiement = $this->userRepository->paiementSouscription($request->telephone);
        if($rep_paiement == true)
        {
            /**
             * Apres que le paiement soit effectué, il faut recupperer s'il existe l'utilisateur qui l'a 
             * inviter en recuperant son champ "lien_invitation"
             */

            $lien_invitation = $userConnecte->lien_invitation;
            if($lien_invitation != null)
            {
                /**
                 * lien_invitation contient l'id de celui qui a invite et c'est lui qu'on cherche
                 * pour incrementer son champ nbre_invite
                 */
                $user_id_inviteur = intval($lien_invitation);
                $this->userRepository->updateNombreInvite($user_id_inviteur, $userConnecte->nbre_invite + 1);
            }

            /**
             * Le paiement étant effectué, il faut redirectionner vers  la méthode
             * qui aura pour charge d'introduire l'utilisateur en question dans le réseau. 
             * Tout cela sera fait dans le controleur matrice ainsi que le modele qui lui est associé. 
             */
            $user_id = $userConnecte->id;
            $this->matriceRepository->addUserInNetwork($user_id);
            $message = "Votre souscription de 20000 f cfa a bien été payé et vous avez intégré le réseau avec succès.";
            return redirect('user/user-matrice')->with('message',$message);
        }
        else{
            /*
            *Redirectionner vers la page d'erreur en indiquant le type d'erreur selon le code de 
            *l'erreur qui sera récuperer de la session
             */
        }
    }

}
