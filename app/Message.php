<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['objet', 'contenu','emetteur','date_denvoi','motif','etat'];
     protected $guarded = ['id','created_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
