<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','prenom','datenaiss','telephone','numero_cni','photo', 'date_enreg',
        'nationalite','pays','langue','ville', 'region', 'email',
    ];
    protected $softDelete = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected  $guarded  =['id', 'created_at'];
    protected $loginNames = ['email'];


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function gadgets()
    {
        return $this->belongsToMany('App\Gadget');
    }

    public function tranches()
    {
        return $this->belongsToMany('App\Tranche');
    }

    public function evaluations()
    {
        return $this->belongsToMany('App\Evaluation');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function matrices()
    {
        return $this->hasMany('App\Matrice');
    }

    public function temoignages()
    {
        return $this->hasMany('App\Temoignages');
    }


    public function transactiongadgets()
    {
        return $this->hasMany('App\TransactionGadget');
    }

    public function findUserByName($nom)
    {
        $usernom = User::where('nom','like','%'.$nom.'%')->orWhere('prenom','like','%'.$nom.'%')->orderBy('nom','desc')->get();

            return $usernom;
    }

    public function findUserByCNI($cni)
    {
        $userCni = User::where('numero_cni','like','%'.$cni.'%')->orderBy('nom','desc')->get();
        //$nbreUser = $userCni->count();

            return $userCni;
    }

    public function findUserByPhone($phone)
    {
        $userPhone = User::where('telephone','like', '%'.$phone.'%')->orderBy('nom','desc')->get();

        return $userPhone;
    }

    public function findUserByMail($mail)
    {
        $usermail = User::where('email','like','%'.$mail.'%')->orderBy('nom','desc')->get();

        return $usermail;
    }

    

}
