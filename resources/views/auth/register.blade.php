<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>RuangAdmin - Login</title>
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/ruang-admin.min.css')}}" rel="stylesheet">

</head>

<body background="{{asset('assets\img\rainbow.png')}}" >
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>

                    <form action="{{ route('register.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Nama">
                    </div>
                    @error('name')
                      <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                    </div>
                    @error('username')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    </div>
                    @error('password')
                      <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group">
                      <label>No Telephone</label>
                      <input type="text" id="telepon" name="telepon" class="form-control @error('telepon') is-invalid @enderror" placeholder="00000000">
                    </div>
                    @error('telepon')
                      <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror

                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="{{route('login')}}">Already have an account?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/js/ruang-admin.min.js')}}"></script>
</body>

</html>

