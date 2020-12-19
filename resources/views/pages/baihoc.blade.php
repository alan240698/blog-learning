@extends('layout.index') @section('content')

<!-- <div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h5 style="text-align: center;"><i class="fa fa-play bg-orange"></i> {{$baihoc->Ten}} <small class="hidden-xs-down hidden-sm-down">{{$baihoc->created_at}}</small></h5>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="trangchu">Home</a></li>
                    <li class="breadcrumb-item"><a href="gioithieu">About us</a></li>
                    <li class="breadcrumb-item"><a href="lienhe">Contact</a></li>
                </ol>
            </div>
            
        </div>
        
    </div>
    
</div> -->
<!-- end page-title -->

<section class="section">
    <div class="container">
        <div class="row">
            <div class="page-wrapper">
                <div class="blog-custom-build">
                    @foreach($noidung as $nd)
                    <div class="blog-box">
                        <div class="post-media">
                            <a href="noidung/{{$nd->id}}/{{$nd->TieuDeKhongDau}}.html" title="">
                                <img src="upload/noidung/{{$nd->Hinh}}" alt="" class="img-fluid" style=" max-height: 400px;" />
                                <div class="hovereffect">
                                    <span class="videohover"></span>
                                </div>
                                <!-- end hover -->
                            </a>
                        </div>
                        <!-- end media -->
                        <div class="blog-meta small-meta">
                            <!-- <div class="post-sharing">
                                <ul class="list-inline">
                                    <li>
                                        <a href="https://www.facebook.com/" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/?lang=vi" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a>
                                    </li>
                                    <li>
                                        <a href="https://aboutme.google.com/u/0/" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                </ul>
                            </div> -->
                            <!-- end post-sharing -->
                            <h4><a href="noidung/{{$nd->id}}/{{$nd->TieuDeKhongDau}}.html" title="">{{$nd->TieuDe}}</a></h4>
                            <p>{!!$nd->TomTat!!}</p>
                            <!-- <small><a href="tech-category.html" title="">Videos</a></small> -->
                            <small><a href="trangchu" title="">{{$nd->created_at}}</a></small>
                            <small><a href="trangchu" title="">by Admin</a></small>
                            <small>
                                <a href="trangchu" title=""><i class="fa fa-eye"></i> {{$nd->SoLuotXem}}</a>
                            </small>
                        </div>
                        <!-- end meta -->
                    </div>
                    <!-- end blog-box -->

                    <hr class="invis" />
                    @endforeach
                </div>
                <!-- end blog-custom-build -->
            </div>
            <!-- end page-wrapper -->

            <hr class="invis" />

            <!-- <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="{!!$noidung->links()!!}">Next</a></li>
                                       
                                    </ul>
                                </nav>
                            </div>
                        </div> -->
        </div>
    </div>
</section>

@endsection
