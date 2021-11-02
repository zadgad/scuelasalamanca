@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Ventana De Inicio')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">{{ __('BIENVENIDO A NUESTRA COMUNIDAD, SISTEMA DE REGISTRO DE LA UNIDAD EDUCATIVA DANIEL SALAMANCA.') }}</h1>
      </div>
  </div>
</div>
@endsection
