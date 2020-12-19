<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucBaiHoc;

class DanhMucBaiHocController extends Controller
{
    //Hiển thị danh sách các danh mục bài học
    public function getDanhSach(){
        //Lay tat ca cac danh muc bai hoc tu model DanhMucBaiHoc
        $danhmucbaihoc=DanhMucBaiHoc::all();
        return view('admin.danhmucbaihoc.danhsach',['danhmucbaihoc'=>$danhmucbaihoc]);

    }
//---------------------------------------------------------------------------------------------------------

    //Thêm danh mục các bài học

    public function getThem(){
        return view('admin.danhmucbaihoc.them');
        
    }

    //Nhận dữ liệu về và lưu trong csdl
    public function postThem(Request $request){
        $this ->validate($request,
            [
                //có nhập không|trùng|tối thiểu|tối đa
                'Ten' => 'required|unique:DanhMucBaiHoc,Ten|min:3|max:100'
            ],

            [

                'Ten.required'=>'Bạn chưa nhập tên danh mục', 
                'Ten.unique'=>'Danh mục đã tồn tại',
                'Ten.min'=>'Độ dài tên từ 3 đến 100 ký tự',  
                'Ten.max'=>'Độ dài tối đa của tên là 100 ký tự'

            ]);
        //Luu ten vao model DanhMucBaiHoc
        $danhmucbaihoc = new DanhMucBaiHoc;
        $danhmucbaihoc->Ten = $request->Ten;
        $danhmucbaihoc ->TenKhongDau = changeTitle($request->Ten);
        $danhmucbaihoc->save();

        return redirect('admin/danhmucbaihoc/them')->with('thongbao','Thêm thành công!');

    }
//---------------------------------------------------------------------------------------------------------
    //Sửa các danh mục bài học
    public function getSua($id){
        $danhmucbaihoc = DanhMucBaiHoc::find($id);
        return view('admin.danhmucbaihoc.sua',['danhmucbaihoc'=>$danhmucbaihoc]);
    }

     public function postSua(Request $request, $id){
        $danhmucbaihoc = DanhMucBaiHoc::find($id);
        $this ->validate($request,
            [
                //có nhập không|trùng|tối thiểu|tối đa
                'Ten' => 'required|unique:DanhMucBaiHoc,Ten|min:3|max:100'
            ],

            [

                'Ten.required'=>'Bạn chưa nhập tên danh mục', 
                'Ten.unique'=>'Danh mục đã tồn tại',
                'Ten.min'=>'Độ dài tên từ 3 đến 100 ký tự',  
                'Ten.max'=>'Độ dài tối đa của tên là 100 ký tự'

            ]);

        //Luu ten vao model DanhMucBaiHoc
        $danhmucbaihoc->Ten = $request->Ten;
        $danhmucbaihoc ->TenKhongDau = changeTitle($request->Ten);
        $danhmucbaihoc->save();

        return redirect('admin/danhmucbaihoc/sua/'.$id)->with('thongbao','Sửa thành công!');
    }
//---------------------------------------------------------------------------------------------------------
    //Xóa danh mục các bài học
    public function getXoa($id){
        $danhmucbaihoc = DanhMucBaiHoc::find($id);
        $danhmucbaihoc->delete();

        //xoa thanh cong tra ve trang DanhSach
        return redirect('admin/danhmucbaihoc/danhsach')->with('thongbao','Bạn đã xóa thành công!');
    }
}
