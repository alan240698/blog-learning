<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucBaiHoc;
use App\BaiHoc;
use App\NoiDung;
use App\BinhLuan;
class NoiDungController extends Controller
{
    //Hiển danh sách nội dung các bài học
    public function getDanhSach(){
    	//Lay tat ca cac danh muc bai hoc tu model NoiDung sap sep giam dan
    	$noidung=NoiDung::orderBy('id','DESC')->get();
    	return view('admin.noidung.danhsach',['noidung'=>$noidung]);

    }
//---------------------------------------------------------------------------------------------------------

    //Thêm nội dung bài học
    public function getThem(){
    	$danhmucbaihoc=DanhMucBaiHoc::all();
    	$baihoc=BaiHoc::all();
    	return view('admin.noidung.them',['danhmucbaihoc'=>$danhmucbaihoc,'baihoc'=>$baihoc]);
    	
    }

    //Nhận dữ liệu và lưu vào trong csdl
    public function postThem(Request $request){
    	$this ->validate($request,
    		[
    			//Kiểm tra các ràng buộc tồn tại, duy nhất, độ dài
    			'BaiHoc'=>'required',
    			'TieuDe'=>'required|min:20|unique:NoiDung,TieuDe',  
    			'TomTat'=>'required',  
    			'NoiDung'=>'required' 
    			
    		],

    		[

    			'BaiHoc.required'=>'Bạn chưa nhập tên bài học', 
    			'TieuDe.required'=>'Bạn chưa nhập tiêu đề', 
    			'TieuDe.min'=>'Độ dài tiêu đề tối thiểu 20 ký tự', 
    			'TieuDe.unique'=>'Tiêu đề đã tồn tại',
    			'Ten.min'=>'Độ dài tên từ 3 đến 100 ký tự',
    			'TomTat.required'=>'Bạn chưa nhập tóm tắt',
    			'NoiDung.required'=>'Bạn chưa nhập nội dung' 
 
    		]);
    	//Luu ten vao model DanhMucBaiHoc
    	$noidung = new NoiDung;
    	$noidung->TieuDe = $request->TieuDe;
    	$noidung ->TieuDeKhongDau = changeTitle($request->TieuDe);
    	$noidung->idBaiHoc = $request->BaiHoc;
    	$noidung->TomTat = $request->TomTat;
    	$noidung->NoiDung = $request->NoiDung;
    	$noidung->SoLuotXem = 0;
    	
    	//Kiểm tra ảnh có phù hợp
    	if($request->hasFile('Hinh'))
    	{
    		$file = $request->file('Hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi !='jpeg')
    		{
    			return redirect('admin/noidung/them')->with('loi','Định dạng của ảnh bắt buộc jpg, png, jpeg!');
    		}
    		$name = $file->getClientOriginalName();
    		// 4 ký tự
    		$Hinh = str_random(4)."_". $name;
    		while(file_exists("upload/noidung/".$Hinh))
    		{
    			$Hinh = str_random(4)."_". $name;
    		}
    		$file->move("upload/noidung",$Hinh);
    		$noidung->Hinh = $Hinh;
    	}
    	else
    	{
    		$noidung->Hinh = "";
    	}
    	$noidung->NoiBat = $request->NoiBat;
    	$noidung->save();

    	return redirect('admin/noidung/them')->with('thongbao','Thêm thành công!');

    }
//---------------------------------------------------------------------------------------------------------
    //Sửa nội dung bài học
    public function getSua($id){
        $danhmucbaihoc=DanhMucBaiHoc::all();
        $baihoc=BaiHoc::all();
    	$noidung = NoiDung::find($id);
    	return view('admin.noidung.sua',['noidung'=>$noidung,'danhmucbaihoc'=>$danhmucbaihoc,'baihoc'=>$baihoc]);
    }

     public function postSua(Request $request, $id){
     	$noidung = NoiDung::find($id);
     	$this ->validate($request,
            [
                //
                'BaiHoc'=>'required',
                'TieuDe'=>'required|min:20|unique:NoiDung,TieuDe',  
                'TomTat'=>'required',  
                'NoiDung'=>'required' 
                
            ],

            [

                'BaiHoc.required'=>'Bạn chưa nhập tên bài học', 
                'TieuDe.required'=>'Bạn chưa nhập tiêu đề', 
                'TieuDe.min'=>'Độ dài tiêu đề tối thiểu 20 ký tự', 
                'TieuDe.unique'=>'Tiêu đề đã tồn tại',
                'Ten.min'=>'Độ dài tên từ 3 đến 100 ký tự',
                'TomTat.required'=>'Bạn chưa nhập tóm tắt',
                'NoiDung.required'=>'Bạn chưa nhập nội dung' 
 
            ]);
    	//Luu ten vao model DanhMucBaiHoc
    	
    	$noidung->TieuDe = $request->TieuDe;
        $noidung ->TieuDeKhongDau = changeTitle($request->TieuDe);
        $noidung->idBaiHoc = $request->BaiHoc;
        $noidung->TomTat = $request->TomTat;
        $noidung->NoiDung = $request->NoiDung;
      
        
        //Kiểm tra ảnh có phù hợp
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi !='jpeg')
            {
                return redirect('admin/noidung/them')->with('loi','Định dạng của ảnh bắt buộc jpg, png, jpeg!');
            }
            $name = $file->getClientOriginalName();
            // 4 ký tự
            $Hinh = str_random(4)."_". $name;
            while(file_exists("upload/noidung/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/noidung",$Hinh);
            unlink("upload/noidung/".$noidung->Hinh);
            $noidung->Hinh = $Hinh;
        }
       
        $noidung->NoiBat = $request->NoiBat;
        $noidung->save();

    	return redirect('admin/noidung/sua/'.$id)->with('thongbao','Sửa thành công!');
    }
//---------------------------------------------------------------------------------------------------------

    //Xóa nội dung bài học
    public function getXoa($id){
    	$noidung = NoiDung::find($id);
        //xóa nội dung bài học (bị ràng buộc có bình luận)
        $binhluan = BinhLuan::where('idNoiDung',$id); //Tìm các comment của nội dung bài học
        $binhluan->delete(); //Xóa các comment của user
    	$noidung->delete();

    	//xoa thanh cong tra ve trang DanhSach
    	return redirect('admin/noidung/danhsach')->with('thongbao','Bạn đã xóa thành công!');
    }
}
