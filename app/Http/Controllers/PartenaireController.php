<?php

namespace App\Http\Controllers;
use Sentinel;
use Curl;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests\PartenaireRequest;
use App\Repositories\UserRepository;
use App\Message;

class PartenaireController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function getPartenaires()
    {
        //dd('ici deja');
        if (Sentinel::check())
        {
            $userConnecte = Sentinel::getUser();
            //dd($user);
            /*
            *rechercher la liste des partenaires de l'utilisateur connecté puis ensuite on va afficher 
            *le formulaire d'invitation d'un autre marketeur.
            */
            $partenaires = $this->userRepository->getPartenaires($userConnecte->id);
            session(['partenaires'=>$partenaires]);
            session(['userconnecte'=>$userConnecte]);
            $count = 1;
            return view('user/user-gestion-partenaires')->with(['userConnecte'=> $userConnecte, 'count'=>$count]);
        }
        
    }

    public function addPartenaire()
    {
        $partenaireToAdd ="add";
        return redirect('user/user-partenaires')->with(['partenaireToAdd'=>$partenaireToAdd]);
    }

    private function sendEmail(Message $msg){
        //dd($msg);
        Mail::send('emails.email',[
            'user'=> env('MAIL_USERNAME'),
            'reponse_body' => $msg->contenu,
            'reponse_objet'=>$msg->objet,
            'messag'=>$msg
        ], function ($message) use ($msg)
        {
            $message->to($msg->emetteur);

            $message->subject("Invitation de ".$msg->emetteur);
        });
        return true;
    }

    public function sendByEmailMessage(PartenaireRequest $request)
    {
        $emetteur = $request->email;
        $contenu = $request->message_invitation;
        $mon_lien_invitation = $request->mon_lien_invitation;
        $contenu = $contenu.' '.$mon_lien_invitation;
        //dd($contenu.' '.$emetteur);
        $object = 'Invitation de '.$emetteur;
        $message = new Message;
        $message->objet = $object;
        $message->contenu = $contenu;
        $message->emetteur = $emetteur;
        //dd($message);
        $this->sendEmail($message);
        //dd($message);
       
    }

    public function sendBySmsMessage1($request)
    {
        $telephone = $request->telephone;
        /*
        * Pour l'envoi du sms, le texte saisi par l'utilisateur sera tronqué car la taille d'un sms 
        * est de 160 caractères avec les espace inclus. 
        */
        $nbre_carac_lien = strlen($request->mon_lien_invitation);
        //Il faut un espace entre le texte et le lien donc on va compter 159 au lieu de 160 qui est le max
        $nbre_carac_sms_restant = 159 - $nbre_carac_lien;
        $text_sms =substr($request->message_invitation, 0,  $nbre_carac_sms_restant).' '.$request->mon_lien_invitation;
        
        $request_sms = $request;
        //dd(urlencode($text_sms));
        $parameters = array('api_key'=>'myapikey', 
                            'password'=>'LTCs@5l', 
                            'message'=>'sms_text',
                            'phone'=>'237695093228',
                            'sender'=>'LTCSARL');
        
        $url = 'http://lmtgroup.dyndns.org/bulksms/api/v1/push';
        $postfields = http_build_query($parameters);
        $curl = curl_init($url);

        curl_setopt_array($curl, array(
            CURLOPT_URL=>$url,
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_ENCODING=>"",
            CURLOPT_MAXREDIRS=>10,
            CURLOPT_TIMEOUT=>30,
            CURLOPT_HTTP_VERSION=> CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST=>"POST",
            CURLOPT_POSTFIELDS=>$postfields,
            CURLOPT_HTTPHEADER=>array("content-type: application/x-www-form-urlencoded"),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if($err)
        {
            dd('erreur fatale '.$err);
        }
        else{
            $json = json_decode($response, true);
            if($json['status'] == 'success')
            {
                dd('message envoye avec succes');
            }
            else{
                dd('erreur lors de lenvoi du sms '.$json['message']);
            }
        }
        dd('envoyons un sms au '.$request->telephone.' contenant le texte '.$text_sms.' '.strlen($text_sms));

    }

    public function sendBySmsMessage($request)
    {
        $telephone = $request->telephone;
        /*
        * Pour l'envoi du sms, le texte saisi par l'utilisateur sera tronqué car la taille d'un sms 
        * est de 160 caractères avec les espace inclus. 
        */
        $nbre_carac_lien = strlen($request->mon_lien_invitation);
        //Il faut un espace entre le texte et le lien donc on va compter 159 au lieu de 160 qui est le max
        $nbre_carac_sms_restant = 159 - $nbre_carac_lien;
        $text_sms =substr($request->message_invitation, 0,  $nbre_carac_sms_restant).' '.$request->mon_lien_invitation;
        //dd($text_sms);
        $parameters = array('api_key'=>'myapikey', 
                            'password'=>'LTCs@5l', 
                            'message'=>'sms_text',
                            'phone'=>'237695093228',
                            'sender'=>'LTCSARL');

        $response = Curl::to('http://lmtgroup.dyndns.org/bulksms/api/v1/push')
                        ->withData($parameters)
                        ->withContentType('application/x-www-form-urlencoded')
                        ->post();
        dd($response);
        return $response;
    }

    public function postaddPartenaire(PartenaireRequest $request)
    {
        //dd($request->all());
        if(isset($request->par_sms) == true && isset($request->par_mail) == true)
        {
            //L'envoi se fera par sms et par mail
            //dd($request->all());
            
            if($request->email === '' || $request->telephone === '')
            {
                $error = "L'adresse mail ou le numéro de téléphone n'est pas précisée";
                return redirect('user/user-partenaires')->with('error',$error);
            }
            //envoi effectif du mail
            $this->sendByEmailMessage($request);

            //envoi effectif du sms
            $reponse = $this->sendBySmsMessage($request);
            
            $message = "le mail et le sms d'invitation a été envoyé avec succèss";
            return redirect('user/user-partenaires')->with('message',$message);
        }
        else if(isset($request->par_sms) == true)
        {
            //dd($request->all());
            if($request->telephone === '')
            {
                $error = "Le numéro de téléphone n'est pas précisée";
                return redirect('user/user-partenaires')->with('error',$error);
            }
            //envoi effectif du sms dd(explode(' ', $request->telephone));
           
            $reponse = $this->sendBySmsMessage($request);

            
        }
        else if(isset($request->par_mail) == true)
        {
            //dd($request->all());
            if($request->email === '')
            {
                $error = "L'adresse mail n'est pas précisée";
                return redirect('user/user-partenaires')->with('error',$error);
            }
            //envoi effectif du mail dd($request->email);
            
            $this->sendByEmailMessage($request);
            $message = "le mail d'invitation a été envoyé avec succèss";
            return redirect('user/user-partenaires')->with('message',$message);
        }
        //dd('nul part');
        $error = "Le formulaire d'invitation a été mal rempli. Veuillez reprendre";
        return redirect('user/user-partenaires')->with('error',$error);
        /*$this->sendByEmailMessage($request);
        $message = "le mail d'invitation a été envoyé avec succèss";
        return redirect('user/user-partenaires')->with('message',$message);*/
    }

}
