
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts._head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('assets/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
       @include('admin.layouts._topNav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

    @include('admin.layouts._leftNav')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <!-- footer -->
      @include('admin.layouts._footer')
  <!-- footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
    @include('admin.layouts._js')
<!-- jQuery -->
</body>
</html>
