<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengadaan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master/dist/css/adminlte.min.css')}}">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master/plugins/toastr/toastr.min.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    
    </ul>

    <!-- Right navbar links -->
    @include('parsial.setting')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      @include('parsial.user')

     

      <!-- Sidebar Menu -->
      @include('parsial.menu')
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
            <h1>Pengajuan Masuk</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      
                      <th>Nama Pengadaan</th>
                      <th>Gambar</th>
                      <th>Anggaran (IDR)</th>
                      <th>Proposal</th>
                      <th>Anggaran Pengajuan (IDR)</th>
                      <th>Suplier</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Status Pengajuan</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pengajuan as $p)
                    <tr>
                      <td>{{$p['nama_pengadaan']}}</td>
                      <td><img style="width:70%;" src="{{asset(Storage::url($p['gambar']))}}"></td>
                      <td>{{number_format($p['anggaran'],0,",",".")}}</td>
                      <td>
                        <a class="btn btn-primary" target="blank" href="{{asset(Storage::url($p['proposal']))}}">Lihat Detail</a></td>
                      <td>{{number_format($p['anggaran_pengajuan'],0,",",".")}}</td>
                      <td>{{$p['nama_suplier']}}</td>
                      <td>{{$p['email_suplier']}}</td>
                      <td>{{$p['alamat_suplier']}}</td>
                      <td>{{$p['status_pengajuan']}}</td>
                      <td>
                        @if($p['status_pengajuan'] == 1)
                        <a href="/terimaPengajuan/{{$p['id_pengajuan']}}" class="btn btn-secondary konfirmasi"><i class="fas fa-check">  Terima</i>
                      </td></a>
                      <td>
                      <a href="/tolakPengajuan/{{$p['id_pengajuan']}}" class="btn btn-danger konfirmasi"><i class="fas fa-times">  Tolak</i></a>
                      @endif
                    </tr></td>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('parsial.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('AdminLTE-master/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE-master/dist/js/adminlte.min.js')}}"></script>

<!-- SweetAlert2 -->
<script src="{{asset('AdminLTE-master/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<script type="text/javascript">

  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

@if(\Session::has('berhasil'))
    Toast.fire({
        icon: 'success',
        title: '{{Session::get('berhasil')}}'
      })
@endif

@if(\Session::has('gagal'))
    Toast.fire({
        icon: 'error',
        title: '{{Session::get('gagal')}}'
      })
@endif

@if(count($errors) > 0)

Toast.fire({
        icon: 'error',
        title: '<ul>@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul>'
      })

@endif

    
});

  $(document).on("click", ".konfirmasi", function(event)
  {
    event.preventDefault();
    const url = $(this).attr('href');

    var answer = window.confirm("Kamu yakin ?");

    if(answer){
      window.location.href = url;
    }else{

    }
  });
</script>

</body>
</html>
