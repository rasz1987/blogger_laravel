<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisology extends Model
{
    //Table Name
    protected $table ='permisology';
    //Primary Key
    protected $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    Public function users() {
        return $this->hasMany('App\User');
    }
}
