<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        @if (Auth()->user())

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ asset('storage/image/user/'. auth()->user()->avatar) }}" width="30px" height="30px" class="mr-1 img-circle elevation-2" alt="User Image">
                {{ auth()->user()->name }}</i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Pengaturan</span>
                <div class="dropdown-divider"></div>
                <p data-toggle="modal" data-target="#exampleModal" class="dropdown-item" style="cursor: pointer">
                    <i class="fas fa-user mr-2"></i> Profil
                </p>
                <div class="dropdown-divider"></div>
                <p data-toggle="modal" data-target="#logout" class="dropdown-item btn" style="cursor: pointer">
                    <i class="fas fa-arrow-left mr-2"></i> Keluar
                </p>
            </div>
        </li>
        @endif
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> --}}
    </ul>
</nav>
<!-- /.navbar -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/backoffice/user/{{ auth()->user()->id }}/update" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="name" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                        @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                        @if($errors->has('email'))
                            <span class="help-block" style="color: red">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <input type="hidden" name="oldImage" value="{{ auth()->user()->avatar }}">
                        @if (auth()->user()->avatar)
                            <img src="{{ asset('storage/image/user/'. auth()->user()->avatar) }}" name="oldValue" value="$user->avatar" class="img-previewP img-fluid mb-3 col-sm-5 d-block" alt="">
                        @else
                            <img src="" class="img-previewP img-fluid mb-3 col-sm-5" alt="">
                        @endif
                        <input type="file" accept=".jpg, .jpeg, .png, .svg" onchange="previewImgP()" id="imageP" name="avatar" class="form-control" placeholder="Enter Password">
                        @if($errors->has('avatar'))
                        <span class="help-block" style="color: red">{{ $errors->first('avatar') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logout" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logout">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin akan logout
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-success">Save changes</button> --}}
                    <a href="/logout" class="btn btn-success">Logout</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function previewImgP() {
        const image = document.querySelector('#imageP')
        const imgPreview = document.querySelector('.img-previewP')

        imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>
