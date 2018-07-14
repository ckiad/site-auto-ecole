<?php

namespace App\Utils;
use Mail;
class  MailManager
{

  // Fonction pour uploader un fichier dans un répertoire du serveur
  public function sendMail($user, $code)
  {

    // Data to be used on the email view
    $data = array(
        'user' => $user,
        'code' => $code,
       // 'forgotPasswordUrl' => url('forgot-password-confirm', [$user->id, $reminder->code]),
    );

    Mail::send('emails.forgotpassword', $data, function ($message) use ($user) {
        $message->to($user->email);
        $message->subject('Account Password Recovery');
    });
  }


}
