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
                  <div class="panel-heading">
                  <h4>Nội dung bài học</h4>
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

                            <form action="them" method="POST" enctype="multipart/form-data">
                            <!-- Truyen du lieu len server su dung _token -->
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    
                                    <!-- Tên danh mục -->
                                          <label class="col-sm-2 control-label text-right">Tên danh mục</label>
                                          <div class="col-sm-10">
                                              <select class="form-control" name="DanhMucBaiHoc" id="DanhMucBaiHoc">
                                                  @foreach($danhmucbaihoc as $dmbh)
                                                      <option value="{{$dmbh->id}}">{{$dmbh->Ten}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                    
                                          
                                    <!-- Tên bài học -->

                                          <label class="col-sm-2 control-label text-right">Tên bài học</label>
                                          <div class="col-sm-10">
                                              <select class="form-control" name="BaiHoc" id="BaiHoc">
                                                  @foreach($baihoc as $bh)
                                                      <option value="{{$bh->id}}">{{$bh->Ten}}</option>
                                                  @endforeach
                                              </select>

                                          </div>

                                    <!-- Tiêu đề -->

                                    <label class="col-sm-2 control-label text-right">Tiêu đề</label>
                                          <div class="col-sm-10">
                                             <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" />

                                          </div>
                                    <!-- Tóm tắt -->
                                    <label class="col-sm-2 control-label text-right">Tóm tắt</label>
                                          <div class="col-sm-10">

                                            <textarea id="demo" name="TomTat" class="form-control ckeditor" rows="3"></textarea>
                                          </div>
                                    <!-- Nội dung -->
                                    <label class="col-sm-2 control-label text-right">Nội dung</label>
                                          <div class="col-sm-10">

                                            <textarea id="demo1" name="NoiDung" class="form-control " rows="3"></textarea>
                                          </div>

                                    <!-- Hình ảnh -->
                                     <label class="col-sm-2 control-label text-right">Hình ảnh</label>
                                          <div class="col-sm-10">

                                            <input type="file" name="Hinh" class="form-control">

                                          </div>  

                                    <!-- Nổi bật -->

                                    <label class="col-sm-2 control-label text-right">Nổi bật</label>
                                          <div class="col-sm-10">

                                              <label class="radio-inline">
                                                  <input name="NoiBat" value="0" checked="" type="radio">Không
                                              </label>
                                              <label class="radio-inline">
                                                  <input name="NoiBat" value="1" type="radio">Có
                                              </label>

                                          </div>  

                                
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