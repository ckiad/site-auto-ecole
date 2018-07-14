<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected  $table = 'questions';
    protected $fillable = ['texte_question', 'separateur', 'liste_proposition',
    'nbre_ok','nbre_ko','nbre_vue','niveau_difficulte','duree_question'];
    protected $guarded = ['id','created_at'];

    public function cours()
    {
        return $this->belongsTo('App\Cours');
    }

    public function evaluations()
    {
        return $this->belongsToMany('App\Evaluation');
    }
}
