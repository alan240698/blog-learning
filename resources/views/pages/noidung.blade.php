@extends('layout.index')
@section('content')


<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" style="background-color: white; padding: 20px;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);">
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="trangchu">Home</a></li>
                                    <li class="breadcrumb-item"><a href="gioithieu">About us</a></li>
                                    <li class="breadcrumb-item active">{{$noidung->TieuDe}}</li>
                                </ol>
                                
                                <span class="color-orange"><a href="trangchu" title=""> Update: {{$noidung->updated_at}}</a></span>

                                <h3>{{$noidung->TieuDe}}</h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="trangchu" title="">{{$noidung->created_at}}</a></small>
                                    <small><a href="trangchu" title="">by admin</a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i> {{$noidung->SoLuotXem}}</a></small>
                                </div><!-- end meta -->

                               <!--  <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div> --><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="upload/noidung/{{$noidung->Hinh}}" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">  
                                <div class="pp">
                                   <p>
                                   	{!!  $noidung->NoiDung  !!}
                                   </p>

                                </div><!-- end pp -->

                                
                            </div><!-- end content -->
                            <hr>

                            <div class="blog-title-area">
                               <!--  <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><a href="#" title="">lifestyle</a></small>
                                    <small><a href="#" title="">colorful</a></small>
                                    <small><a href="#" title="">trending</a></small>
                                    <small><a href="#" title="">another tag</a></small>
                                </div> -->

                                <!-- <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div> --><!-- end post-sharing -->
                                
                            </div><!-- end title -->

                            

                            <hr class="invis1">
                            @if (Auth::check()) 
                               @if (Auth::user()->role == 'A')
                            <div class="custombox clearfix">
                                <h4 class="small-title">Code Demo</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <pre><code>{!!$noidung->code_demo!!}</code></pre>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif

                      

                       <hr class="invis1">
                            

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">Tác giả</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="images/avatar3.png" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->




                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#">Thanh Lương</a></h4>
                                        <p>Dự án thuộc luận văn tốt nghiệp ngành Khoa học máy tính<a href="#"> Graphics Learn</a><br> Mọi thông tin phản hồi vui lòng liên hệ qua <b>luonglecr15@gmail.com</b></p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                             

                            <div class="custombox clearfix">
                                <h4 class="small-title">{{$noidung->binhluan->count()}} Bình luận</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                    	
                                        <div class="comments-list">
                                        	@foreach($noidung->binhluan as $bl)
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="upload/noidung/{{$bl->user->Hinh}}" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                	
                                                <h4 class="media-heading user_name">{{$bl->user->name}} 
                                                        <small>{{$bl->created_at}}</small>
                                                        <small>

                                                        
                                                                @if($bl->user->role == 'A')

                                                                    {{"admin"}}
                                                                @else 
                                                                    {{"user"}}

                                                                @endif


                                                        </small>
                                                </h4>
                                                    <p>{{$bl->NoiDungBinhLuan}}</p>
                                                    <!-- <a href="#" class="btn btn-primary btn-sm">Reply</a> -->
                                                </div>
                                            </div>
                                              @endforeach
                                           
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">
                            @if(Auth::user()) 
                            <div class="custombox clearfix">
                            	@if(session('thongbao'))
							                            <div class="alert alert-success">
							                                <strong>{{session('thongbao')}}</strong>
							                            </div>
                        							@endif
                                <h4 class="small-title">Viết bình luận</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper" action="binhluan/{{$noidung->id}}" method="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <textarea class="form-control" name="NoiDungBinhLuan" placeholder="Để lại bình luận của bạn nhé"></textarea>
                                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                    
@include('layout.sidebar')
@endsection

