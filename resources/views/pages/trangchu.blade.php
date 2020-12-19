@extends('layout.index') @section('content')

<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" style="background-color: white; padding: 20px;">
    <div class="page-wrapper">
        <div class="blog-top clearfix">
            <h4 class="pull-left">
                Bài học nổi bật <a href="#"><i class="fa fa-rss"></i></a>
            </h4>
        </div>
        <!-- end blog-top -->

        <div class="blog-list clearfix">
            @foreach($danhmucbaihoc as $dmbh) @if(count($dmbh->baihoc) > 0)
            <div class="blog-box row">
                <?php 
                                // lấy 5 tin tức nổi bậc
                                $data =$dmbh->noidung->where('NoiBat',1)->sortByDesc('created_at')->take(5); $noidung1 = $data->shift(); ?>
                <div class="col-md-4">
                    <div class="post-media">
                        <a href="noidung/{{$noidung1['id']}}/{{$noidung1['TieuDeKhongDau']}}.html" title="">
                            <img src="upload/noidung/{{$noidung1['Hinh']}}" alt="" class="img-fluid" />
                            <div class="hovereffect"></div>
                        </a>
                    </div>
                    <!-- end media -->
                </div>
                <!-- end col -->

                <div class="blog-meta big-meta col-md-8">
                    <h4><a href="noidung/{{$noidung1['id']}}/{{$noidung1['TieuDeKhongDau']}}.html" title="">{{$noidung1['TieuDe']}}</a></h4>
                    <p>{!!$noidung1['TomTat']!!}</p>
                    <small class="firstsmall"><a class="bg-orange" href="trangchu" title="">{{$dmbh->Ten}}</a></small><br />
                    <small><a href="trangchu" title="">{{$noidung1->created_at}}</a></small>
                    <small><a href="trangchu" title="">by admin</a></small>
                    <small>
                        <a href="trangchu" title=""><i class="fa fa-eye"></i> {{$noidung1->SoLuotXem}}</a>
                    </small>
                </div>
                <!-- end meta -->
            </div>
            <!-- end blog-box -->

            <hr class="invis" />
            @endif @endforeach
        </div>
        <!-- end blog-list -->
    </div>
    <!-- end page-wrapper -->

    <hr class="invis" />
</div>
<!-- end col -->

<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" id="sticky-sidebar" style="width: 100%;">
    <div class="sticky-top" style="background-color: white; padding: 20px; box-shadow: 0 19px 38px rgba(0, 0, 0, 0.3), 0 15px 12px rgba(0, 0, 0, 0.22); z-index: 100;">
        <div>
            <button type="button" class="btn btn-primary" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; width: 100%;">
                Mục lục <span class="badge badge-light"><i class="fa fa-book" aria-hidden="true"></i></span>
            </button>
        </div>
        <br />
        @foreach($danhmucbaihoc as $dmbh) @if(count($dmbh->baihoc) > 0)
        <span style="color: blue;">{{$dmbh->Ten}}</span>
        <div class="nav flex-column">
            @foreach($dmbh->baihoc as $bh)
            <a href="baihoc/{{$bh->id}}/{{$bh->TenKhongDau}}.html" class="nav-link">+ {{$bh->Ten}}</a>
            @endforeach
        </div>
        @endif @endforeach
    </div>
</div>

@endsection
