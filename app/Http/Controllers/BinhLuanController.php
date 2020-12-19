<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BinhLuan;
use App\NoiDung;
use Illuminate\Support\Facades\Auth;

class BinhLuanController extends Controller
{
    //Xóa bình luận theo id
    public function getXoa($id, $idNoiDung){
    	$binhluan = BinhLuan::find($id);
    	$binhluan->delete();

    	//xoa thanh cong tra ve trang DanhSach
    	return redirect('admin/noidung/sua/'.$idNoiDung)->with('thongbao','Bạn đã xóa bình luận thành công!');
    }

//---------------------------------------------------------------------------------------------------------
    //Post bình luận và lưu vào csdl
    public function postBinhLuan($id, Request $request){
    	$idNoiDung = $id;
    	$noidung=NoiDung::find($id);
    	$binhluan = new BinhLuan;
    	$binhluan->idNoiDung = $idNoiDung;
    	$binhluan->idUser = Auth::user()->id;
    	$binhluan->NoiDungBinhLuan=$request->NoiDungBinhLuan;
        
    	$binhluan->save();

    	return redirect("noidung/$id/".$noidung->TieuDeKhongDau.".html")->with('thongbao','Bình luận thành công');

    }
}
