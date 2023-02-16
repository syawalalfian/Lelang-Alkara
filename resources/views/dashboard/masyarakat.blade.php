@extends('template.main')

@section('title', 'Dahsboard Masyarakat')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush

@section('content')

<div class="container-fluid" >
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard.masyarakat')}}">masyarakat</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="card text-center">
          <div class="card-body">
            <h1 class="card-title text-gray-800">Barang Yang Di Lelang</h1>
              </div>
            </div>

            <br>
            <br>
<div class="row">
            @foreach ($lelangs as $lelang)
  
      
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                
                  @if($lelang->barang->image)
                  <img src="{{ asset('storage/' . $lelang->barang->image)}}" alt="{{ $lelang->barang->nama_barang }}" style="width: 100%">
                  @endif
                </div>
                <h3 class="profile-username text-center">{{ $lelang->barang->nama_barang}}</h3>
              <p>
                     {{$lelang->barang->deskripsi}}
             </p>
              <a href="/penawaran" class="btn btn-success btn-block"><b>Lelang</b></a>
            </div>
        </div>
    </div>

    @endforeach
    </div>
    <br>
</div>
    
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endpush