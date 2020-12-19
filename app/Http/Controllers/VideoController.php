<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    //Hiển thị danh sách các video 
    public function getDanhSach(){
    	//Lay tat ca cac danh muc bai hoc tu model VIDEO
    	$video=Video::all();
    	return view('admin.video.danhsach',['video'=>$video]);

    }
//------------------------------------------------------------------------------
    //Thêm các mã nhúng video 
    public function getThem(){
    	$video =Video::all();
    	return view('admin.video.them');
    	
    }

    //Nhận dữ liệu và lưu vào csdl
    public function postThem(Request $request){
    	$this ->validate($request,
    		[
    			'TieuDe'=> 'required',
    			'link'=> 'required',
    			
    		],

    		[

    			'TieuDe.required'=>'Bạn chưa nhập tiêu đề video',  
    			'link.required'=>'Bạn chưa nhập link video'

    		]);

    	//
    	$video = new Video;
    	$video->TieuDe = $request->TieuDe;
    	$video->link = $request->link;
    	
   
    	
    	$video->save();

    	return redirect('admin/video/them')->with('thongbao','Thêm thành công!');

    }

//-------------------------------------------------------------------------------------------
    //Sửa các mã nhúng video
    public function getSua($id){
    
    	$video = Video::find($id);
    	return view('admin.video.sua',['video'=>$video]);
    }

     public function postSua(Request $request, $id){
     	
     	$this ->validate($request,
    		[
    			'TieuDe'=> 'required',
    			'link'=> 'required',
    			
    		],

    		[

    			'TieuDe.required'=>'Bạn chưa nhập tiêu đề video',  
    			'link.required'=>'Bạn chưa nhập link video'

    		]);
    	//
    	$video =  Video::find($id);
    	$video->TieuDe = $request->TieuDe;
    	$video->link = $request->link;
    	
    	$video->save();

    	return redirect('admin/video/sua/'.$id)->with('thongbao','Sửa video thành công!');
    }
//----------------------------------------------------------------------------------------------------------

    //Xóa video
    public function getXoa($id){
        
    	$video = Video::find($id);
    	$video->delete();

    	//xoa thanh cong tra ve trang DanhSach
    	return redirect('admin/video/danhsach')->with('thongbao','Bạn đã xóa video thành công!');
    }




} 
