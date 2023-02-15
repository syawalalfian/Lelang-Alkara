@extends('template.main')

@section('title', 'Detail Data Barang' )


@section('content')
   <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Detail Data Barang</h1>
             <h2 class="h3 mb-0 text-gray-800">
                    {{ __('Created') }} : {{ \Carbon\Carbon::parse($barangs->created_at)->format('j-F-Y : H:i') }}
                  </h2>
          </div>
     <div class="row">

        <div class="col-lg-7">
         <div class="card mb-5">
          <div class="card-body">
            @if($barangs->image)
                     
                            <img src="{{asset('Storage/'.$barangs->image)}}" alt="{{$barangs->image}}" class="img-fluid mt-1">
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
                        value="{{$barangs->nama_barang}}">
                      </div>

                      {{-- Tanggal --}}
                        <div class="form-group mandatory">
                        <label  for="tanggal" class="form-label">{{ __('Tanggal') }}</label>
                        <input type="date" id="tanggal" class="form-control 
                        @error('tanggal') is-invalid @enderror" 
                        placeholder="Tanggal" name="tanggal" disabled
                        data-parsley-required="true" 
                        value="{{$barangs->tanggal}}">
                      </div>

                      {{-- Harga --}}
                      <label for="harga_awal" class="form-label">{{ __('Harga Awal') }}</label>
                      <div class="form-group mandatory">
                      <div class="input-group mb-3">
                      
                      <input type="text" id="harga_awal" class="form-control 
                      @error('harga_awal') is-invalid @enderror" 
                      placeholder="Input Harga, Hanya Angka" name="harga_awal" disabled
                      data-parsley-required="true" 
                      value="@currency($barangs->harga_awal)">
                    </div>
                </div>
                
                    <br>

                      {{-- Deskripsi --}}
                    <div class="form-group mandatory">
                        <label for="deskripsi" class="form-label">{{ __('Deskripsi Barang') }}</label>
                        <textarea
                          class="form-control 
                          @error('deskripsi') is-invalid @enderror" 
                          placeholder="Deskripsi Barang" 
                          id="deskripsi" 
                          name="deskripsi" disabled>{{$barangs->deskripsi}}</textarea>
                      </div>

                      <div class="row">
                              <div class="col-6 d-flex justify-content-start">
                                  <a href="{{ route('barang.index') }}" class="btn btn-outline-info me-1 mb-1">
                                    {{ __('Kembali') }}
                                  </a>
                              </div>
                       </div>
                      

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection