<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';
    protected $fillable = ['date','en_ligne','jaime','formations_id','label'];
    protected $guarded = ['id','created_at'];

    /*public function eval_users()
    {
        return $this->belongsToMany('App\User');
    }*/

    public function users()
    {
        return $this->belongsToMany('App\Users');
    }

    public function formation()
    {
        return $this->belongsTo('App\Formation');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }
}
