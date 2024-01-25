@extends('backoffice/layouts/main')

@section('title', 'Post Category')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Post Category</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/post/category" class="text-secondary">Post Category</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                  </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

            {{-- Client Start --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @if (Session::has('status'))
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
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{ $postCategory->id }} </td>
                                <td> {{ $postCategory->name }} </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#postCategoryEdit{{ $postCategory->id }}">
                                        <span><i class="ion ion-android-create"></i> Edit</span>
                                    </button>
                                    {{-- Modal --}}
                                    @include('backoffice.post.category.modal.edit')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#postCategoryDelete{{ $postCategory->id }}">
                                        <span><i class="ion ion-android-delete"></i> Delete</span>
                                    </button>
                                    {{-- Modal --}}
                                    @include('backoffice.post.category.modal.delete')
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- category End --}}
    
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Post Data</h3>
                    <div class="card-tools">
                        @if (auth()->user()->role_id == 2)
                        @endif
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('post'))
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postCategory->post as $post)
                            <tr>
                                <td> {{ $post->id }} </td>
                                <td> 
                                    @if( $post->thumbnail != '' )
                                        <img src="{{asset('storage/image/post/'.$post->thumbnail)}}" alt="" width="100px" height="100px">
                                    @else
                                        <img src="{{asset('storage/image/default.png')}}" alt="" width="100px" height="100px">
                                    @endif
                                </td>
                                <td> {{ $post->title }} </td>
                                <td>
                                    @if (auth()->user()->role_id == 2)
                                    <a href="/backoffice/post/{{ $post->id }}/detail" class="btn btn-info btn-sm">Detail</a>
                                    
                                    {{-- <a href="/product/{{ $data->id }}/delete" onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger btn-sm">Delete</a> --}}
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

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection
