@extends('template.main')

@section('title', 'Dashbord Petugas')

@section('content')
    <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard.petugas')}}">Petugas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            
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
                         <i class="fas fa-boxes fa-2x text-success-bold"></i>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body bg-gradient-info text-white ">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Lelang</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-white-800">{{ $totallelang }}</div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-gavel fa-2x text-info-bold"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body bg-gradient-warning text-white">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Penawaran</div>
                      <div class="h5 mb-0 font-weight-bold text-white-800">{{ $totalpenawaran }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-paper-plane fa-2x text-warning-bold"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection