@extends('layouts.ap', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Usuarios ')])
@section('content')

<div class="right_col" role="main">
    <div class="">
   <div class="row">
              <!-- form input mask -->
              <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Añadir Gestion</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                         </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('insertgestion') }}" autocomplete="off" class="form-horizontal form-label-left" novalidate  enctype="multipart/form-data">
                        @csrf
                        @method('put')
                      <div class="form-group row">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Gestion') }}</label>
                            <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="año" id="input-name" type="numeric" placeholder="{{ __('Gestion') }}" value="{{ old('año') }}" required="true" aria-required="true"/>
                                @if ($errors->has('name'))
                                  <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                @endif
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-5 col-form-label">{{ __('Inicio de Gestion') }}</label>
                            <div class="col-sm-9">
                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="inicio" id="input-name" type="date" placeholder="{{ __('Gestion') }}" value="{{ old('año') }}" required="true" aria-required="true"/>
                                @if ($errors->has('name'))
                                  <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                @endif
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-5 col-form-label">{{ __('Final de Gestion') }}</label>
                            <div class="col-sm-9">
                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="fin" id="input-name" type="date" placeholder="{{ __('Gestion') }}" value="{{ old('año') }}" required="true" aria-required="true"/>
                                @if ($errors->has('name'))
                                  <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                @endif
                              </div>
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
              <!-- /form input mask -->



            </div>

            </div>
         </div>
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
