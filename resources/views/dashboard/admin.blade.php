@extends('template.main')

@section('title', 'Dashboard Admin')
    
@section('content')
    <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard.admin')}}">Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body bg-gradient-primary text-white">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Petugas</div>
                      <div class="h5 mb-0 font-weight-bold text-white-800">{{ $totaluser }}</div>
                      
                    </div>
                    <div class="col-auto">
                      <a href="/Admin/Datapetugas"><i href class="fas fa-user-friends fa-2x text-white"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">  
              <div class="card h-100">
                <div class="card-body bg-gradient-success text-white">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Barang</div>
                      <div class="h5 mb-0 font-weight-bold text-white-800">{{ $totalbarang }}</div>
                      
                    </div>
                    <div class="col-auto">
                      <a href="/barang"><i class="fas fa-boxes fa-2x text-white"></i></a>   
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            
        </div>
    </div>
@endsection