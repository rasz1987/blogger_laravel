<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //Table Name
    protected $table ='blogs';
    //Primary Key
    protected $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
