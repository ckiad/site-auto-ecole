<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';
    protected  $fillable = ['label','fichier','type'];
    protected $guarded = ['id','created_at'];

    public function cours()
    {
        return $this->belongsToMany('App\Cours');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
