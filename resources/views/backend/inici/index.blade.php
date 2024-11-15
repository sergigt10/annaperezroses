@extends('backend.layouts.app')

@section('content')
    <div class="main-panel inici-backend">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-md-3 grid-margin stretch-card">
                            <div class="card border-radius-2 bg-dark">
                                <a href="{{ route('backend.portades.index') }}">
                                    <div class="card-body">
                                        <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                                            <div class="icon-rounded-inverse-success icon-rounded-lg">
                                                <i class="mdi mdi-image-multiple"></i>
                                            </div>
                                            <div class="text-white">
                                                <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left" style="font-size: 1.5rem;">Portada / Inici</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 grid-margin stretch-card">
                            <div class="card border-radius-2 bg-dark">
                                <a href="{{ route('backend.obres.show') }}">
                                    <div class="card-body">
                                        <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                                            <div class="icon-rounded-inverse-success icon-rounded-lg">
                                                <i class="mdi mdi-image-filter"></i>
                                            </div>
                                            <div class="text-white">
                                                <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left" style="font-size: 1.5rem;">Obres</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
@endsection