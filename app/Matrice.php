<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matrice extends Model
{
    protected $table = 'matrices';
    protected $fillable = ['nombre_fils_enreg','active'];
    protected $guarded = ['id','created_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
