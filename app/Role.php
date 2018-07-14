<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['slug','name','permissions'];
    protected $guarded = ['id','created_at'];

     public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
