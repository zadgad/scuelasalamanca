@extends('layouts.ap', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Usuarios ')])
@section('content')

<div class="right_col" role="main">
    <div class="">


        <div  class="row">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header"><h3>Formulario De Registros</h3></div>
                            <div class="card-body">
                              <form method="post" action="{{route('insertar')}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                              enctype="multipart/form-data">
                              @csrf
                                @method('post')
                                 <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Nombres') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('name') }}" minlength="4" maxlength="25" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                        </div>

                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Apellido Pat.') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="apelliP" id="input-name" type="text" placeholder="{{ __('Apellido Paterno') }}" value="{{ old('name') }}" required="true" minlength="4" maxlength="25" minlength="4" maxlength="25" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Apellido Mat.') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="apelliM" id="input-name" type="text" placeholder="{{ __('Apellido Materno') }}" value="{{ old('name') }}" required="true" minlength="4" maxlength="25" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('CI') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="CI" id="input-name" type="text" patter="" placeholder="{{ __('Numero De Cedula De Identidad') }}" value="{{ old('CI') }}" required="true"  aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" minlength="4" maxlength="25" required />
                                            @if ($errors->has('email'))
                                              <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Num. Telefonico') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="telefono" id="input-name" type="text" placeholder="{{ __('Numero Telefonico o Celular') }}" value="{{ old('telefono') }}" required="true" minlength="6" maxlength="9" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label" for="input-password">{{ __(' Password') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" value="" minlength="4" maxlength="25" required />
                                            @if ($errors->has('password'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group">
                                            <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" value="" minlength="4" maxlength="25" required />
                                          </div>
                                        </div>
                                      </div>


                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Rol de Usuario') }}</label>
                                <div class="col-sm-7">
                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            {{--                         <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
             --}}                   <select class="form-control" name="rol" id="input-name" class="form-group " required="true" aria-required="true">
                                        @foreach($rols as $rol)
                                        <option value="{{$rol->id_rol}}" > {{$rol->ro}} </option>

                                        @endforeach
                                    </select>
                                    @if ($errors->has('name'))
                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            <div class="form-group">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Seleccionar Imagen</label>
                                <input type="file" name="Foto" class="file-upload-default">
                                <div class="input-group col-xs-9">
                                    <span class="input-group-append">
                                    </span>
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
