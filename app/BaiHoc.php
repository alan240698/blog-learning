<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiHoc extends Model
{
    //
    //Khai bao cac table
    protected $table = "baihoc";

    //

    public function danhmucbaihoc(){
    	return $this->belongsTo('App\DanhMucBaiHoc','idDanhMuc','id');
    }

    public function noidung(){
    	return $this->hasMany('App\NoiDung','idBaiHoc','id');
    }
}
