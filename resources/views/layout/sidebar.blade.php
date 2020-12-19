<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
    <div class="sidebar">

        <!-- SHARE ON FB,.....------------------------------------------------------------------------ -->
      <!--   <div class="widget">
            <h2 class="widget-title">Follow Us</h2>

            <div class="row text-center">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button facebook-button">
                        <i class="fa fa-facebook"></i>
                        <p>27k</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button twitter-button">
                        <i class="fa fa-twitter"></i>
                        <p>98k</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button google-button">
                        <i class="fa fa-google-plus"></i>
                        <p>17k</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button youtube-button">
                        <i class="fa fa-youtube"></i>
                        <p>22k</p>
                    </a>
                </div>
            </div>
        </div> -->
        <!-- end widget -->

        <!-- VIDEO -------------------------------------------------------------------------------------->
        @include('layout.video')
        <!-- Baihoclienquan ----------------------------------------------------------------------------->
        <div class="widget" style="background-color: white; padding: 20px; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);">
            <h2 class="widget-title">Bài học liên quan</h2>
            @foreach($noidunglienquan as $nd)
            <div class="blog-list-widget">
                <div class="list-group">
                    <a href="noidung/{{$nd->id}}/{{$nd->TieuDeKhongDau}}.html" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="upload/noidung/{{$nd->Hinh}}" alt="" class="img-fluid float-left" />
                            <h5 class="mb-1">{!!$nd->TieuDe!!}</h5>
                            <small>{{$nd->created_at}}</small>
                        </div>
                    </a>
                </div>
            </div>
            <!-- end blog-list -->
            @endforeach
        </div>
        <!-- end widget -->
        <!-- Baihocnoibat ------------------------------------------------------------------------------->
        <div class="widget" style="background-color: white; padding: 20px; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);">
            <h2 class="widget-title" style="">Bài học nổi bật</h2>
            @foreach($noidungnoibat as $nd)
            <div class="blog-list-widget">
                <div class="list-group">
                    <a href="noidung/{{$nd->id}}/{{$nd->TieuDeKhongDau}}.html" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="upload/noidung/{{$nd->Hinh}}" alt="" class="img-fluid float-left" />
                            <h5 class="mb-1">{!!$nd->TieuDe!!}</h5>
                            <small>{{$nd->created_at}}</small>
                        </div>
                    </a>
                </div>
            </div>
            <!-- end blog-list -->
            @endforeach
        </div>
        <!-- end widget -->
        <!-- ------------------------------------------------------------------------------------------->
    </div>
    <!-- end sidebar -->
</div>
<!-- end col -->
