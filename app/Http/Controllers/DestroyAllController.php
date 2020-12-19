<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Answer;

class DestroyAllController extends Controller
{
    public function AllUsersDestroy()
    {
      User::where('role', '!=', 'A')->getQuery()->delete();
      // User::where('role', '!=', 'A')->truncate();
      return back()->with('deleted', 'Đã xóa tất cả sinh viên!');
    }

    public function AllAnswersDestroy() {
      Answer::truncate();
      return back()->with('deleted', 'Câu trả lời đã được xóa!');
    }

}
