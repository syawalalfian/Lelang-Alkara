@extends('template.main')

@section('title', 'Data Penawaran Anda')

@push('css')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
 <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
            <a href="" class="btn btn-success ">
                <i class="fa fa-plus md-2 pr-1" aria-hidden="true"></i>Tambah
             </a>
          </div>
          
              <div class="card mb-4">
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Penawar</th>
                        <th>Nama Barang</th>
                        <th>Harga Penawaran</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($historyLelangs as $item)
                         <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{Str::title($item->user->name)}}</td>
                            <td><a href="{{route('lelangin.create', $item->lelang->id)}}">{{ $item->lelang->barang->nama_barang }}</a></td>
                            <td>@currency($item->harga)</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                            <td> <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ Str::title($item->status) }}</span></td>
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