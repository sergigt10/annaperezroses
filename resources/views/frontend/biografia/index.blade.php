@extends('frontend.layouts.app')

@section('content')

    <section class="wow animate__fadeIn">
        <div class="container"> 
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 text-center md-margin-30px-bottom">
                    <img src="{{ asset('frontend/images/anna.jpg') }}" alt="Anna Perez Roses" class="border-radius-6 w-100">
                </div> 
                <div class="col-lg-7 col-md-6 text-center text-md-start padding-eight-lr lg-padding-six-lr md-padding-15px-lr" data-wow-delay="0.2s">
                    <span class="text-deep-pink alt-font margin-10px-bottom d-inline-block text-medium">@lang("BIOGRAFÍA")</span>
                    <h6 class="alt-font text-extra-dark-gray">@lang("PASSIÓ PER LA PINTURA")</h6>
                    <p>
                        @lang("FORMACIÓ")<BR><BR>
                        @lang("1966 Barcelona. Escola Arts Aplicades i Oficis Artístics.")<br>
                        @lang("1970-1975 Barcelona. Escola Massana. Llicenciada en Belles Arts. Ceràmica.")<br>
                        @lang("2018 Vic. Tallers de Pintura, amb Joan Peiró.")<br>
                        @lang("2019 Barcelona. Escola de la Dona, Curs d'Il·lustració amb Ignasi Bach")<br>
                        @lang("2022 Barcelona. Tallers i cursos de Pintura amb:")<br>
                        @lang("Leticia Feduchi")<br>
                        @lang("Alberto Romero Gil, MEAM")<br>
                        @lang("ambdós de l'escola de Antonio López.")<br>
                        @lang("2023-2024 Masies de Voltregà. Escola de Pintura, Ceramica i Escultura Joan Jutglar amb Joan Madrenas.")<br>
                        @lang("2023-2024 Barcelona. Tallers avançats de Pintura, amb Alberto Romero Gil.")<br><BR>
                        @lang("EXPOSICIONS")<br><BR>
                        @lang("2019 Terrassa. Primer premi de Pintura, Ajuntament de Terrasa.")<br>
                        @lang("2021 Vic. Sala Tres-e-u")<br>
                        @lang("Amb reconeixement de l'Ajuntament de Vic, obra permanent a les Adoberies.")<br>
                        @lang("2022 Barcelona. Salón Internacional Art Gallery.")<br>
                        @lang("2023 Vic. Exposicions a diferents espais.")
                    </p>
                    <p>
                        Anna Perez Roses<br><br>
                        <img src="{{ asset('frontend/images/firma_sense_fons.png') }}" alt="Anna Perez Roses"/>
                    </p>
                </div>
            </div>
            <div class="divider-full bg-extra-light-gray margin-seven-bottom margin-eight-top"></div>
            <!-- start feature box -->
        </div>
    </section>
    
@endsection