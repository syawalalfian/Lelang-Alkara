@extends('template.main')

@section('title', 'Data Petugas')

@push('css')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Data Admin</h1>
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
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>level</th>
                        <th>No Telepon</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($usersmasyarakat as $value)
                         <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{Str::title($value->name)}}</td>
                            <td>{{Str::title($value->username)}}</td>
                            <td>{{Str::title($value->level)}}</td>
                            <td>{{$value->telepon}}</td>
                            <td>
                                <form action="{{ route('datamasyarakat.destroy', $value->id) }}" method="POST">
                                
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