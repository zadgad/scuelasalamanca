@extends('layouts.ap', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Usuarios ')])
@section('content')

<div class="right_col" role="main">
    <div class="">
   <div class="row">


    <div class="page-title">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Gestiones Registrados en Sistema <small>Users</small></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                <p class="text-muted font-13 m-b-30">
                  Años registrados en sistema, para mantener informacion constante en el sistema
                </p>
                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Numeracion</th>
                      <th>Año</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Final</th>
                      <th>Cursos</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($select as $sel)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                              </td>
                              <td>
                                  {{ $sel->año }}
                              </td>
                              <td>
                                {{ $sel->fecha_ini }}
                            </td>
                            <td>
                                {{ $sel->fecha_fin }}
                            </td>
                            <td>
                                <a href="{{ route('cursosges',$id=$sel->id_gest) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver Cursos </a>
                                </td>
                              <td>
                                <a href="{{ route('editargest',$id=$sel->id_gest) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                                </td>
                        </tr>

                    @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
            </div>
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

@endpush
