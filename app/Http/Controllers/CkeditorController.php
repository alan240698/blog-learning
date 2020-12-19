<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class CkeditorController extends Controller
{
    //Upload file vào csdl 
    public function uploadImage(Request $request) {
	$CKEditor = $request->input('CKEditor');
	$funcNum  = $request->input('CKEditorFuncNum');
	$message  = $url = '';
	if (Input::hasFile('upload')) {
		$file = Input::file('upload');
		if ($file->isValid()) {
			$filename =rand(1000,9999).$file->getClientOriginalName();
			$file->move(public_path().'/wysiwyg/', $filename);
			$url = url('wysiwyg/' . $filename);
		} else {
			$message = 'Có lỗi trong quá trình upload file.';
		}
	} else {
		$message = 'Không có file upload.';
	}
	return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
}


}
