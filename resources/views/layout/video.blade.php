<div class="widget" style="background-color: white; padding: 20px; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);">
    <h2 class="widget-title">Videos</h2>

    <!-- ------------------------------------------------------------------------------------------- -->
    <div class="trend-videos">
        @foreach($video as $vd)
        <div class="blog-box">
            <div class="post-media">
                <a href="tech-single.html" title="">
                    <p style="width: 800; height: 460;">{!! $vd->link !!}</p>
                    <div class="hovereffect">
                        <span class="videohover"></span>
                    </div>
                    <!-- end hover -->
                </a>
            </div>
            <!-- end media -->
            <div class="blog-meta">
                <h4><!-- <a href="tech-single.html" title=""> -->{!! $vd->TieuDe !!}<!-- </a> --></h4>
            </div>
            <!-- end meta -->
        </div>
        <!-- end blog-box -->

        <hr class="invis" />
        @endforeach
    </div>
    <!-- end videos -->

    <!-- ------------------------------------------------------------------------------------------- -->
</div>
<!-- end widget -->
