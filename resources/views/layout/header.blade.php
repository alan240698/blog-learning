<header class="tech-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="trangchu"><img src="images/version/logo2.png" alt="" /></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">

<!-- Trangchu---------------------------------------------------------------------------------------- -->
                    <li class="nav-item">
                        <a class="nav-link" href="trangchu">Trang chủ</a>
                    </li>
<!-- Danhmuc---------------------------------------------------------------------------------------- -->
                   <!--  <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Danh mục</a>
                        <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                            <li>
                                <div class="container">
                                    @foreach($danhmucbaihoc as $dmbh) @if(count($dmbh->baihoc) > 0)
                                    <div class="mega-menu-content clearfix">
                                        <div class="tab">
                                            <button class="tablinks">{{$dmbh->Ten}}</button>
                                        </div>
                                        <hr />

                                        <div class="tab-details clearfix">
                                            <div id="cat01" class="tabcontent active">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                        <div class="blog-box">
                                                            <div class="post-media">
                                                                <a href="tech-single.html" title="">
                                                                   
                                                                    <div class="hovereffect"></div>
                                                                    
                                                                    <span class="menucat">{{$dmbh->Ten}}</span>
                                                                </a>
                                                            </div>
                                                            
                                                            @foreach($dmbh->baihoc as $bh)
                                                            <div class="blog-meta">
                                                                <h4><a href="baihoc/{{$bh->id}}/{{$bh->TenKhongDau}}.html" title="">{{$bh->Ten}}</a></h4>
                                                            </div>
                                                            
                                                            @endforeach
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                       
                                        <br />
                                    </div>
                                    
                                    @endif @endforeach
                                </div>
                            </li>
                        </ul>
                    </li> -->
<!-- Trắc nghiệm--------------------------------------------------------------------------------- -->
                     <li class="nav-item">
                        <a class="nav-link" href="home" data-toggle="tooltip" data-placement="bottom" title="Trắc nghiệm">Quiz</a>
                    </li>
<!-- Gioithieu---------------------------------------------------------------------------------------- -->
                    <li class="nav-item">
                        <a class="nav-link" href="gioithieu">Giới thiệu</a>
                    </li>
<!-- Lienhe---------------------------------------------------------------------------------------- -->
                    <li class="nav-item">
                        <a class="nav-link" href="lienhe">Liên hệ</a>
                    </li>
                    <!-- <li class="nav-item">
                                <a class="nav-link" href="tech-contact.html">Contact Us</a>
                            </li> -->
                </ul>

<!-- Dangnhap va Dang ky va Dang xuat----------------------------------------------------------------- -->

                <ul class="navbar-nav mr-2">
                    @if(!Auth::user())
                    
                    <!-- Dangky------------------------------------------------------------------ -->
                    <li class="nav-item">
                        <a class="nav-link" href="dangky" data-toggle="tooltip" data-placement="bottom" title="Đăng ký"><i class="fa fa-registered"></i></a>
                    </li>
                    <!-- Dangnhap------------------------------------------------------------------ -->
                    <li class="nav-item">
                        <a class="nav-link" href="dangnhap"  data-toggle="tooltip" data-placement="bottom" title="Đăng nhập"><i class="fa fa-sign-in"></i></a>
                    </li>

                    @else
                    <!-- Nguoidung------------------------------------------------------------------ -->
                    <li class="nav-item">
                        <a class="nav-link" href="nguoidung" data-toggle="tooltip" data-placement="bottom" title="Thông tin"><i class="fa fa-user"></i> {{Auth::user()->name}}</a>
                    </li>
                    <!-- Dangxuat------------------------------------------------------------------ -->
                    <li class="nav-item">
                        <a class="nav-link" href="dangxuat"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>

                    @endif
                </ul>
            </div>
        </nav>
    </div>
    <!-- end container-fluid -->
</header>
<!-- end market-header -->
