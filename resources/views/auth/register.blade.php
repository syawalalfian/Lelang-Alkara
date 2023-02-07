@extends('template.auth')

@section('section', 'Register')

@section('content')
    <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <form action="{{ route('register.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" id="name" name="name" class="form-control"  placeholder="Nama">
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label>No Telephone</label>
                      <input type="text" id="telepon" name="telepon" class="form-control" placeholder="00000000">
                    </div>
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="{{route('login')}}">Already have an account?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
@endsection
    
