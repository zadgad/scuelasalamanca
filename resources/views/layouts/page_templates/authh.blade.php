<div class="main_container">
    @include('layouts.navbars.sideb')
    @include('layouts.navbars.navs.auth')


    @yield('scripts')
    @yield('content')
    <div class="page-wrap">



      <div class="text-right">
        @include('layouts.footers.auth')
      </div>

    </div>
  </div>
