@extends('layouts.ap', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Usuarios ')])
@section('content')

<div class="right_col" role="main">
    <div class="">
    <div  class="row">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header"><h3>Formulario De Registros</h3></div>
                        <div class="card-body">
                            <form method="post" action="{{route('registnuevofami')}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                            enctype="multipart/form-data">
                            @csrf
                              @method('put')
                              <p>Seleccionar Curso </p>
                              <div class="form-group row">
                                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Seleccionar Gestion') }}</label>
                                  <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                       <select class="form-control" name="gest" id="input-name" class="form-group " required="true" aria-required="true">
                                          @foreach($gestion as $gest)
                                          <option value="{{$gest->id_gest}}" > {{$gest->año}} </option>

                                          @endforeach
                                      </select>
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
                                <p>Llenar los campos de Imformacion del Estudiante</p>
                              <div class="form-group row">
                                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Nombres') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="namEs" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('namEs') }}" minlength="4" maxlength="25" required="true" aria-required="true"/>
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
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="apelliPEs" id="input-name" type="text" placeholder="{{ __('Apellido Paterno') }}" value="{{ old('apelliPEs') }}" required="true" minlength="4" maxlength="25" minlength="4" maxlength="25" aria-required="true"/>
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
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="apelliMEs" id="input-name" type="text" placeholder="{{ __('Apellido Materno') }}" value="{{ old('apelliMEs') }}" required="true" minlength="4" maxlength="25" aria-required="true"/>
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
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="CIEs" id="input-name" type="text" patter="" placeholder="{{ __('Numero De Cedula De Identidad') }}" value="{{ old('CIEs') }}" required="true"  aria-required="true"/>
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
                                          <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="emailEs" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('emailEs') }}" minlength="4" maxlength="25" required />
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
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="telefonoEs" id="input-name" type="text" placeholder="{{ __('Numero Telefonico o Celular') }}" value="{{ old('telefonoEs') }}" required="true" minlength="6" maxlength="9" aria-required="true"/>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">{{ __('Vive Cerca') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                              <select id="provi" class="form-control" name="vive"  >
                                            <option value="">Seleccionar</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">{{ __('Trabaja Cerca') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                              <select id="provi" class="form-control" name="cerca"  >
                                            <option value="">Seleccionar</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">{{ __('Certificado Nacimiento') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                              <select id="provi" class="form-control" name="nacimiento"  >
                                            <option value="">Seleccionar</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">{{ __('Factura de Luz') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                              <select id="provi" class="form-control" name="luz"  >
                                            <option value="">Seleccionar</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">{{ __('Seleccionar Genero') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                              <select id="provi" class="form-control" name="genero"  >
                                            <option value="">Seleccionar Genero</option>
                                            <option value="Padre">Hombre</option>
                                            <option value="Madre">Mujer</option>
                                        </select>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                            <p>Llenar Informacion del Tutor</p>
                            <div id="unidad" class="form-group row" >
                                <label class="col-sm-3 col-form-label">{{ __('Tutor Registrado') }}</label>
                                <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="codigo" id="input-name" type="text" placeholder="{{ __('Buscar Tutor') }}" value="{{ old('codigo') }}" required="true" aria-required="true" list="select"/>
                                      <datalist id="select" >
                                          @foreach($padr as $pad)
                                          <option value="{{$pad->ci}}" > {{$pad->nombre}} {{' ' .$pad->apepa }}{{ ' '.$pad->apema }} </option>
                                          @endforeach
                                    </datalist>
                                    </div>
                                  </div>
                              </div>
                                  <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Tipo Tutor') }}</label>
                                <div class="col-sm-9">
                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <select id="provi" class="form-control" name="tipoTu"  >
                                      <option value="">Seleccionar Grado de Tutor</option>
                                      <option value="Padre">Padre</option>
                                      <option value="Madre">Madre</option>
                                      <option value="Hermano">Hermano</option>
                                      <option value="Hermana">Hermana</option>
                                      <option value="Tutor">Tutor Externo</option>
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
@endsection
@push('links')

@endpush
@push('scripts')
<script src="{{ asset('gentelella') }}/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

@endpush
