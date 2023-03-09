@extends('template.main')

@section('title', 'Detail Data Barang Lelang' )


@section('content')
 
   <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Detail Data Barang</h1>
          </div>
          @if(!empty($lelangs))
     <div class="row">
        <div class="col-lg-7">
         <div class="card mb-5">
          <div class="card-body">
            
            <div class="form-group mandatory mb-1">
                        <label  for="nama_barang">{{ __('Pemenang') }}</label>
                        <input type="text" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror"  
                        placeholder="Nama Barang" name="nama_barang" disabled
                        data-parsley-required="true" 
                        value="{{ $lelangs->pemenang}}">
                      </div>

            @if($lelangs->barang->image)
                <img class="img-fluid mt-3 mb-1" src="{{ asset('storage/' . $lelangs->barang->image)}}" alt="User profile picture">
                @endif

                 <form class="form-valide" action="{{ route('lelang.update', [$lelangs->id]) }}" method="post">
                        @csrf
                        @method('put')
                 <div class="form-group mandatory">
                        <label class="form-label" for="status" >{{ __('Status Lelang') }}</label>
                                            <div class="input-group mb-3">
                                                <select class="form-control" value="{{  $lelangs->status }}" id="status" name="status">
                                                    <option @disabled(true)>Tentukan status</option>
                                                    <option >Dibuka</option>
                                                    <option >Ditutup</option>
                                                </select>
                                            </div>
                                        </div>

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
                                  <a href="{{ route('lelang.index') }}" class="btn btn-outline-info me-1 mb-1">
                                    {{ __('Kembali') }}
                                  </a>
                              </div>
                              <div class="col-6 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                  {{ __('Submit') }}
                                </button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                  {{ __('Reset') }}
                                </button>
                            </div>
                              
                       </div>
                      </div>
                    </div> 

                    
</div>

@endif
@endsection