<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    //
    //Khai bao cac table
    protected $table = "binhluan";
    
    public function noidung(){
    	return $this ->belongsTo('App\NoiDung','idNoiDung','id');
    }

    public function user(){
    	return $this ->belongsTo('App\User','idUser','id');
    }

    
}
