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

 <!-- start: Content -->
<div id="content">

    <!-- <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Thêm danh mục bài học</h3>
                        
                    </div>
                  </div>
    </div> -->

    <div class="form-element">
        <div class="col-md-12 padding-0">
                    
            <div class="panel form-element-padding">
                  <div class="panel-heading">
                  <h4>Thêm danh mục bài học</h4>
                  </div>

                  <div class="panel-body" style="padding-bottom:30px;">
                        <div class="col-md-12">

                          <!-- Check các lỗi nhập liệu như bao nhiêu ký tự, bắt buộc nhập (nếu có) -->
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    <strong>{{$err}}</strong><br>
                                @endforeach
                            </div>
                        @endif

                         <!-- Thông báo công việc đã được thực hiện -->
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                <strong>{{session('thongbao')}}</strong>
                            </div>
                        @endif

                        <!-- FORM THÊM -->

                            <form action="them" method="POST">
                            <!-- Truyen du lieu len server su dung _token -->
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group"><label class="col-sm-2 control-label text-right">Tên danh mục</label>
                                      <div class="col-sm-10"><input type="text" name="Ten" placeholder="Nhập tên danh mục" class="form-control"></div>
                                
                                      <div class="form-group text-center">
                                        <!-- button thêm -->
                                          <button type="submit" style="margin-top:20px !important;" class="btn-flip btn btn-3d btn-danger">
                                              <div class="flip">
                                                <div class="side">
                                                  Thêm <span class="fa fa-plus"></span>
                                                </div>
                                                
                                              </div>
                                              <span class="icon"></span>
                                          </button>

                                          <!-- button làm mới -->
                                           <button type="reset" style="margin-top:20px !important;" class="btn-flip btn btn-3d btn-success">
                                            <div class="flip">
                                              <div class="side">
                                                Làm mới <span class="fa fa-refresh"></span>
                                              </div>
                                            </div>
                                            <span class="icon"></span>
                                          </button>
                                
                                      </div> <!-- end form-group center -->
                                </div>  
                            
                            </form>
                            
                            <!-- END FORM THÊM -->
                            
                        </div>
                  </div>
            </div>
        </div>       
                
    </div> <!-- end: form-element -->
              
</div> <!-- end: content -->
            
          
@endsection