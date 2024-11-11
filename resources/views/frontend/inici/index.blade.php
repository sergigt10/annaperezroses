@extends('frontend.layouts.app')

@section('content')

    <section class="wow animate__fadeIn">
        <div class="container-fluid">
            <div class="row mobile-hide">
                <div class="col-12 px-0">
                    <div class="swiper swiper-blog one-second-screen white-move" data-slider-options='{ "loop": true, "initialSlide": 0, "slidesPerView": "auto", "centeredSlides":true, "spaceBetween": 15, "loopedSlides":3, "allowTouchMove":true, "autoplay": { "delay": 5000, "disableOnInteraction": true }, "navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev" }, "pagination": { "el": ".swiper-pagination", "clickable": true } }'>
                        
                        <div class="swiper-wrapper">
                            @foreach($portades as $portada)
                                <div class="swiper-slide w-50 lg-w-60 md-w-80 sm-w-100">
                                    @php $imatgeTraduccio = translatePHP($portada, 'imatge') @endphp
                                    <div class="cover-background h-100" style="background:url({{ asset("/storage/$imatgeTraduccio") }})">
                                        <div class="opacity-medium bg-extra-dark-gray"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center mobile-show">
                <div class="col-12">
                    <ul class="hover-option4 lightbox-gallery portfolio-wrapper grid grid-loading grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-medium">
                        <li class="grid-sizer"></li>
                        @foreach($portades as $portada)
                            
                            <li class="grid-item wow animate__fadeInUp">
                                <a href="{{ asset("/storage/$portada->imatge3") }}" title="" data-group="lightbox-gallery">
                                    <figure>
                                        <div class="portfolio-img bg-extra-dark-gray">
                                            <img src="{{ asset("/storage/$portada->imatge3") }}" alt="Anna Perez Roses" class="project-img-gallery"/>
                                        </div>
                                        <figcaption>
                                            <div class="portfolio-hover-main d-flex justify-content-center align-items-center">
                                                <div class="portfolio-hover-content position-relative">
                                                    <i class="ti-zoom-in text-white-2 fa-2x"></i>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection