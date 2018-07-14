<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $fillable = ['date_debut','duree', 'active','montant'];
    protected $guarded = ['id','created_at'];

    public function formation()
    {
        return $this->belongsTo('App\Formation');
    }
}
