<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use App\User;
use Sentinel;
use Activation;
use View;
use Mail; 
use DB;

use App\Http\Requests\UserRequest;

class ActivationController extends Controller
{
    //code d'activation d'un user 
    public function activate($email,$activationcode)
    {
        $userId = User::whereEmail($email)->first()->id;
        $user = Sentinel::findById($userId);
        if(Activation::complete($user,$activationcode)){
            //signalisation de l'activation dans la table users
            User::whereEmail($email)->update(['en_ligne' => 1]);
            return Redirect::to('utilisateurs');
        }else{
            return redirect()->back();
        }
    }

    private function sendEmail($user,$activationcode){
        Mail::send('emails.email',[
            'user'=> $user,
            'code' => $activationcode,
        ], function ($message) use  ($user)
        {
            $message->to($user->email);

            $message->subject("Bonjour $user->nom, activé votre compte.");
        });
    }


    public function getRegister(Request $request)
    {
        return View::make('join');
    }

    public function postRegister(UserRequest $request)
    {
        $user = Sentinel::register($request->all());

        $activation = Activation::create($user);

         $role = Sentinel::findRoleBySlug('user');
         $role->users()->attach($user); 

         //activation via le mail
         $this->sendEmail($user,$activation->code);

        return Redirect::to('/');
    }

    public function desactivate($id,$activationcode)
    {
            //signalisation de l'activation dans la table users
            DB::table('activations')->where('code', $activationcode)->update(['completed' => 0]);
            User::whereId($id)->update(['en_ligne' => 0]);
            return Redirect::to('utilisateurs');
    }


}
