@extends('backend.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('backend/vendors/css/vendor.bundle.addons.css') }}">
@endsection

@section('content')

    <div class="main-panel">        
        <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2>Modificar obra</h2>
                        <p> * Camps obligatoris </p>
                        <br>
                        <form class="forms-sample" method="post" action="{{ route('backend.obres.update', ['obra' => $obra->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @error('categoria')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('imatge1')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            
                            <div class="row grid-margin">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 style="color:red">Pujar imatges en format: jpg, png o gif</h4>
                                            <br>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <div class="form-group">
                                                        <label>Imatge *</label>
                                                        <input name="imatge1" type="file" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input name="imatge1" type="text" class="form-control @error('imatge1') is-invalid @enderror file-upload-info" readonly="readonly" placeholder="Imatge" value="{{ old('imatge1') }}">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-primary" type="button">Cercar imatge</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    @if( $obra->imatge1 )
                                                    <div class="form-check form-check-danger" style="float:right;">
                                                        <img src='{{ asset("/storage/$obra->imatge1") }}' alt="Anna Perez Roses" with=200 height=92>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Categoria:</label>
                                <select id="categoria" name="categoria" class="form-control js-example-basic-single w-100">
                                    <option value="Pintura"
                                        {{ $obra->categoria == "Pintura" ? 'selected' : '' }}
                                    >
                                        Pintura
                                    </option>
                                    <option value="Ceràmica"
                                        {{ $obra->categoria == "Ceràmica" ? 'selected' : '' }}
                                    >
                                        Ceràmica
                                    </option>
                                    <option value="Il·lustració"
                                        {{ $obra->categoria == "Il·lustració" ? 'selected' : '' }}
                                    >
                                        Il·lustració
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Actiu:</label>
                                <select id="actiu" name="actiu" class="form-control js-example-basic-single w-100">
                                    <option value="1"
                                        {{ $obra->actiu == "1" ? 'selected' : '' }}
                                    >
                                        Si
                                    </option>
                                    <option value="0"
                                        {{ $obra->actiu == "0" ? 'selected' : '' }}
                                    >
                                        No
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Ordre (1,2,3,4,...):</label>
                                <input name="ordre" type="number" class="form-control" id="exampleInputEmail3" placeholder="Ordre" value="{{ $obra->ordre }}">
                            </div>
                            
                            <button type="submit" name="funcioBoto" class="btn btn-primary mr-2" value="Guardar">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA==" crossorigin="anonymous" defer></script>
    <script src="{{ asset('backend/js/file-upload.js') }}"></script>
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/js/select2.js') }}"></script>
@endsection

@endsection