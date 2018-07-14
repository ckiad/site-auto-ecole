<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $tables ='formations';
    protected $fillable=['label','description','montant','nbre_ok','nbre_ko','nbre_vue','en_ligne'];
    protected $guarded = ['id','created_at'];

    public function promotions() 
    {
        return $this->hasMany('App\Promotion');
    }

    public function cours()
    {
        return $this->hasMany('App\Cours');
    }

    public function evaluations()
    {
        return $this->hasMany('App\Evaluation');
    }

    public function tranches()
    {
        return $this->hasMany('App\Tranche');
    }
}
