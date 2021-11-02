@extends('layouts.ap', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Usuarios ')])
@section('content')

<div class="right_col" role="main">
    <div class="">
    <div  class="row">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header"><h3>Formulario De Registros</h3></div>
                        <div class="card-body">
                          <form method="post" action="{{route('cursotabla')}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                          enctype="multipart/form-data">
                          @csrf
                            @method('put')
                            <p>Seleccionar Curso </p>
                            <div class="form-group row" style="display: none">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Nombres') }}</label>
                                <div class="col-sm-9">
                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="gestion" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('namEs',$aux) }}" minlength="4" maxlength="25" required="true" aria-required="true"/>
                                    @if ($errors->has('name'))
                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                  </div>
                                </div>
                            </div>
                              <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Seleccionar Curso') }}</label>
                                <div class="col-sm-7">
                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                     <select class="form-control" name="cur" id="input-name" class="form-group " required="true" aria-required="true">
                                        @foreach($curso as $cur)
                                        <option value="{{$cur->id_curso}}" > {{$cur->nomb_cur}} </option>

                                        @endforeach
                                    </select>
                                    @if ($errors->has('name'))
                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Seleccionar Paralelo') }}</label>
                                <div class="col-sm-7">
                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                     <select class="form-control" name="para" id="input-name" class="form-group " required="true" aria-required="true">
                                        @foreach($para as $par)
                                        <option value="{{$par->id_para}}" > {{$par->letra}} </option>

                                        @endforeach
                                    </select>
                                    @if ($errors->has('name'))
                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                  </div>
                                </div>
                              </div>
                        <button type="submit" class="btn btn-primary mr-1">Enviar</button>
                        <button class="btn btn-light">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
@push('links')

@endpush
@push('scripts')
<script src="{{ asset('gentelella') }}/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

@endpush
