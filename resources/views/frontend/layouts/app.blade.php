<!doctype html>
<html class="no-js" lang="{{ Config::get('app.locale') }}">
    <head>

        <!-- title -->
        {!! SEO::generate() !!}

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="Webmastervic">
        <!-- description -->
        <meta name="description" content="Anna Perez Roses, Passió per la pintura">
        <!-- keywords -->
        <meta name="keywords" content="Anna Perez Roses, Passió per la pintura">
        <!-- favicon -->
        <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon-96x96.png') }}" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="{{ asset('frontend/images/favicon.svg') }}" />
        <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/images/apple-touch-icon.png') }}" />
        <!-- style sheets and font icons  -->
        
        <!-- estils personalitzats -->
        @yield('styles')

        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootsnav.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/font-icons.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/theme-vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}" />
    </head>
    <body>
        <!-- start header -->
        <header>
            <!-- start navigation -->
            <nav class="navbar navbar-default bootsnav background-white header-light navbar-expand-lg">
                <div class="container-lg nav-header-container">
                    <!-- start logo -->
                    <div class="col-auto ps-0">
                        <a href="{{ route('frontend.inici.index') }}" title="Anna Perez Roses" class="logo" style="font-size: 26px; font-weight: bold">ANNA PEREZ ROSES</a>
                    </div>
                    <!-- end logo -->
                    <div class="col accordion-menu pe-0 pe-md-3">
                    <button type="button" class="navbar-toggler collapsed" data-bs-toggle="collapse" data-bs-target="#navbar-collapse-toggle-1">
                        <span class="sr-only">toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-collapse collapse justify-content-end" id="navbar-collapse-toggle-1">
                        <ul id="accordion" class="nav navbar-nav no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                            <li>
                                <a href="{{ route('frontend.inici.index') }}">@lang("INICI")</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.biografia.index') }}">@lang("BIOGRAFÍA")</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.pintures.index') }}">@lang("PINTURA")</a>
                            </li>   
                            <li>
                                <a href="{{ route('frontend.ceramiques.index') }}">@lang("CERÀMICA")</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.ilustracions.index') }}">@lang("IL·LUSTRACIÓ")</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.contacte.index') }}">@lang("CONTACTE")</a>
                            </li>
                            {{-- <li class="dropdown simple-dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-hidden="true">{{ LaravelLocalization::getCurrentLocale() }}</a><i class="fas fa-angle-down"></i>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li> --}}
                            <li>
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </li>
                        </ul>
                        <div class="col-auto pe-0">
                            <div class="header-social-icon d-none d-md-inline-block">
                                <a href="https://www.instagram.com/perezroses/" title="Instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://es-la.facebook.com/anna.perezroses/" title="Facebook" target="_blank"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- end navigation --> 
        </header>

            @yield('content')

        <footer>

        </footer>
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
        <!-- end scroll to top  -->
        <!-- javascript -->
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/bootsnav.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.nav.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/hamburger-menu.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/theme-vendors.min.js') }}"></script>
        <!-- setting -->
        <script type="text/javascript" src="{{ asset('frontend/js/main.js') }}"></script>

        @yield('scripts')

    </body>
</html>
