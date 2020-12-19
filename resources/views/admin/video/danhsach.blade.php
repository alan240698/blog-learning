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
                    <div class="panel-heading"><h3>Danh sách video</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">

                          <!-- Thông báo công việc đã được thực hiện -->
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                <strong>{{session('thongbao')}}</strong>
                            </div>
                        @endif



                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tiêu đề</th>
                          <th>Link</th>
                          <th>Delete</th>
                          <th>Edit</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($video as $vd)
                        <tr>
                          <td>{{$vd->id}}</td>
                          <td>{{$vd->TieuDe}}</td>
                          <td>{{$vd->link}}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="xoa/{{$vd->id}}"> Delete</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="sua/{{$vd->id}}">Edit</a></td>
                          
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

@endsection