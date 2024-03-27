<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Matahari LED @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        {{-- <div class="">
            <h1 class="text-center">
                <b>MASUK</b>
            </h1>
        </div> --}}
        <div class="card">
            <img src="{{asset('images/banner.jpg')}}" class="img-fluid rounded" alt="">
            {{-- <div class="mr-4 mt-3">
                <img src="{{asset('images/logoMled.png')}}" class="img-fluid rounded" alt="">
            </div> --}}
            <div class="card-body login-card-body">
                <h3 class="text-center">
                    <b>-- Masuk --</b>
                </h3>
                <p class="login-box-msg">Masuk untuk mengakses halaman admin</p>
                @if(session('status'))
                <div class="alert alert-success">
                    <button type="button" class="btn btn-success btn-sm close" data-dismiss="alert" sty>&times;</button>
                    <h4 class="message-head">{{ session('message') }}</h4>
                </div>
                @endif
                @if(session('register'))
                <div class="alert alert-success">
                    <button type="button" class="btn btn-success btn-sm close" data-dismiss="alert" sty>&times;</button>
                    <h4 class="message-head">{{ session('message') }}</h4>
                </div>
                @endif
                <form action="/login-process" method="POST">
                    {{ csrf_field() }}
                    @if($errors->has('email'))
                        <span class="help-block text-danger mb-4">{{ $errors->first('email') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    
                    @if($errors->has('password'))
                        <span class="help-block text-danger mb-4">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" style="color: aliceblue">
                                <i class="fa fa-arrow-right"></i> <b>Masuk</b>     
                            </button>
                        </div>
                        {{-- <div class="col-12 text-center mt-2">
                            Belum punya akun? <a href="/register" class=""> <b>Daftar</b> </a>
                            <hr>
                        </div> --}}
                    </div>
                    <div class="">
                        <div class=" text-right" >
                            <a href="/forgot-password" > <i class="fa fa-info"></i> Lupa password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

        <!-- jQuery -->
        <script src="{{asset('assets/adminlte/plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('assets/adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)

        </script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('assets/adminlte/dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('assets/adminlte/dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('assets/adminlte/dist/js/demo.js')}}"></script>
        <!-- DataTables -->
        <script src="{{asset('assets/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}">
        </script>
        <script src="{{asset('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}">
        </script>

</body>

</html>
