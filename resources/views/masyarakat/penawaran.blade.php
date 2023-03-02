@extends('template.main')

@section('title', 'Penawaran Anda')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Penawaran Anda</h1>
          </div>

          @if(!empty($lelangs))
     <div class="row">
        <div class="col-lg-7">
         <div class="card mb-5">
          <div class="card-body">
            @if($lelangs->barang->image)
                <img class="img-fluid mt-3" src="{{ asset('storage/' . $lelangs->barang->image)}}" alt="User profile picture">
                @endif
          </div>
          </div>
          </div>

        <div class="col-lg-5">
         <div class="card mb-4">
        <div class="card-body">
                    
                        {{-- Nama Barang --}}
                       <div class="form-group mandatory">
                        <label  for="nama_barang">{{ __('Nama Barang') }}</label>
                        <input type="text" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror"  
                        placeholder="Nama Barang" name="nama_barang" disabled
                        data-parsley-required="true" 
                        value="{{ $lelangs->barang->nama_barang}}">
                      </div>

                      {{-- Tanggal --}}
                        <div class="form-group mandatory">
                        <label  for="tanggal" class="form-label">{{ __('Tanggal') }}</label>
                        <input type="date" id="tanggal_lelang" class="form-control 
                        @error('tanggal') is-invalid @enderror" 
                        placeholder="Tanggal" name="tanggal_lelang" disabled
                        data-parsley-required="true" 
                        value="{{$lelangs->tanggal_lelang}}">
                      </div>

                      {{-- Harga --}}
                      <label for="harga_awal" class="form-label">{{ __('Harga Awal') }}</label>
                      <div class="form-group mandatory">
                      <div class="input-group mb-3">
                      <input type="text" id="harga_awal" class="form-control 
                      @error('harga_awal') is-invalid @enderror" 
                      placeholder="Input Harga, Hanya Angka" name="harga_awal" disabled
                      data-parsley-required="true" 
                      value="@currency($lelangs->barang->harga_awal)">
                    </div>
                </div>

                      {{-- Harga Akhir --}}
                      <label for="harga_akhir" class="form-label">{{ __('Harga Akhir') }}</label>
                      <div class="form-group mandatory">
                      <div class="input-group mb-3">
                      <input type="text" id="harga_akhir" class="form-control 
                      @error('harga_akhir') is-invalid @enderror" 
                      placeholder="Input Harga, Hanya Angka" name="harga_akhir" disabled
                      data-parsley-required="true" 
                      value="@currency($lelangs->harga_akhir)">
                    </div>
                </div>
                
                      {{-- Deskripsi --}}
                    <div class="form-group mandatory">
                        <label for="deskripsi" class="form-label">{{ __('Deskripsi Barang') }}</label>
                        <textarea
                          class="form-control 
                          @error('deskripsi') is-invalid @enderror" 
                          placeholder="Deskripsi Barang" 
                          id="deskripsi" 
                          name="deskripsi" disabled>{{ $lelangs->barang->deskripsi}}</textarea>
                      </div>  

                      <div class="row">
                              <div class="col-6 d-flex justify-content-start">
                                  <a href="{{ route('dashboard.masyarakat') }}" class="btn btn-outline-info me-1 mb-1">
                                    {{ __('Kembali') }}
                                  </a>
                              </div>
                              
                              
                       </div>
                      </div>
                    </div> 
                    </div> 

                    {{-- Input Tawar --}}
               
                {{-- <form action="{{route('lelangin.store', $lelangs->id)}}" method="post" class="col-md-12">
                    @csrf
                <label for="harga" class="form-label">{{ __('Penawaran Anda') }}</label>
            <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                      </div>
                      <input
                        type="text"
                        name="harga_penawaran"
                        class="form-control"
                        aria-label="Amount (to the nearest dollar)"
                        placeholder="Input Harga Lelang, Hanya Angka"/>
                        <div class="col-1 d-flex justify-content-start">
                          <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
              </div>
              </form> --}}

              <div class="card col-md-12">
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pelelang {{$lelangs->barang->nama_barang}}</h6>
                  <div class="col-6 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1" data-toggle="modal" data-target="#myModal">
                   {{ __('Tawar') }}
                    </button>
                  </div>
                  @include('modal')
                </div>
                
              <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Nama Barang</th>
                        <th>Harga Penawaran</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    @forelse ($historyLelangs as $item)
                        <tbody>
                      <tr>
                         <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->lelang->barang->nama_barang }}</td>
                        <td>@currency($item->harga)</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                        <td><span class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ Str::title($item->status) }}</span></td>
                        {{-- <td><span class="badge badge-danger">"{{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }}">{{ Str::title($item->status) }}</span></td> --}}
                      </tr>
                      </tr>
                     
                    </tbody>
                    @empty
                      
                    @endforelse
                    
                  </table>
                </div>
            </div>
            <div class="card-footer"></div>



</div>

@endif

@push('scripts')
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endpush
@endsection