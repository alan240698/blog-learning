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
                <div class="panel-heading"><h3>Danh sách nội dung bài học</h3></div>
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
                                        <th>Tiêu đề</th>
                                        <th>Tóm tắt</th>
                                        <th>Danh mục</th>
                                        <th>Bài học</th>
                                        <th>Số lượt xem</th>
                                        <th>Nổi bật</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($noidung as $nd)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$nd->id}}</td>
                                        <td>
                                            <p>{{$nd->TieuDe}}</p>
                                            <img width="100px" src="upload/noidung/{{$nd->Hinh}}" />
                                        </td>
                                        <td>{{$nd->TomTat}}</td>

                                        <td>{{$nd->baihoc->danhmucbaihoc->Ten}}</td>
                                        <td>{{$nd->baihoc->Ten}}</td>
                                        <td>{{$nd->SoLuotXem}}</td>
                                        <td>
                                            @if($nd->NoiBat==0) {{'Không'}} @else {{'Có'}} @endif
                                        </td>
                                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="xoa/{{$nd->id}}"> Delete</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="sua/{{$nd->id}}">Edit</a></td>
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