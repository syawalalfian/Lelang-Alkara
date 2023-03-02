@extends('template.main')

@section('title', 'Data Barang')

@push('css')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
 <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
            <a href="{{route('barang.create')}}" class="btn btn-success ">
                <i class="fa fa-plus md-2 pr-1" aria-hidden="true"></i>Tambah
             </a>
          </div>
          
              <div class="card mb-4">
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Harga Awal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangs as $barang)
                         <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Str::of($barang->nama_barang)->title() }}</td>
                            <td>{{ \Carbon\Carbon::parse($barang->tanggal)->format('j-F-Y') }}</td>
                            <td>@currency($barang->harga_awal)</td>
                            <td>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                                <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-info-square"></i>Show
                                </a>
                                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>Delete
                                </button>
                                </form>
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