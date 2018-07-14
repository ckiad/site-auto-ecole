<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tranche extends Model
{
    protected $table ='tranches';
    protected $fillable = ['montant'];
    protected $guarded = ['id','created_at'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function formation()
    {
        return $this->belongsTo('App\Formation');
    }
}
