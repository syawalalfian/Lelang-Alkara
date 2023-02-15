@extends('template.main')

@section('title', 'Tambah Data Barang')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Barang</h1>
          </div>
     <div class="row">
              <div class="col-lg-12">
    <div class="card mb-4">
                <form action="{{route('barang.store')}}" method="post" data-parsley-validate enctype="multipart/form-data"> 
                    @csrf
                  <div class="card-body">
                    
                      <div class="form-group">
                        
                        {{-- Nama Barang --}}
                        <div class="form-group mandatory">
                        <label  for="nama_barang">{{ __('Nama Barang') }}</label>
                        <input type="text" id="nama_barang" class="form-control 
                        @error('nama_barang') is-invalid @enderror" 
                        placeholder="Nama Barang" name="nama_barang" 
                        data-parsley-required="true" 
                        value="{{ old('nama_barang') }}">
                      </div>
                      @error('nama_barang')
                        <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {{$message}}
                            </div>
                     @enderror
                      </div>

                      {{-- Tanggal --}}
                      <div class="form-group">
                        <div class="form-group mandatory">
                        <label  for="tanggal" class="form-label">{{ __('Tanggal') }}</label>
                        <input type="date" id="tanggal" class="form-control 
                        @error('tanggal') is-invalid @enderror" 
                        placeholder="Tanggal" name="tanggal" 
                        data-parsley-required="true" 
                        value="{{ old('tanggal') }}">
                      </div>
                      @error('tanggal')
                        <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {{$message}}
                            </div>
                     @enderror
                      </div>


                      {{-- Harga Awal --}}
                      <label for="harga_awal" class="form-label">{{ __('Harga Awal') }}</label>
                      <div class="form-group mandatory">
                      <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                      </div>
                      <input type="text" id="harga_awal" class="form-control 
                      @error('harga_awal') is-invalid @enderror" 
                      placeholder="Input Harga, Hanya Angka" name="harga_awal" 
                      data-parsley-required="true" 
                      value="{{ old('harga_awal') }}">
                    </div>
                    @error('harga_awal')
                        <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {{$message}}
                            </div>
                    @enderror
                    </div>

                    {{-- File Image --}}
                    <div class="form-group">
                        <div class="form-group mandatory">
                          <label for="image" class="form-label">Pilih Gambar</label>
                          <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="image" name="image" onchange="previewImage()"> 
                      </div>
                      @error('image')
                        <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {{$message}}
                            </div>
                       @enderror
                      </div>
                      

                      {{-- Deskripsi --}}
                    <div class="form-group">
                        <div class="form-group mandatory">
                        <label for="deskripsi" class="form-label">{{ __('Deskripsi Barang') }}</label>
                        <textarea
                          class="form-control 
                          @error('deskripsi') is-invalid @enderror" 
                          placeholder="Deskripsi Barang" 
                          id="deskripsi" 
                          name="deskripsi">{{ old('deskripsi') }}</textarea>
                          <label for="deskripsi">{{ __('Jelaskan deskripsi barang minimal 10 karakter') }}</label>
                      </div>
                      @error('deskripsi')
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
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                  {{ __('Submit') }}
                                </button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                  {{ __('Reset') }}
                                </button>
                              
                            </div>
                          </div>
                    </form>
                  </div>
                </div>
                  </div>
                   </div>
                   
                
    <script>
      function previewImage() {
    const image = document.querySelector('#image')
    const imgPreview = document.querySelector('.img-preview')
    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
    </script>

    
@endsection

    

    
