<?php

use App\User;
use App\Topic;
use App\Answer;
use App\copyrighttext;
use App\Question;
use App\DanhMucBaiHoc;

use Illuminate\Support\Facades\Auth;


Route::redirect('/', 'home');

//ADMIN QUẢN LÝ HỆ THỐNG TRẮC NGHIỆM-----------------------------------------------------------------------

Auth::routes();
// Trang chủ Quiz Home
Route::get('/home', function(){
  $topics = Topic::all();
  $questions = Question::all();
  return view('home', compact('topics', 'questions'));
});

//Giao diện admin
Route::get('admin', function(){

    $user = User::where('role', '!=', 'A')->count();
    $question = Question::count();
    $quiz = Topic::count();
    $user_latest = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();

    return view('admin.dashboard', compact('user', 'question', 'quiz', 'user_latest'));
    //remove the answer line comment
    // return view('admin.dashboard', compact('user', 'question', 'answer', 'quiz', 'user_latest'));

  });


// Tạo nhóm Admin------------------------------------------------------------------------------------------

Route::group(['prefix' => 'admin','middleware'=> 'isadmin'], function(){

  // Xóa chủ đề trắc nghiệm
  Route::delete('delete/sheet/quiz/{id}','TopicController@deleteperquizsheet')->name('del.per.quiz.sheet');

  // Xóa bản ghi bài làm
  Route::delete('reset/response/{topicid}/{userid}','AllReportController@delete');
  // Báo cáo sinh viên
  Route::resource('/all_reports', 'AllReportController');
  Route::resource('/top_report', 'TopReportController');
  //Chủ đề test
  Route::resource('/topics', 'TopicController');
  //Câu hỏi
  Route::resource('/questions', 'QuestionsController');
  //Import file question excel
  Route::post('/questions/import_questions', 'QuestionsController@importExcelToDB')->name('import_questions');
  //Câu trả lời
  Route::resource('/answers', 'AnswersController');
  //Cài đặt trang
  Route::resource('/settings', 'SettingController');

  // Xóa người dùng và câu trả lời
  Route::post('/users/destroy', 'DestroyAllController@AllUsersDestroy');
  Route::post('/answers/destroy', 'DestroyAllController@AllAnswersDestroy');


  //ADMIN QUẢN LÝ WEBSITE----------------------------------------------------------------------------------
  //  DANH MUC BAI HOC
  
 Route::group(['prefix'=>'danhmucbaihoc'],function(){
    Route::get('danhsach','DanhMucBaiHocController@getDanhSach')->name('danhmucbaihoc.danhsach');
    Route::get('sua/{id}','DanhMucBaiHocController@getSua');
    Route::post('sua/{id}','DanhMucBaiHocController@postSua');
    Route::get('them','DanhMucBaiHocController@getThem')->name('danhmucbaihoc.them');
    Route::post('them','DanhMucBaiHocController@postThem')->name('danhmucbaihoc.them');

    //xoa
    Route::get('xoa/{id}','DanhMucBaiHocController@getXoa');
  });
  //BAI HOC
  Route::group(['prefix'=>'baihoc'],function(){
    Route::get('danhsach','BaiHocController@getDanhSach')->name('baihoc.danhsach');
    Route::get('sua/{id}','BaiHocController@getSua');
    Route::post('sua/{id}','BaiHocController@postSua');
    Route::get('them','BaiHocController@getThem')->name('baihoc.them');
    Route::post('them','BaiHocController@postThem')->name('baihoc.them');

    //xoa
    Route::get('xoa/{id}','BaiHocController@getXoa');
  });

  //NOI DUNG BAI HOC
  Route::group(['prefix'=>'noidung'],function(){
    Route::get('danhsach','NoiDungController@getDanhSach')->name('noidung.danhsach');
    Route::get('sua/{id}','NoiDungController@getSua');
    Route::post('sua/{id}','NoiDungController@postSua');
    Route::get('them','NoiDungController@getThem')->name('noidung.them');
    Route::post('them','NoiDungController@postThem')->name('noidung.them');

    //xoa
    Route::get('xoa/{id}','NoiDungController@getXoa');
  });

  //BINH LUAN
  Route::group(['prefix'=>'binhluan'],function(){
    //xoa
    Route::get('xoa/{id}/{idNoiDung}','BinhLuanController@getXoa');
  });

  //VIDEO
  Route::group(['prefix'=>'video'],function(){
    Route::get('danhsach','VideoController@getDanhSach')->name('video.danhsach');
    Route::get('sua/{id}','VideoController@getSua');
    Route::post('sua/{id}','VideoController@postSua');
    Route::get('them','VideoController@getThem')->name('video.them');
    Route::post('them','VideoController@postThem')->name('video.them');

    //xoa
    Route::get('xoa/{id}','VideoController@getXoa');
  });


 //NGUOI DUNG
  Route::group(['prefix'=>'user'],function(){
    Route::get('danhsach','UserController@getDanhSach');
    Route::get('sua/{id}','UserController@getSua');
    Route::post('sua/{id}','UserController@postSua');
    Route::get('them','UserController@getThem');
    Route::post('them','UserController@postThem');

    //xoa
    Route::get('xoa/{id}','UserController@getXoa');
  });

  //AJAX
  Route::group(['prefix'=>'ajax'],function(){
    Route::get('baihoc/{idDanhMuc}','AjaxController@getBaiHoc');
    
  });

}); // ------------------END GROUP MIDDLEWARE


Route::resource('/admin/users', 'UsersController');
Route::get('/admin/profile', function(){
  if (Auth::check()) {
    return view('admin.users.profile');
  } else {
    return redirect('/');
  }
});
Route::get('/admin/my_reports', 'MyReportsController@index')->name('my_report');
Route::get('/admin/my_reports/{my_reports}', 'MyReportsController@show')->name('my_report_show');




Route::get('start_quiz/{id}', function($id){
  $topic = Topic::findOrFail($id);
  $answers = Answer::where('topic_id','=',$topic->topic_id)->first();
  return view('main_quiz', compact('topic','answers'));
})->name('start_quiz');





Route::resource('start_quiz/{id}/quiz', 'MainQuizController');

Route::get('start_quiz/{id}/finish', function($id){
  $auth = Auth::user();
  $topic = Topic::findOrFail($id);
  $questions = Question::where('topic_id', $id)->get();
  $count_questions = $questions->count();
  $answers = Answer::where('user_id',$auth->id)
              ->where('topic_id',$id)->get(); 

  if($count_questions != $answers->count()){
    foreach($questions as $que){ 
      $a = false;   
      foreach($answers as $ans){ 
        if($que->id == $ans->question_id){ 
          $a = true;
        }
      }
      if($a == false){  
        Answer::create([
          'topic_id' => $id,
          'user_id' => $auth->id,
          'question_id' => $que->id,
          'user_answer' => 0,
          'answer' => $que->answer,
        ]);
      }
    }
  }

  $ans= Answer::all();
  $q= Question::all();
  
  return view('finish', compact('ans','q','topic', 'answers', 'count_questions'));
});

// PAGE
Route::get('/admin/pages','PagesController@index')->name('pages.index');

Route::get('/admin/pages/add','PagesController@add')->name('pages.add');

Route::post('/admin/pages/add','PagesController@store')->name('pages.store');

Route::get('pages/{slug}','PagesController@show')->name('page.show');

Route::get('/admin/pages/edit/{id}','PagesController@edit')->name('pages.edit');

Route::put('/admin/pages/edit/{id}','PagesController@update')->name('pages.update');

Route::delete('/delete/pages/{id}','PagesController@destroy')->name('pages.delete'); 


//FOOTER
Route::get('admin/moresettings/copyright','CopyrighttextController@index')->name('copyright.index');

Route::put('admin/moresettings/copyright/{id}','CopyrighttextController@update')->name('copyright.update');

// MAIL SETTING
//env.
 Route::get('/admin/mail-settings','Configcontroller@getset')->name('mail.getset');
 Route::post('admin/mail-settings', 'Configcontroller@changeMailEnvKeys')->name('mail.update');

//CUSTOM STYLE
  Route::get('/admin/custom-style-settings', 'CustomStyleController@addStyle')->name('customstyle');
  Route::post('/admin/custom-style-settings/addcss','CustomStyleController@storeCSS')->name('css.store');
  Route::post('/admin/custom-style-settings/addjs','CustomStyleController@storeJS')->name('js.store');

// GIAO DIỆN TRANG CHỦ---------------------------------------------------------------------------

Route::get('trangchu','PagesMainController@trangchu');
Route::get('lienhe','PagesMainController@lienhe');

Route::get('baihoc/{id}/{TenKhongDau}.html','PagesMainController@baihoc');
Route::get('noidung/{id}/{TieuDeKhongDau}.html','PagesMainController@noidung');

Route::get('nguoidung','PagesMainController@getNguoidung');
Route::post('nguoidung','PagesController@postNguoidung');

Route::get('dangnhap','PagesMainController@getDangnhap');
Route::post('dangnhap','PagesMainController@postDangnhap');
Route::get('dangxuat','PagesMainController@getDangxuat');

Route::post('dangky','PagesMainController@postDangky');
Route::get('dangky','PagesMainController@getDangky');

Route::post('binhluan/{id}','BinhLuanController@postBinhLuan');

// //tìm kiếm
// Route::get('timkiem','PagesMainController@timkiem');

//giới thiệu
Route::get('gioithieu','PagesMainController@gioithieu');





//checkditor
Route::post('upload_image','CkeditorController@uploadImage')->name('upload');

