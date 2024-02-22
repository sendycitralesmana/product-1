@extends('backoffice/layouts/main')

@section('title', 'Profile')

@section('content')

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Profil</li>
                  </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center mb-4">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset('storage/image/user/'. auth()->user()->avatar) }}"
                         alt="User profile picture" style="height: 200px; width: 200px">
                  </div>
  
                  {{-- <h3 class="profile-username text-center">Nina Mcintire</h3>
  
                  <p class="text-muted text-center">Software Engineer</p> --}}
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Nama</b> <a class="float-right">{{ auth()->user()->name }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{ auth()->user()->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Peran</b> <a class="float-right">{{ auth()->user()->role->name }}</a>
                    </li>
                  </ul>
  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!-- /.col -->
            {{-- <div class="col-md-8">
              <div class="card">
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
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#editData" data-toggle="tab">
                            <i class="fa fa-pen"> Edit data</i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#editPassword" data-toggle="tab">
                            <i class="fa fa-lock"> Ganti password</i>
                        </a>
                    </li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    
                  <div class="tab-content">
  
                    <div class="tab-pane active" id="editData">
                      <form class="form-horizontal" action="/backoffice/user/{{ auth()->user()->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="oldImage" value="{{ auth()->user()->avatar }}">
                                @if (auth()->user()->avatar)
                                    <img src="{{ asset('storage/image/user/'. auth()->user()->avatar) }}" name="oldValue" value="$user->avatar" 
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                                @else
                                    <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                @endif
                                <input type="file" accept="image/*" onchange="previewImg()" id="image" name="avatar" class="form-control">
                                @if($errors->has('avatar'))
                                <span class="help-block" style="color: red">{{ $errors->first('avatar') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputName" value="{{ auth()->user()->name }}" required
                            oninvalid="this.setCustomValidity('Nama harus diisi')"
                            oninput="this.setCustomValidity('')">
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    
                    <div class="tab-pane" id="editPassword">
                      <form class="form-horizontal" action="/backoffice/user/{{ auth()->user()->id }}/updatePassword" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Password lama</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Password baru</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Konfirmasi Password baru</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div> --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
        
                        <h3 class="card-title">Edit data</h3>
                        <div class="card-tools">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
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
        
                        <form method="post" action="/backoffice/user/{{ auth()->user()->id }}/update" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama</label>
                                    <input type="name" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                                    @if($errors->has('name'))
                                        <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="hidden" name="oldImage" value="{{ auth()->user()->avatar }}">
                                    @if (auth()->user()->avatar)
                                        <img src="{{ asset('storage/image/user/'. auth()->user()->avatar) }}" name="oldValue" value="$user->avatar" 
                                        class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                                    @else
                                        <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                    @endif
                                    <input type="file" accept="image/*" onchange="previewImg()" id="image" name="avatar" class="form-control" placeholder="Enter Password">
                                    @if($errors->has('avatar'))
                                    <span class="help-block" style="color: red">{{ $errors->first('avatar') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-paper-plane"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
        
                        <h3 class="card-title">Ganti password</h3>
                        <div class="card-tools">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
        
                    </div>
                    <div class="card-body">
                        @if (Session::has('password'))
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
                        @if (Session::has('password_lama'))
                        <script type="text/javascript">
                            document.addEventListener('DOMContentLoaded', function () {
                                Swal.fire({
                                title: "Oops!",
                                text: "{{Session::get('message')}}",
                                icon: "error"
                                });
                            });
                        </script>
                        @endif
                        
                        <form method="post" action="/backoffice/user/{{ auth()->user()->id }}/update-password" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Password lama</label>
                                    <input type="password" name="password_lama" class="form-control" required
                                    oninvalid="this.setCustomValidity('Password lama harus diisi')"
                                    oninput="this.setCustomValidity('')">
                                    @if($errors->has('password_lama'))
                                        <span class="help-block" style="color: red">{{ $errors->first('password_lama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Password baru</label>
                                    <input type="password" name="password_baru" class="form-control" required
                                    oninvalid="this.setCustomValidity('Password baru harus diisi')"
                                    oninput="this.setCustomValidity('')">
                                    @if($errors->has('password_baru'))
                                        <span class="help-block" style="color: red">{{ $errors->first('password_baru') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Konfirmasi Password baru</label>
                                    <input type="password" name="konfirmasi_password_baru" class="form-control" required
                                    oninvalid="this.setCustomValidity('Konfirmasi password baru harus diisi')"
                                    oninput="this.setCustomValidity('')">
                                    @if($errors->has('konfirmasi_password_baru'))
                                        <span class="help-block" style="color: red">{{ $errors->first('konfirmasi_password_baru') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
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