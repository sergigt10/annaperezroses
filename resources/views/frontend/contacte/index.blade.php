@extends('frontend.layouts.app')

@section('content')

    <section class="wow animate__fadeIn" id="start-your-project">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10 margin-three-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center last-paragraph-no-margin">
                    <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase">@lang("Formulari de contacte")</h5>
                </div>  
            </div>
            <form method="post" action="{{ route('frontend.sendMail') }}">
                @csrf
                @if(session('message_mail'))
                    <div class="alert alert-success contact__msg" role="alert">
                        <b>{{ session('message_mail') }}</b>
                    </div>
                    <br>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="name" id="name" placeholder="@lang("Nom i cognoms *")" class="big-input" required>
                    </div>
                    <div class="col-md-6">
                        <input type="tel" name="phone" id="phone" placeholder="@lang("Telèfon") *"  class="big-input" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" id="email" placeholder="@lang("E-mail") *" class="big-input" required>
                    </div>
                    <div class="col-md-6">
                        <input type="poblacio" name="poblacio" id="poblacio" placeholder="@lang("Població") *" class="big-input" required>
                    </div>
                    
                    <div class="col-12">
                        <textarea name="message" id="message" placeholder="@lang("Comentaris") *" rows="6" class="big-textarea" required></textarea>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-transparent-dark-gray btn-large margin-20px-top">Enviar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <br><br>
                        Anna Perez Roses<br>
                        <a href="mailto:info@annaperezroses.com">info@annaperezroses.com</a><br>
                        <a href="tel:+34657253642">657 25 36 42</a><br>
                        <a href="tel:+34695669926">695 66 99 26</a><br>
                        <a href="https://www.instagram.com/perezroses/" title="Instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://es-la.facebook.com/anna.perezroses/" title="Facebook" target="_blank"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
@endsection