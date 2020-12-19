<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucBaiHoc extends Model
{
    //
     //Khai bao cac table
    protected $table = "danhmucbaihoc";

    //tao lien ket den baihoc
    public function baihoc(){
    	// Mot danh muc co nhieu bai hoc
    	// model, khoa phu, khoa chinh
    	return $this->hasMany('App\BaiHoc','idDanhMuc','id');
    }

//tao lien ket tu bang noi dung qua bang baihoc roi lien ket den bang danhmucbaihoc
    public function noidung(){
    	return $this->hasManyThrough('App\NoiDung','App\BaiHoc','idDanhMuc','idBaiHoc','id');
    }
}
