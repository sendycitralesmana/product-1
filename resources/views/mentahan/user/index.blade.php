@extends('layouts/main')

@section('title', 'User')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Data</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 1)
                        <!-- Button trigger modal -->
                        <button title="Add Variant" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#userAdd">
                            <span>+</span>
                        </button>
                        {{-- Modal --}}
                        @include('user.modal.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="btn btn-danger close" data-dismiss="alert" sty>&times;</button>
                        @foreach ($errors->all() as $error)
                            Add user failed ( {{ $error }} )
                        @endforeach
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Avatar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td> {{ $user->id }} </td>
                            <td>
                                @if( $user->avatar != '' )
                                    <img src="{{asset('storage/image/user'.$user->avatar)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('storage/image/default.png')}}" alt="" width="100px" height="100px">
                                @endif    
                            </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td> {{ $user->role->name }} </td>
                            <td>
                                {{-- <a href="/user/{{ $user->id }}/edit" class="btn btn-warning btn-sm">Edit</a> --}}
                                @if (auth()->user()->id == 1)
                                <!-- Button trigger modal -->
                                <button title="Add Variant" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#userEdit{{ $user->id }}">
                                    <span>Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('user.modal.edit')
                                @endif
                                {{-- <a href="/user/{{ $user->id }}/delete" onclick="return confirm('Are you sure?')"
                                    class="btn btn-danger btn-sm">Delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Avatar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
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
