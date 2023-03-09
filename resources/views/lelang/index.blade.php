@extends('template.main')

@section('title', 'Data Lelang')

@push('css')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
 <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Data Barang Lelang</h1>
            <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal">
              <i class="fa fa-plus md-2 pr-1" aria-hidden="true"></i>Tambah
            </button>
          </div>
          @include('lelang.create')
          
              <div class="card mb-4">
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama barang</th>
                        <th>Harga awal</th>
                        <th>Harga lelang</th>
                        <th>Tanggal lelang</th>
                        <th>Status</th>
                        <th>Pemenang</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($lelangs as $lelang)
                         <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$lelang->barang->nama_barang}}</td>
                            <td>@currency(($lelang->barang->harga_awal))</td>
                            <td>@currency(($lelang->harga_akhir))</td>
                            <td>{{ \Carbon\Carbon::parse($lelang->tanggal_lelang)->format('j-F-Y') }}</td>
                            <td><span class="badge text-white {{ $lelang->status == 'tutup' ? 'bg-danger' : 'bg-success' }}">{{ Str::title($lelang->status) }}</span></td>
                            <td>
                              <span>{{$lelang->pemenang}}</span>
                            </td>
                            <td>
                                <a href="{{ route('lelang.edit', $lelang->id)}}" class="btn btn-info btn-sm">
                                <i class="bi bi-info-square"></i>Show
                                </a>
                                <a href="{{ route('lelang.show', $lelang->id)}}" class="btn btn-success btn-sm">
                                <i class="bi bi-success-square"></i>Penawar
                                </a>
                                
                            </td>
                            
                        </tr>   
                        @empty

                         @endforelse
                            
                        
                      
                    </tbody>
                  </table>
                </div>
              </div>
            
@endsection

@push('scripts')
    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
@endpush

