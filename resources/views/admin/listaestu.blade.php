@extends('layouts.ap', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Usuarios ')])
@section('content')

<div class="right_col" role="main">
    <div class="">
   <div class="row">


    <div class="page-title">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Estudiantes Registrados en Sistema <small>Users</small></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                <p class="text-muted font-13 m-b-30">
                  Estudiantes en sistema, para mantener informacion constante en el sistema
                </p>
                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                        <th class="text-center">
                            {{ __('#') }}
                        </th>
                        <th class="text-center">
                              {{ __('Foto') }}
                        </th>
                        <th class="text-center">
                          {{ __('Nombre') }}
                        </th>
                        <th class="text-center">
                          {{ __('Apellido Pa.') }}
                        </th>
                        <th class="text-center">
                          {{ __('Apellido Ma') }}
                        </th>
                        <th class="text-center">
                          {{ __('Login') }}
                        </th>
                        <th class="text-center">
                          {{ __('Email') }}
                        </th>
                        <th class="text-center">
                          {{ __('Rol') }}
                        </th>
                        <th class="text-right">
                          {{ __('Actions') }}
                        </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($userE as $user)
                    <tr>
                     <td class="text-center">
                   {{ $loop->iteration }}
                 </td>
                 <td>
                     @if(!empty($user->foto))
                     <img src="{{Storage::url($user->foto)}}" class="rounded-circle img-80 align-top mr-15" width="80"/>
                     @else
                     <img src="{{Storage::url('image.gif')}}" class="rounded-circle img-80 align-top mr-15" width="80"/>

                     @endif
                   </td>
                 <td class="text-center">
                   {{ $user->nombre }}
                 </td>
                 <td class="text-center">
                   {{ $user->apepa }}
                 </td>
                 <td class="text-center">
                   {{ $user->apema }}
                 </td>
                 <td class="text-center">
                   {{ $user->login }}
                 </td>
                 <td class="text-center">
                   {{ $user->email }}
                 </td>
                 <td class="text-center">
                   {{ $user->ro }}
                 </td>
                 <td class="td-actions text-right">
                       @if ($user->id_usr != session()->get('id')->first())
                       <form action={{-- "{{ route('user.destroy', $user) }}" --}}  method="post">
                             @csrf
                             @method('delete')

                             <a  href="{{route('editaruser',$id=$user->id_usr)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                               <a href=""><i class="ik ik-trash-2 f-16 text-red"></i></a>
                         </form>
                       @else
                       <a  href="{{route('infoRut',$user->id_usr)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                       @endif
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



@endsection
@push('links')

<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <link href="{{ asset('gentelella') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->

    <link href="{{ asset('gentelella') }}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('gentelella') }}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('gentelella') }}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('gentelella') }}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('gentelella') }}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

@endpush
@push('scripts')
<!-- NProgress -->
<!-- iCheck -->
<script src="{{ asset('gentelella') }}/vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="{{ asset('gentelella') }}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/jszip/dist/jszip.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
@endpush

