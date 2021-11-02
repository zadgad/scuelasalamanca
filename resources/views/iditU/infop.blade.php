@extends('layouts.ap', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Usuarios ')])
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
              <h3>Informacion De Usuario</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                <div class="input-group">

                </div>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="col-md-3 col-sm-3  profile_left">
                    <div class="profile_img">
                      <div id="crop-avatar">
                        @if(!empty(session()->get('image')->first()))
                        <img {{$ima=session()->get('image')}} src="{{Storage::url($ima[0])}}" class="img-circle profile_img"/>
                        @else
                        <img src="{{Storage::url('image.gif')}}" class="img-circle profile_img" />
                        @endif

                      </div>
                    </div>
                    <h3>{{$users->nombre}} {{$users->apepa}} {{$users->apema}}</h3>
<hr>
                    <p class="card-subtitle">{{$users->ro}}</p>
<hr>
                    <ul class="list-unstyled user_data">
                      <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $users->fecha_n }}
                      </li>
                      <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $users->ci2 }}
                      </li>
                      <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $users->direccion }}
                      </li>
                      <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $users->telefono }}
                      </li>
                      <li>
                        <i class="fa fa-briefcase user-profile-icon"></i> {{ $users->email }}
                      </li>


                    </ul>

                  </div>
                  <div class="col-md-9 col-sm-9 ">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Editar Informacion</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Cambiar Contraseña</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                          <!-- start recent activity -->
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <div class="x_panel">

                                <div class="x_content">
                                        <form method="post" action="{{ route('edit',$id=session()->get('id')->first()) }}" autocomplete="off" class="form-horizontal form-label-left" novalidate  enctype="multipart/form-data">
                                            @csrf
                                            @method('put')

                                    <span class="section">Cambiar Su Informacion</span>
                                    <div class="item form-group">
                                        <label class="ol-form-label col-md-3 col-sm-3 label-align">{{ __('Cambiar Imagen') }}</label>
                                           <div class="col-sm-7">
                                              <div class="form-group">
                                                  <input type="file" name="Foto" id="Foto" class="default" value=""/>

                                              </div>
                                           </div>
                                        </div>

                                    <div class="item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nombres<span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6">
                                        <input id="name" class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="{{ __('Nombres') }}" value="{{ old('name', $users->nombre) }}" required="required" type="text">
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Apellido Paterno <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6">
                                        <input type="tex" id="pat" name="appa" required="required" class="form-control" data-validate-length-range="6" data-validate-words="2"  placeholder="{{ __('Apellido Paterno') }}" value="{{ old('appa', $users->apepa) }}">
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Apellido Materno <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6">
                                        <input type="tex" id="tex" name="apema" data-validate-length-range="6" data-validate-words="2" required="required" class="form-control" placeholder="{{ __('Apellido Materno') }}" value="{{ old('apema', $users->apema) }}">
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="number">CI <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6">
                                          <input type="numeric" id="number" name="carnet" required="required" data-validate-minmax="10,100"  class="form-control" placeholder="{{ __('C.I.') }}" value="{{ old('ci', $users->ci2) }}" >
                                        </div>
                                      </div>
                                      <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Login <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6">
                                          <input type="email" id="email" name="login" required="required" class="form-control"  placeholder="{{ __('Login') }}" value="{{ old('login', $users->login) }}">
                                        </div>
                                      </div>
                                      <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6">
                                          <input type="email" id="email" name="email" required="required" class="form-control" placeholder="{{ __('email') }}" value="{{ old('email', $users->email) }}">
                                        </div>
                                      </div>
                                    <div class="item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="number">Direccion <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6">
                                        <input type="tex" id="direccion" name="direccion" required="required" data-validate-minmax="10,100" class="form-control" placeholder="{{ __('Direccion') }}" value="{{ old('direccion', $users->direccion) }}">
                                      </div>
                                    </div>
                                    <div class='item form-group'>
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="number">Fecha De Nacimiento <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="date" id="number" name="nacimiento" required="required" data-validate-minmax="10,100" class="form-control" value="{{ old('nacimiento', $users->fecha_n) }}" >
                                          </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="website">Telefono <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6">
                                        <input type="numeric" id="telef" name="telef" required="required"  class="form-control" value="{{ old('telef', $users->telefono) }}" >
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label for="password" class="col-form-label col-md-3 label-align">Edad</label>
                                      <div class="col-md-6 col-sm-6">
                                        <input id="edad" type="numeric" name="edad" data-validate-length="6,8" class="form-control" required="required" value="{{ old('edad', $users->edad) }}" >
                                      </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-6 offset-md-3">
                                        <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                          <!-- end recent activity -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                          <!-- start user projects -->
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <div class="x_panel">
                                <div class="x_title">
                                  <h2>Form validation <small>sub title</small></h2>
                                  <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        </div>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                  </ul>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form method="post" action="{{ route('editP',$id=session()->get('id')->first())}}" autocomplete="off" class="form-horizontal form-label-left" novalidate  enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                    <span class="section"></span>


                                      <div class="item form-group">
                                        <label for="password" class="col-form-label col-md-3 label-align">Contraseña Anterior</label>
                                        <div class="col-md-6 col-sm-6">
                                          <input id="password" type="password" name="old_password" data-validate-length="6,8" class="form-control" required="required">
                                        </div>
                                      </div>

                                    <div class="item form-group">
                                      <label for="password" class="col-form-label col-md-3 label-align">Nueva Contraseña</label>
                                      <div class="col-md-6 col-sm-6">
                                        <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control" required="required">
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label for="password2" class="col-form-label col-md-3 col-sm-3 label-align ">Confirmar Contraseña</label>
                                      <div class="col-md-6 col-sm-6">
                                        <input id="password2" type="password" name="password_confirmation" data-validate-linked="password" class="form-control" required="required">
                                      </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-6 offset-md-3">
                                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                          <!-- end user projects -->

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>    </div>
  </div>


@endsection
@push('links')
<link href="{{ asset('gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="{{ asset('gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="{{ asset('gentelella') }}/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<!-- Ion.RangeSlider -->
<link href="{{ asset('gentelella') }}/vendors/normalize-css/normalize.css" rel="stylesheet">
<link href="{{ asset('gentelella') }}/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
<link href="{{ asset('gentelella') }}/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
<!-- Bootstrap Colorpicker -->
<link href="{{ asset('gentelella') }}/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

<link href="{{ asset('gentelella') }}/vendors/cropper/dist/cropper.min.css" rel="stylesheet">

@endpush
@push('scripts')

<script src="{{ asset('gentelella') }}/vendors/raphael/raphael.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/morris.js/morris.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('gentelella') }}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('gentelella') }}/vendors/moment/min/moment.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{ asset('gentelella') }}/vendors/moment/min/moment.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="{{ asset('gentelella') }}/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Ion.RangeSlider -->
<script src="{{ asset('gentelella') }}/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap Colorpicker -->
<script src="{{ asset('gentelella') }}/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- jquery.inputmask -->
<script src="{{ asset('gentelella') }}/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- jQuery Knob -->
<script src="{{ asset('gentelella') }}/vendors/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- Cropper -->
<script src="/vendors/cropper/dist/cropper.min.js"></script>


@endpush
