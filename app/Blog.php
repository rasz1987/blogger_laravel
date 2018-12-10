<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //Table Name
    protected $table ='blog';
    //Primary Key
    protected $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User','id', 'user_id');
    }

    public function state() {
        return $this->belongsTo('App\State', 'id', 'state_id');
    }
}
