<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    protected $table ='parametres';
    protected $fillable = ['valeur','date_debut','date_fin'];
    protected $guarded = ['id','created_at'];

}
