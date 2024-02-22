@extends('backoffice/layouts/main')

@section('title', '- Pesan')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pesan </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Pesan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pesan dari publik</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
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

                <div class="row">
                    @foreach ($messages as $message)
                    <div class="col-md-12">
                        <div class="card card-widget">
                            <div class="card-header">
                                <div class="user-block">
                                    <img class="img-circle" src="{{ asset('images/profile.png') }}" alt="User Image">
                                    <span class="username">{{ $message->name }}</span>
                                    <span class="description">{{ $message->email }} - {{ $message->created_at->diffForHumans() }}</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <p>{{ $message->message }}</p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#messageDelete{{$message->id}}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.contact-us.modal.delete')
                                @if ($message->messageEmail == null)
                                <span class="float-right text-muted"> Belum ada balasan dari operator</span>
                                @else
                                <span class="float-right text-muted"> Balasan dari operator</span>
                                @endif
                            </div>
                            <!-- /.card-body -->

                            @if ($message->messageEmail != null)
                            <div class="card-footer card-comments">
                                <div class="card-comment">
                                    <!-- User image -->
                                    @if ( auth()->user()->avatar == null )
                                        <img src="{{ asset('images/profile.png') }}" alt="" class="img-fluid">
                                    @else
                                        <img class="img-circle img-sm" src="{{asset('storage/image/user/'. auth()->user()->avatar)}}" alt="User Image" class="img-fluid">
                                    @endif

                                    <div class="comment-text">
                                        <span class="username">
                                            {{ $message->messageEmail->user->name }} <small>({{ $message->messageEmail->user->email }})</small>
                                            <span class="text-muted float-right">{{ $message->messageEmail->created_at->diffForHumans() }}</span>
                                        </span><!-- /.username -->
                                        {{ $message->messageEmail->message }}
                                    </div>
                                    <!-- /.comment-text -->
                                </div>
                            </div>
                            @else
                            <div class="card-footer card-comments">
                                <form action="/backoffice/feedback/{{ $message->id }}/send" method="POST">
                                    @csrf
                                    <div class="card-comment">
                                        <!-- User image -->
                                        <img class="img-circle img-sm" src="{{asset('storage/image/profile.png')}}" alt="User Image">
    
                                        <div class="comment-text">
                                            <span class="username">
                                                {{ auth()->user()->name }} <small>({{ auth()->user()->email }})</small>
                                            </span><!-- /.username -->
                                            <div class="img-push mt-2">
                                                <textarea name="message" class="form-control" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-outline-success float-right mt-2">Kirim balasan</button>
                                        </div>
                                        <!-- /.comment-text -->
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>

                        <div class="p-3">
                            {{ $messages->links() }}
                        </div>

                    </div>
                    @endforeach
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
