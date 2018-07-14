<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['label','contenu','date_creation','enligne','type','url','lieu'];
    protected $guarded = ['id','created_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function medias()
    {
        return $this->belongsToMany('App\Media');
    }
}
