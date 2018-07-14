<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
  protected $fillable = ['label','type','description','nbre_ok','nbre_ko','nbre_vue','en_ligne'];
  protected $table = 'cours';
  protected $guarded = ['id','created_at'];

  public function formation()
  {
    return $this->belongsTo('App\Formation');
  }

  public function questions()
  {
    return $this->hasMany('App\Question');
  }

  public function medias()
  {
    return $this->belongsToMany('App\Media');
  }
}
