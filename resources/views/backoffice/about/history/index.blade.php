@extends('backoffice/layouts/main')

@section('title', 'History')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>History Data</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">History</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#historyAdd">
                        <span>+</span>
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.about.history.modal.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('history'))
                <script type="text/javascript">
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                        title: "Good job!",
                        text: "{{Session::get('message')}}",
                        icon: "success"
                        });
                    });
                </script>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="btn btn-danger close" data-dismiss="alert" sty>&times;</button>
                    <ul>
                        <span>Add data failed</span>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Year</th>
                            <th>Description</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                        <tr>
                            <td> {{ $history->id }} </td>
                            <td> 
                                @if( $history->thumbnail != '' )
                                    <img src="{{asset('storage/image/history/'.$history->thumbnail)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('storage/image/default.png')}}" alt="" width="100px" height="100px">
                                @endif
                            </td>
                            <td> {{ $history->title }} </td>
                            <td> {{ $history->year }} </td>
                            <td> 
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#historyDesc{{ $history->id }}">
                                    <span>See Description</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.about.history.modal.desc')
                            </td>
                            <td>
                                @if (auth()->user()->role_id == 2)
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#historyEdit{{ $history->id }}">
                                    <span>Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.about.history.modal.edit')
                                <a href="/backoffice/about/history/{{ $history->id }}/delete" onclick="return confirm('Are you sure?')"
                                    class="btn btn-danger btn-sm">Delete</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Year</th>
                            <th>Description</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
