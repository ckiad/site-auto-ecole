<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionGadget extends Model
{
    protected $table = 'transactiong';
    protected $fillable = ['date', 'description'];
    protected $guarded = ['id','created_at'];

    public function user()
    {
        return $this->belongsTo('App\Users');
    }

    public function gadget()
    {
        return $this->belongsTo('App\Gadget');
    }
}
