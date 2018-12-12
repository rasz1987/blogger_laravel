<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    protected $fillable = ['title', 'content', 'user_id', 'state_id'];

    //Function to show all the News
    public static function showNews() {
       return DB::table('blog as bl')
                    ->join('state as st', 'bl.state_id', '=', 'st.id' )
                    ->select('bl.id', 'bl.title', 'bl.created_at', 'st.state')
                    ->orderBy('bl.created_at')->paginate(6);
    }
}
