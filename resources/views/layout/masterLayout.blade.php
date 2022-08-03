
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Slip Gaji</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css', []) }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css', []) }}">
  <link rel="stylesheet" href="{{ url('dist/css/cssku.css?v=2', []) }}">
  <link rel="stylesheet" href="{{ url('select2/dist/css/select2.min.css', []) }}">
  
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="sidebar-mini sidebar-closed text-sm">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light pinkku">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" href="{{ url('logout', []) }}" role="button">
          <i class="fa fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar   text-dark  pinkku2 elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home', []) }}" class="brand-link pink-gelapku">
      <h3 class="brand-image rounded-circle bg-info px-1 text-bold" style="padding-top:2px ">SI</h3>
      <span class="brand-text text-bold text-white" style="font-size: 17px;letter-spacing: 2px">SLIP PENGGAJIAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-1 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('gambar/user.png', []) }}" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Session::get('nama')}}</a>
          <span>{{Session::get('posisi')}}</span>
        </div>
      </div>
      <hr>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item hoverku">
            <a href="{{ url('home', []) }}" class="nav-link @yield('activekuhome')">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          
          <li class="nav-item hoverku">
            <a href="{{ url('pegawai', []) }}" class="nav-link @yield('activekuPegawai')">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Data Pegawai
              </p>
            </a>
          </li>

          <li class="nav-item hoverku">
            <a href="{{ url('slip', []) }}" class="nav-link @yield('activekuSlip')">
              <i class="nav-icon fa fa-print"></i>
              <p>
                Cetak Slip Gaji
              </p>
            </a>
          </li>

          <li class="nav-item hoverku">
            <hr>
            <a href="{{ url('pengaturan', []) }}" class="nav-link @yield('activekuPengaturan')">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                PENGATURAN UMUM
              </p>
            </a>
          </li>

          <li class="nav-item hoverku">
            <a href="{{ url('pengaturancetak', []) }}" class="nav-link @yield('activekuPengaturancetak')">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                PENGATURAN CETAK
              </p>
            </a>
          </li>

          
          
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('judul')</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer text-sm footerku">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; {{ date("Y") }} <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js', []) }}"></script>
{{-- <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script> --}}
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js', []) }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.min.js', []) }}"></script>

@include('sweetalert::alert')

<script src="{{ url('select2/dist/js/select2.min.js', []) }}"></script>

@yield('myscript')

</body>
</html>
