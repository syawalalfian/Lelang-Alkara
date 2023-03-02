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
            <h5 class="my-3">{{Auth::user()->username}}</h5>
            <p class="text-muted mb-1">{{Auth::user()->level}}</p>
            
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
                <p class="text-muted mb-0">{{Auth::user()->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth::user()->username}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth::user()->telepon}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Level</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth::user()->level}}</p>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
@endsection