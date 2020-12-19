<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucBaiHoc;
use App\BaiHoc;
use App\NoiDung;

class AjaxController extends Controller
{
    //lấy các id bài học theo danh mục bài học
    public function getBaiHoc($idDanhMuc){
    	
    	$baihoc = BaiHoc::where('idDanhMuc',$idDanhMuc)->get();

    	foreach($baihoc as $bh)
    	{
    		echo "<option value='".$bh->id."'>".$bh->Ten."</option>";
    	}
    }
}
