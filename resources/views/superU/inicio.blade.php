@extends('layouts.ap', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Usuarios ')])
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Bien venido al sistema</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="">
            <div class="x_content">
              <div class="row">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-qq"></i>
                    </div>
                    <div class="count">{{ $countA }}</div>

                    <h3>Administradores</h3>
                    <p>Total de usuarios con rol Administrador.</p>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-users"></i>
                    </div>
                    <div class="count">{{ $countS }}</div>

                    <h3>Secretaria</h3>
                    <p>Total de usuarios con rol de Secretaria.</p>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-mortar-board"></i>
                    </div>
                    <div class="count">{{ $countT }}</div>

                    <h3>Estudiante</h3>
                    <p>Total de usuarios con el rol de Estudiante.</p>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-github-alt"></i>
                    </div>
                    <div class="count">{{ $countE }}</div>

                    <h3>Tutores</h3>
                    <p>Total de usuarios con el rol de Tutor.</p>
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-globe"></i>
                      </div>
                      <div class="count">{{ $count }}</div>

                      <h3>Usuarios Total</h3>
                      <p>Usuarios que estan registrados en sistema.</p>
                    </div>
                  </div>
              </div>
  <br />

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('links')
<link href="{{ asset('gentelella') }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

@endpush
@push('scripts')
<script src="{{ asset('gentelella') }}/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- jQuery Sparklines -->
<script src="{{ asset('gentelella') }}/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- easy-pie-chart -->
<script src="{{ asset('gentelella') }}/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('gentelella') }}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

@endpush
