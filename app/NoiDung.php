<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoiDung extends Model
{
    //
    //Khai bao cac table
    protected $table = "noidung";
    //
    

    public function baihoc()
    {
    	return $this ->belongsTo('App\BaiHoc','idBaiHoc','id');
    }

    public function binhluan(){
    	return $this ->hasMany('App\BinhLuan','idNoiDung','id');
    }
}
