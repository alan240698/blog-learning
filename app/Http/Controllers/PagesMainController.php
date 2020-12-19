<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucBaiHoc;

use App\BaiHoc;
use App\NoiDung;
use App\User;
use App\Video;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class PagesMainController extends Controller
{
    //

    function __construct(){

    	$danhmucbaihoc = DanhMucBaiHoc::all();
    	
        $video= Video::all();
    	view()->share('danhmucbaihoc',$danhmucbaihoc);
    	
        view()->share('video',$video);

    	if(Auth::check()){
    		view()->share('nguoidung',Auth::user());
    	}
    }
    // get trangchu
     function trangchu(){
    	$danhmucbaihoc = DanhMucBaiHoc::all();
       
    	return view('pages.trangchu');
    }
    //get lienhe
    function lienhe(){
    	
    	return view('pages.lienhe');
    }
    //get baihoc
    function baihoc($id){
    	$baihoc = BaiHoc::find($id);
    	//lấy nội dung trong bài học
    	//paginate(5) 5 nội dung trên một trang
    	$noidung = NoiDung::where('idBaiHoc',$id)->paginate(5);
    	return view('pages.baihoc',['baihoc'=>$baihoc,'noidung'=>$noidung]);
    }
    function noidung($id){
    	$noidung = NoiDung::find($id);
    	$noidungnoibat = NoiDung::where('NoiBat',1)->take(4)->get();
        // Kiểm tra Session của nội dung có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key nội dung.
        $productKey = 'noidung_' . $id;
        if (!Session::has($productKey)) {
            NoiDung::where('id', $id)->increment('SoLuotXem');
            Session::put($productKey, 1);
        }
    	$noidunglienquan = NoiDung::where('idBaiHoc',$noidung->idBaiHoc)->take(4)->get();
    	return view('pages.noidung',['noidung'=>$noidung,'noidungnoibat'=>$noidungnoibat,'noidunglienquan'=>$noidunglienquan]);
    }

    //Đăng nhập user
    function getDangnhap(){
        $user = Auth::user();
    	return view('pages.dangnhap');
    }

    function postDangnhap(Request $request){
    	$this ->validate($request,
    		[
    			
    			'email'=>'required',
    			'password'=>'required|min:6|max:32'
    			
    			
    		],

    		[
    			'email.required'=>'Bạn chưa nhập email',
    			'password.required'=>'Bạn chưa nhập password',
    			'password.min'=>'Độ dài password từ 6 đến 32 ký tự',
    			'password.max'=>'Password tối đa 32 ký tự'
    			
    		]);
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
    	{
    		return redirect('trangchu');
    	}
    	else 
    	{
    		return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
    	}

    }

    function getDangxuat(){
    	Auth::logout();
    	return redirect('trangchu');
    }

    //người dùng
    function getNguoidung(){
      
    	return view('pages.nguoidung');

    }

    function postNguoidung(Request $request){

            $this ->validate($request,
            [
                'name'=> 'required|min:6',
                //Không được trùng trong bảng users với cột email (unique:users,email)
                
                
            ],

            [

                'name.required'=>'Bạn chưa nhập tên người dùng',  
                'name.min'=>'Độ dài tên ít nhất 6 ký tự'
                

            ]);
        //
        $user = Auth::user();
        $user->name = $request->name;
        

        if($request->changePassword == "on")
        {

            $this ->validate($request,
            [
                
                'password'=>'required|min:6|max:32',
                //Kiểm tra passwordReset giống với password (same:password)
                'passwordReset'=>'required|same:password'
                
            ],

            [

                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Độ dài password từ 6 đến 32 ký tự',
                'password.max'=>'Password tối đa 32 ký tự',
                'passwordReset.required'=>'Bạn chưa nhập lại password',
                'passwordReset.same'=>'Mật khẩu nhập lại không khớp'

            ]);
            $user->password = bcrypt($request->password);
        }   
        
        $user->save();

        return redirect('nguoidung')->with('thongbao','Sửa người dùng thành công!');

    }



    //Đăng ký tài khoản user
    function getDangky(){
        return view('pages.dangky');
    }

    function postDangky(Request $request){

        $this ->validate($request,
            [
                'name'=> 'required|min:6',
                //Không được trùng trong bảng users với cột email (unique:users,email)
                'email'=> 'required|email|unique:users,email',
                'password'=>'required|min:6|max:32',
                //Kiểm tra passwordReset giống với password (same:password)
                'passwordReset'=>'required|same:password'
                
            ],

            [

                'name.required'=>'Bạn chưa nhập tên người dùng',  
                'name.min'=>'Độ dài tên ít nhất 6 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Email không đúng định dạng',
                'email.unique'=>'Email đã bị trùng',
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Độ dài password từ 6 đến 32 ký tự',
                'password.max'=>'Password tối đa 32 ký tự',
                'passwordReset.required'=>'Bạn chưa nhập lại password',
                'passwordReset.same'=>'Mật khẩu nhập lại không khớp'

            ]);
        //
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->Hinh = $request->Hinh;
        $user->password = bcrypt($request->password);
        $user->role = 'S';
        
        //kiem tra anh
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi !='jpeg')
            {
                return redirect('dangky')->with('loi','Định dạng của ảnh bắt buộc jpg, png, jpeg!');
            }
            $name = $file->getClientOriginalName();
            // 4 ký tự
            $Hinh = str_random(4)."_". $name;
            while(file_exists("upload/noidung/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/noidung",$Hinh);
            $user->Hinh = $Hinh;
        }
        else
        {
            $user->Hinh = "";
        }


        $user->save();

        return redirect('dangky')->with('thongbao','Đăng ký thành công!');


        
    }
    //Tìm kiếm
    function timkiem(Request $request){
        $tukhoa = $request->tukhoa;
        $noidung = NoiDung::where('TieuDe','like',"%$request->tukhoa%")->orWhere('TomTat','like',"%$request->keyword%")->orWhere('TomTat','like',"%$request->tukhoa%")->take(30)->paginate(5)->appends(['tukhoa' => $tukhoa]);
        return view('pages.timkiem',['noidung'=>$noidung,'tukhoa'=>$request->tukhoa]);

    }

    //Giới thiệu
    function gioithieu(){
        return view('pages.gioithieu');
    }





}
