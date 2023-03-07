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

        <div class="container-fluid">
                <div class="row">
                   <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Operator</h4>
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Level</th>
                                                <th scope="col">No Telepon</th>
                                            </tr>
                                        </thead>
                                        @forelse ($usersoperator as $item)
                                            <tbody>
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{Str::title($item->username)}}</td>
                                                <td>{{Str::title($item->level)}}</td>
                                                <td>{{$item->telepon}}</td>
                                            </tr>
                                            
                                        </tbody>
                                        @empty
                                            Data Masih Kosong
                                        @endforelse
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card mb-5">
                            <div class="card-body">
                                <h4 class="card-title">Data Masyarakat</h4>
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Level</th>
                                                <th scope="col">No Telepon</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($usersmasyarakat as $item)
                                            <tbody>
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{Str::title($item->username)}}</td>
                                                <td>{{Str::title($item->level)}}</td>
                                                <td>{{$item->telepon}}</td>
                                            </tr>
                                            
                                        </tbody>
                                        @empty
                                            Data Masih Kosong
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
    </div>            
    </div>            
    </div>
@endsection