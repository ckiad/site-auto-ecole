<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    protected $table = 'temoignages';
    protected $fillable = ['contenu', 'nbreok','nbreko','date','en_ligne'];
    protected $guarded = ['id','created_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
