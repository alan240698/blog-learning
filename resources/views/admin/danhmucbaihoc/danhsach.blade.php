@extends('layouts.admin', [
  'page_header' => '',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  
  'sett' => ''
])
 @section('content')


<div id="content">
    <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading"><h3>Danh sách bài học</h3></div>
                <div class="panel-body">
                    <div class="responsive-table">
                        <!-- Thông báo công việc đã được thực hiện -->
                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            <strong>{{session('thongbao')}}</strong>
                        </div>
                        @endif

                        <div class="box-body table-responsive">
                            <table id="topTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Tên không dấu</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($danhmucbaihoc as $dmbh)
                                    <tr>
                                        <td>{{$dmbh->id}}</td>
                                        <td>{{$dmbh->Ten}}</td>
                                        <td>{{$dmbh->TenKhongDau}}</td>
                                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="xoa/{{$dmbh->id}}"> Delete</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="sua/{{$dmbh->id}}">Edit</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
@endsection