<?php
$slideshow_items = !empty($slideshow->slideshow_images) ? json_decode($slideshow->slideshow_images) : [];
?>
<div class="type-2041">
    <div class="container testimonial-content">
        <div class="sec-header">
            <h2>{!! $slideshow->slideshow_name !!}</h2>
            <p>{!! $slideshow->slideshow_overview !!}</p>
            <span></span>
            <span></span>
            <span></span>
            <div><a href='#' class='read-more'>xem thêm</a></div>
        </div>
        <div id="main_area">
            <!-- Slider -->
            <div class="" id="slider">
                <!-- Top part of the slider -->
                <div class="">
                    <div class="testimonial-data" id="carousel-bounding-box">
                        <div class="carousel slide" id="myCarousel">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <?php $active='active' ?>
                                @foreach($slideshow_items as $key => $item)
                                <div class="{!! $active !!} item" data-slide-number="{!! $key !!}">
                                    <div class="testimonial-text">
                                        <p>
                                            {!! $item->description !!}
                                        </p>
                                        <a href="#">{!! $item->author !!}</a>
                                    </div>
                                </div>
                                <?php $active='' ?>
                                @endforeach


                            </div><!-- Carousel nav -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/Slider-->
        </div>
        <div class="testimonial-data">
            <div class="swiper-container" id="swiper-container-2041">
                <div class="swiper-wrapper" id="bx-pager">

                    @foreach($slideshow_items as $key => $item)
                    <div class="swiper-slide">
                        <a id="carousel-selector-{!! $key !!}">
                            <img class="thumb-img" src="{!! URL::to($item->image) !!}" alt=""/>
                            <span><?php $item->author ?></span>
                            <span class="color"><?php $item->author ?></span>
                        </a>
                    </div>
                    @endforeach

                </div>
                <!-- Add Pagination -->
                <!--                <div class="swiper-pagination"></div>-->
                <div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
                <div class="swiper-button-prev"><i class="fa fa-chevron-left"></i></div>

            </div>
        </div>
        <div class="side-imgage"><img src="{!! URL::to($slideshow->slideshow_image) !!}" alt=""/></div>
    </div>

    <div id="bg5" data-0="background-position:0px 0px;"
    data-end="background-position:0px -1800px;"
    class="skrollable skrollable-between"
    style="background-position: 0px -1341.35px;">
    <div class="clearfix"></div>
</div>
</div>