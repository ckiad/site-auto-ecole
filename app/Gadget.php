<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gadget extends Model
{
    protected $tables = 'gadgets';
    protected $fillable = ['label','valeur','description','photo','type'];
    protected $guarded = ['id','created_at'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function transactiongadgets() 
    {
        return $this->hasMany('App\TransactionGadget');
    }
}
