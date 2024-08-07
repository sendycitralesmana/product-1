<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Matahari LED @yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('images/logo.webp')}}" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/dist/css/adminlte.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    {{-- <link rel="stylesheet" href=" {{ asset('assets/adminltes/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }} "> --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="{{asset('assets/ckeditor5/ckeditor.js')}}"></script>
    
    <style>

        /* .card-primary {
            border: #F97316 !important;
        } */

        @media (max-width: 768px) {
            .post-content {
                flex-direction: column;
            }
            .post-position {
                width: 100% !important;
                order: 2;
            }
            .menu-position {
                width: 100% !important;
                order: 1 !important;
            }

            /* .active {
                color: #F97316 !important;
            } */
        }

    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- navbar -->
        @include('backoffice/layouts/navbar')
        <!-- end navbar -->

        <!-- sidebar -->
        @include('backoffice/layouts/sidebar')
        <!-- end sidebar -->

        <!-- content -->
        @yield('content')
        <!-- end content -->

        <footer class="main-footer">
            {{-- <strong>Copyright &copy; 2023 <a href="http://matahari.co.id">Matahari LED</a>.</strong> --}}
            <a target="_blank" href="https://matahariled.co.id">
                <b>Matahari LED</b>
            </a>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


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
    <script src="{{asset('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- SweetAlert2 -->
    {{-- <script src=" {{ asset('assets/adminlte/plugins/sweetalert2/sweetalert2.min.js') }} "></script> --}}
    <!-- page script -->

    <script>
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    </script>

    {{-- <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFReader.target.result;
            }
        }
    </script> --}}

    {{--  --}}


    {{--  --}}

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js" integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
