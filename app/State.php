<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //Table Name
    protected $table ='state';
    //Primary Key
    protected $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function blog() {
        return $this->belongsTo('App\Blog');
    }
}
