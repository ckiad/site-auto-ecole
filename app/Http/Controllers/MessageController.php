<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use App\User;
use App\Message;
use Sentinel;
use Activation;
use View;
use Mail;
use App\Http\Requests\MessageRequest;
use App\Repositories\MessageRepository;

class MessageController extends Controller
{
    protected $messageRepository;

	public function __construct(MessageRepository $messageRepository){
	   $this->messageRepository = $messageRepository;
    }

   /*  private function sendEmail($user,$activationcode){
        Mail::send('emails.email',[
            'user'=> $user,
            'code' => $activationcode,
        ], function ($message) use  ($user)
        {
            $message->to($user->email);

            $message->subject("Bonjour $user->nom_user, activé votre compte.");
        });
    } */

    //admin-gestion-messages
    public function messages()
    {
        $messages = Message::all();
        $count = 1;
        return View('admin.admin-gestion-messages',compact('messages','count'));
    }

    //reply a message method
    public function replyMessage($id)
    {
       // $messageToReply ="messageToReply";
      //  $message = "Le Message  " . $post->label ." a été créé avec succès.";
      $messageToReply =  $this->messageRepository->getById($id);
    return redirect('admin/admin-messages')->with(['messageToReply'=>$messageToReply]);/*'user','pagetitle',*/

    }

    private function sendEmail($msg,$reponse_objet,$reponse_body){
        Mail::send('emails.email',[
            'user'=> env('MAIL_USERNAME'),
            'reponse_body' => $reponse_body,
            'reponse_objet'=>$reponse_objet,
            'messag'=>$msg
        ], function ($message) use ($msg)
        {
            $message->to($msg->emetteur);

            $message->subject("Bonjour M. ".$msg->emetteur);
        });
    }

      //reply a message method by post method with sending emails
    public function sendByEmailMessage(Request $request)
    {
        $email =$request->email;
        $msg_id =$request->id;
        $message = $this->messageRepository->getById($msg_id);
        $this->sendEmail($message,$request->objet,$request->contenu);
        $message = "le mail a ete envoye avec success";
        return redirect()->back()->with('message',$message);
    }

    public function showMessage($id)
    {
      $messageToDisplay  =  $this->messageRepository->getById($id);
      return redirect('admin/admin-messages')->with(['messageToDisplay'=>$messageToDisplay]);/*'user','pagetitle',*/

    }

    public function sendMessage(MessageRequest $request)
    {

      /*
      *Verification du recaptcha saisi par les users
      */

      /*
    	// Ma clé privée
    	$secret = "6LdhGGIUAAAAADEXY0EQ47fPZh-qunS1X2dCE3QB";
    	// Paramètre renvoyé par le recaptcha
    	$response = $_POST['g-recaptcha-response'];
    	// On récupère l'IP de l'utilisateur
    	$remoteip = $_SERVER['REMOTE_ADDR'];

    	$api_url = " https://www.google.com/recaptcha/api/siteverify"
          ."&secret=". $secret
    	    . "&response=" . $response
    	    . "&remoteip=" . $remoteip ;

    	$decode = json_decode(file_get_contents($api_url), true);

    	if ($decode['success'] == true) {
    		dd('Tu nest pas un humain bravo a toi.');
    	}

    	else {
    		// C'est un robot ou le code de vérification est incorrecte
        dd('Tu nest quun petit pirate essaye encore petit.');
    	}*/

        $this->messageRepository->store($request->all());
        return Redirect::to('/');
    }



    public function deleteMessage($id){
        $msg_id =$id;
        $messages = $this->messageRepository->destroy($msg_id);
        $message = "La suppression du message a ete un success";
        return back()->with(['message'=>$message]);

    }

}
