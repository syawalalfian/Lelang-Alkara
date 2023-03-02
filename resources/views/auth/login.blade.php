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
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>

                    <form action="{{ route('login.proses') }}" method="POST">
                      @csrf
                    <div class="form-group">
                      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"  placeholder="Username">
                    </div>
                    @error('username')
                      <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    </div>
                    @error('password')
                    <div class="alert alert-danger" role="alert">
                    {{ $message }}
                  </div>
                    @enderror

                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                 </form>

                  <div class="text-center">
                    <a class="font-weight-bold small" href="{{route('register')}}">Create an Account!</a>
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