@extends('frontend.layouts.app')

@section('content')

    <section class="wow animate__fadeIn">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10 margin-three-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center last-paragraph-no-margin">
                    <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase">@lang("Ceràmica")</h5>
                </div>  
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <ul class="hover-option4 lightbox-gallery portfolio-wrapper grid grid-loading grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-medium">
                        <li class="grid-sizer"></li>
                        @foreach($ceramiques as $ceramica)
                            <li class="grid-item wow animate__fadeInUp">
                                <a href="{{ asset("/storage/$ceramica->imatge1") }}" title="" data-group="lightbox-gallery">
                                    <figure>
                                        <div class="portfolio-img bg-extra-dark-gray">
                                            <img src="{{ asset("/storage/$ceramica->imatge1") }}" alt="Anna Perez Roses" class="project-img-gallery"/>
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