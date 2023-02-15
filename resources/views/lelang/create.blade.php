@extends('template.main')

@section('title', 'Tambah Data Lelang')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Barang</h1>
          </div>
     <div class="row">
            <div class="col-lg-12">
    <div class="card mb-4">
                <form action="{{route('lelang.store')}}" method="post" data-parsley-validate enctype="multipart/form-data"> 
                    @csrf
                  <div class="card-body">
                    
                      <div class="form-group">
                        
                        {{-- Nama Barang And Harga Awal --}}
                        <div class="form-group mandatory">
                         <label for="barangs_id" class="form-label">{{ __('Nama Barang') }}</label>
                        <select class="form-select form-control @error('barangs_id') is-invalid @enderror" id="barangs_id" name="barangs_id" data-parsley-required="true">
                        <option value="" selected>Pilih Barang</option>
                        @forelse ($barangs as $item)
                         <option value="{{ $item->id }}">{{ Str::of($item->nama_barang)->title() }} - {{ Str::of($item->harga_awal) }}</option>
                          @empty
                          <option value="" disabled>Barang Semuanya Sudah Di Lelang</option>
                         @endforelse
                    </select>
                       @error('barangs_id')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {{$message}}
                            </div>
                        @enderror
                    </div>
                      </div>

                          {{-- Harga Akhir --}}
                          <label for="harga_akhir" class="form-label">{{ __('Harga Akhir') }}</label>
                          <div class="form-group mandatory">
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">RP</span>
                          </div>
                          <input type="text" id="harga_akhir" class="form-control 
                          @error('harga_akhir') is-invalid @enderror" 
                          placeholder="Input Harga, Hanya Angka" name="harga_akhir" 
                          data-parsley-required="true" 
                          value="{{ old('harga_akhir') }}">
                        </div>
                        @error('harga_akhir')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {{$message}}
                            </div>
                        @enderror
                        </div>

                            {{-- Tanggal Lelang --}}
                          <div class="form-group">
                            <div class="form-group mandatory">
                            <label  for="tanggal" class="form-label">{{ __('Tanggal Lelang') }}</label>
                            <input type="date" id="tanggal_lelang" class="form-control 
                            @error('tanggal_lelang') is-invalid @enderror"  name="tanggal_lelang" 
                            data-parsley-required="true" 
                            value="{{ old('tanggal_lelang') }}">
                          </div>
                          @error('tanggal_lelang')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {{$message}}
                            </div>
                        @enderror
                          </div>

                      
                     

                    <div class="row">
                              <div class="col-6 d-flex justify-content-start">
                                  <a href="{{ route('barang.index') }}" class="btn btn-outline-info me-1 mb-1">
                                    {{ __('Kembali') }}
                                  </a>
                              </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" >
                                  {{ __('Submit') }}
                                </button>
                              
                            </div>
                          </div>
                    </form>
                    
                  </div>
                </div>
                  </div>
     </div>
@endsection
  