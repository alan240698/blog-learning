@extends('layout.index')

@section('content')

<section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-wrapper">
                            <div class="row">
                            	<!-- Check các lỗi nhập liệu như bao nhiêu ký tự, bắt buộc nhập (nếu có) -->
                       
                                <div class="col-lg-5">

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


                                    <h4 style="text-align: center;">Đăng ký tài khoản</h4>
                                    <img src="images/banner2.png">
                                </div>
                                <div class="col-lg-7">
                                    <form class="form-wrapper" action="dangky" method="post" enctype="multipart/form-data">
                                    	<input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="text" class="form-control" placeholder="Username" name="name">
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <input type="password" class="form-control" name="passwordReset" placeholder="Password Again">
                                        <label>Chọn ảnh đại diện</label>
                                        <input type="file" class="form-control" name="Hinh" >
                                        <button type="submit" class="btn btn-primary">Register <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>


@endsection