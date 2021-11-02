<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Sistema Daniel Salamanca</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
            @if(!empty(session()->get('image')->first()))
            <img {{$ima=session()->get('image')}} src="{{Storage::url($ima[0])}}" class="img-circle profile_img"/>
            @else
            <img src="{{Storage::url('image.gif')}}" class="img-circle profile_img" />
            @endif

        </div>
        <div class="profile_info">
          <span>Bien Venido</span>
          <h2>{{$id=session()->get('nombre')->first()}}</h2>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>{{session()->get('rol')->first()}}</h3>
          <ul class="nav side-menu">
            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> INICIO <span class="label label-success pull-right"></span></a></li>

            <li><a><i class="fa fa-edit"></i> LISTA DE USUARIOS <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{route('list_ad')}}"    >Lista Administradores</a></li>
                <li><a href="{{route('list_em')}}"    >Lista Secretarias</a></li>
                <li><a href="{{route('list')}}"       >Lista Tutores</a></li>
                <li><a href="{{route('listEstu')}}"     >Lista Estudiantes</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Gestion  <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{ route('addgestion') }}">Agregar Gestion</a></li>
                  <li><a href="{{ route('tabgestion') }}">Gestiones Registrados</a></li>
                </ul>
              </li>


            <li><a><i class="fa fa-table"></i> Formularios <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('formulario') }}">Agregar Usuario</a></li>
                <li><a href="{{ route('curinicial') }}">Formulario Inicial</a></li>
                <li><a href="{{ route('curinifamiliar') }}">Formulario InicialF</a></li>
                <li><a href="{{ route('estudnuevo') }}">Formulario Nuevo</a></li>
                <li><a href="{{ route('estudfamilia') }}">Formulario Familiar</a></li>
              </ul>
            </li>

          </ul>
        </div>

      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->

      <!-- /menu footer buttons -->
    </div>
  </div>
