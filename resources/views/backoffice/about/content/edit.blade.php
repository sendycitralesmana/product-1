@extends('backoffice/layouts/main')

@section('title', '- Konten')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit konten</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/backoffice/about/content" class="">Konten</a></li>
                        <li class="breadcrumb-item active">Edit konten</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('content'))
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
                        <span>Edit data failed</span>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form role="form" method="POST" action="/backoffice/about/content/{{ $content->id }}/update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Judul <span class="text-danger">*</span></label>
                        <input type="text" name="title" required class="form-control" value="{{ $content->title}}">
                        @if($errors->has('title'))
                        <span class="help-block" style="color: red">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="description" id="editor1" class="form-control">{{ $content->description }}</textarea>
                        @if($errors->has('description'))
                        <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ $content->thumbnail }}">
                        @if ($content->thumbnail)
                            <img src="{{ asset('storage/image/content/'. $content->thumbnail) }}" name="oldValue" value="$content->thumbnail" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                        @else
                            <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                        @endif
                        <input type="file" accept="image/*" onchange="previewImg()" id="image" name="thumbnail" class="form-control" id="image">
                        @if($errors->has('thumbnail'))
                        <span class="help-block" style="color: red">{{ $errors->first('thumbnail') }}</span>
                        @endif
                    </div>
                    <button class="btn btn-success"> <i class="fas fa-save"></i> Simpan</button>
                </form>

            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

<script>
    function previewImg() {
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>