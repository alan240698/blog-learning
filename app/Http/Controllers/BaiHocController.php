<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucBaiHoc;
use App\BaiHoc;
class BaiHocController extends Controller
{
    //Hiển thị danh sách các bài học
    public function getDanhSach(){
    	//Lay tat ca cac danh muc bai hoc tu model BaiHoc
    	$baihoc=BaiHoc::all();
    	return view('admin.baihoc.danhsach',['baihoc'=>$baihoc]);

    }
//-------------------------------------------------------------------------------------------
    //Thêm các bài học vào csdl
    public function getThem(){
    	$danhmucbaihoc =DanhMucBaiHoc::all();
    	return view('admin.baihoc.them',['danhmucbaihoc'=>$danhmucbaihoc]);
    	
    }

    //Nhận dữ liệu về và lưu trữ trong csdl
    public function postThem(Request $request){
    	$this ->validate($request,
    		[
    			//có nhập không|trùng|tối thiểu|tối đa
    			//TheLoai là name của them.blade.php
    			'Ten' => 'required|unique:BaiHoc,Ten|min:20|max:150','DanhMucBaiHoc'=>'required'
    		],

    		[

    			'Ten.required'=>'Bạn chưa nhập tên bài học', 
    			'Ten.unique'=>'Bài học đã tồn tại',
    			'Ten.min'=>'Độ dài tên từ 20 đến 150 ký tự',  
    			'Ten.max'=>'Độ dài tối đa của tên là 150 ký tự',
    			'DanhMucBaiHoc.required'=>'Bạn chưa chọn danh mục bài học'

    		]);

    	//Luu ten vao model DanhMucBaiHoc
    	$baihoc = new BaiHoc;
    	$baihoc->Ten = $request->Ten;
    	$baihoc ->TenKhongDau = changeTitle($request->Ten);
    	$baihoc->idDanhMuc = $request->DanhMucBaiHoc;
    	$baihoc->save();

    	return redirect('admin/baihoc/them')->with('thongbao','Thêm thành công!');

    }
//-------------------------------------------------------------------------------------------
    //Sửa các các bài học theo danh mục bài học
    public function getSua($id){
    	$danhmucbaihoc=DanhMucBaiHoc::all();
    	$baihoc = BaiHoc::find($id);
    	return view('admin.baihoc.sua',['baihoc'=>$baihoc,'danhmucbaihoc'=>$danhmucbaihoc]);
    }


     public function postSua(Request $request, $id){
     	
     	$this ->validate($request,
    		[
    			//có nhập không|trùng|tối thiểu|tối đa
    			//TheLoai là name của them.blade.php
    			'Ten' => 'required|unique:BaiHoc,Ten|min:20|max:150','DanhMucBaiHoc'=>'required'
    		],

    		[

    			'Ten.required'=>'Bạn chưa nhập tên bài học', 
    			'Ten.unique'=>'Bài học đã tồn tại',
    			'Ten.min'=>'Độ dài tên từ 20 đến 150 ký tự',  
    			'Ten.max'=>'Độ dài tối đa của tên là 150 ký tự',
    			'DanhMucBaiHoc.required'=>'Bạn chưa chọn danh mục bài học'

    		]);

    	//Luu ten vao model BaiHoc
    	$baihoc = BaiHoc::find($id);
    	$baihoc->Ten = $request->Ten;
    	$baihoc ->TenKhongDau = changeTitle($request->Ten);
    	$baihoc->idDanhMuc = $request->DanhMucBaiHoc;
    	$baihoc->save();

    	return redirect('admin/baihoc/sua/'.$id)->with('thongbao','Sửa thành công!');
    }
//-------------------------------------------------------------------------------------------
    //Xóa các bài học
    public function getXoa($id){
    	$baihoc = BaiHoc::find($id);
    	$baihoc->delete();

    	//xoa thanh cong tra ve trang DanhSach

    	return redirect('admin/baihoc/danhsach')->with('thongbao','Bạn đã xóa thành công!');
    }
}
