@extends('template.main')

@section('title', 'Profile Users')

@section('content')
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            @if($users->username == 'admin')
            <img src="{{asset('assets/img/kingmasbro.jpeg')}}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
              @else($users->username == 'petugas')
              <img src="{{asset('assets/img/boy.png')}}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
              @endif

              @if($users->username == 'admin')
            <h5 class="my-3">{{$users->username }}</h5>
              @else($users->username == 'petugas')
              <h5 class="my-3">{{$users->username }}</h5>
              @endif

              @if($users->level == 'admin')
            <p class="text-muted mb-1">{{$users->level}}</p>
            @else($users->username == 'petugas')
             <p class="text-muted mb-1">{{$users->level}}</p>
             @endif
            
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">

                @if($users->level == 'admin')
                <p class="text-muted mb-0">{{$users->name}}</p>
                @else($users->username == 'petugas')
                <p class="text-muted mb-0">{{$users->name}}</p>
                @endif

              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">

                @if($users->level == 'admin')
                <p class="text-muted mb-0">{{$users->username}}</p>
                @else($users->username == 'petugas')
                <p class="text-muted mb-0">{{$users->username}}</p>
                @endif

              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">

                @if($users->level == 'admin')
                <p class="text-muted mb-0">{{$users->telepon}}</p>
                @else($users->username == 'petugas')
                <p class="text-muted mb-0">{{$users->telepon}}</p>
                @endif

              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Level</p>
              </div>
              <div class="col-sm-9">

                @if($users->level == 'admin')
                <p class="text-muted mb-0">{{$users->level}}</p>
                @else($users->username == 'petugas')
                <p class="text-muted mb-0">{{$users->level}}</p>
                @endif

              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
@endsection