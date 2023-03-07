@extends('template.main')

@section('title', 'Edit Data Barang' )

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Barang</h1>
          </div>

          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">{{ __('Edit Data Barang Yang Akan Di Lelang') }}</h4>
              </div>
              <div class="card-content">
                  <div class="card-body">
                      <form class="form" method="POST" action="{{ route('barang.update', $barangs->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')  
                        <div class="row">

                            <div class="col-md-4 col-12">
                                <div class="form-group mandatory">
                                    <label for="nama_barang" class="form-label">{{ __('Nama Barang') }}</label>
                                    <input type="text" id="nama_barang" class="form-control " placeholder="Nama Barang" name="nama_barang" data-parsley-required="true" value="{{  $barangs->nama_barang }}">
                                </div>
                                @error('nama_barang')
                                  <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mandatory">
                                    <label for="tanggal" class="form-label">{{ __('Tanggal') }}</label>
                                    <input type="date" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Tanggal" name="tanggal" data-parsley-required="true" value="{{ $barangs->tanggal }}">
                                </div>
                                @error('tanggal')
                                  <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mandatory">
                                    <label for="harga_awal" class="form-label">{{ __('Harga Awal') }}</label>
                                    <input type="text" id="harga_awal" class="form-control @error('harga_awal') is-invalid @enderror" placeholder="Input Harga, Hanya Angka" name="harga_awal" data-parsley-required="true" value="{{ $barangs->harga_awal }}">
                                </div>
                                @error('harga_awal')
                                  <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>

                              <div class="form-group">
                            <div class="form-group mandatory">
                              <label for="image" class="form-label">Pilih Gambar</label>
                              <input type="hidden" name="oldImage" value="{{$barangs->image}}">
                              @if($barangs->image)
                              <img src="{{asset('Storage/' . $barangs->image)}}" alt="{{$barangs->image}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                              @else 
                              <img class="img-preview img-fluid mb-3 col-sm-5">
                              @endif
                              
                            <input class="form-control @error('image')is-invalid @enderror"  type="file" id="image" name="image" onchange="previewImage()"> 
                          </div>
                          @error('image')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                          </div>

                          <div class="row">
                            <div class="col-12">
                              <div class="form-group mandatory">
                                <label for="deskripsi" class="form-label">{{ __('Deskripsi Barang') }}</label>
                                <div class="form-floating">
                                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi Barang" id="deskripsi" name="deskripsi">{{ $barangs->deskripsi }}</textarea>
                                   
                                </div>
                              </div>
                                @error('deskripsi')
                                  <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
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