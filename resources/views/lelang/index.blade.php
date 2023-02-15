@extends('template.main')

@section('title', 'Data Lelang')

@push('css')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
 <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
            <a href="{{route('lelang.create')}}" class="btn btn-success ">
                <i class="fa fa-plus md-2 pr-1" aria-hidden="true"></i>Tambah
             </a>
          </div>
          
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($lelangs as $item)
                         <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td></td>
                            <td>
                             
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <form action="" method="POST">
                                <a href="" class="btn btn-info btn-sm">
                                <i class="bi bi-info-square"></i>Show
                                </a>
                                <a href="" class="btn btn-warning btn-sm">
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