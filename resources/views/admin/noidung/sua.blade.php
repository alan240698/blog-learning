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

    

    <div class="form-element">
        <div class="col-md-12 padding-0">
                    
            <div class="panel form-element-padding">

              <!-- Nội dung bài học -->
                  <div class="panel-heading">
                  <h4>Bạn đang sửa : <label class="label label-outline label-primary"> {{$noidung->TieuDe}} </label></h4>
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

                            <form action="{{$noidung->id}}" method="POST" enctype="multipart/form-data">
                            <!-- Truyen du lieu len server su dung _token -->
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    
                                    <!-- Tên danh mục -->
                                          <label class="col-sm-2 control-label text-right">Tên danh mục</label>
                                          <div class="col-sm-10">
                                              <select class="form-control" name="DanhMucBaiHoc" id="DanhMucBaiHoc">
                                                  @foreach($danhmucbaihoc as $dmbh)
                                                      <option 
                                                      @if($noidung->baihoc->danhmucbaihoc->id == $dmbh->id)
                                                      {{"selected"}}
                                                      @endif

                                                      value="{{$dmbh->id}}">{{$dmbh->Ten}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                    
                                          
                                    <!-- Tên bài học -->

                                          <label class="col-sm-2 control-label text-right">Tên bài học</label>
                                          <div class="col-sm-10">
                                              <select class="form-control" name="BaiHoc" id="BaiHoc">
                                                  @foreach($baihoc as $bh)
                                                      <option 

                                                      @if($noidung->baihoc->id == $bh->id)
                                                      {{"selected"}}
                                                      @endif

                                                      value="{{$bh->id}}">{{$bh->Ten}}</option>
                                                  @endforeach
                                              </select>

                                          </div>

                                    <!-- Tiêu đề -->

                                    <label class="col-sm-2 control-label text-right">Tiêu đề</label>
                                          <div class="col-sm-10">
                                             <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" value="{{$noidung->TieuDe}}" />

                                          </div>
                                    <!-- Tóm tắt -->
                                    <label class="col-sm-2 control-label text-right">Tóm tắt</label>
                                          <div class="col-sm-10">

                                            <textarea id="demo" name="TomTat" class="form-control ckeditor" rows="3">
                                                {{$noidung->TomTat}}
                                            </textarea>
                                          </div>
                                    <!-- Nội dung -->
                                    <label class="col-sm-2 control-label text-right">Nội dung</label>
                                          <div class="col-sm-10">

                                            <textarea id="demo1" name="NoiDung" class="form-control" rows="3">
                                                {{$noidung->NoiDung}}
                                            </textarea>
                                          </div>

                                    <!-- Hình ảnh -->
                                     <label class="col-sm-2 control-label text-right">Hình ảnh</label>
                                          <div class="col-sm-10">

                                            <p><img width="400px" src="upload/noidung/{{$noidung->Hinh}}"></p>
                                            <input type="file" name="Hinh" class="form-control">

                                          </div>  

                                    <!-- Nổi bật -->

                                    <label class="col-sm-2 control-label text-right">Nổi bật</label>
                                          <div class="col-sm-10">

                                              <label class="radio-inline">
                                                  <input name="NoiBat" value="0" 
                                                      @if($noidung->NoiBat == 0 )
                                                          {{"checked"}}
                                                      @endif

                                                    type="radio">Không
                                              </label>
                                              <label class="radio-inline">
                                                  <input name="NoiBat" value="1" 

                                                      @if($noidung->NoiBat == 0 )
                                                          {{"checked"}}
                                                      @endif

                                                  type="radio">Có
                                              </label>

                                          </div>  

                                
                                    <div class="form-group text-center">
                                        <!-- button thêm -->
                                          <button type="submit" style="margin-top:20px !important;" class="btn-flip btn btn-3d btn-danger">
                                              <div class="flip">
                                                <div class="side">
                                                  Sửa <span class="fa fa-plus"></span>
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
              <!-- Bình luận  -->
              <div class="panel-heading">
                  <h4>Quản lý bình luận</h4>
                  </div>

                  <div class="panel-body" style="padding-bottom:30px;">
                        <div class="col-md-12">


                         <!-- Thông báo công việc đã được thực hiện -->
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                <strong>{{session('thongbao')}}</strong>
                            </div>
                        @endif

                        <!-- FORM THÊM -->

                            <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Người dùng</th>
                          <th>Nội dung</th>
                          <th>Ngày đăng</th>
                          
                          <!-- <th>Delete</th> -->
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($noidung ->binhluan as $bl) 
                                <tr class="odd gradeX" align="center">
                                    <td>{{$bl->id}}</td>
                                    <td>
                                        {{$bl->user->name}}
                                    </td>
                                    <!-- NoiDung -> nội dung bình luận -->
                                    <td>{{$bl->NoiDungBinhLuan}}</td>
                         
                                    <td>{{$bl->created_at}}</td>
                                    <!-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="binhluan/xoa/{{$bl->id}}/{{$noidung->id}}"> Delete</a></td>
                                     -->
                                </tr>
                            @endforeach
                           
                        </tbody>
                        </table>
                            
                        </div>
                  </div>


            </div>
        </div>       
                
    </div> <!-- end: form-element -->
              
</div> <!-- end: content -->
            
          
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#DanhMucBaiHoc").change(function(){
            var idDanhMuc = $(this).val();
            // lấy dữ liệu đưa vào data sau đó truyền vao id="BaiHoc"
            $.get("admin/ajax/baihoc/"+idDanhMuc,function(data){
                $("#BaiHoc").html(data);

            });
        });
    });
</script>

@endsection