<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Pilih Barang Yang Ingin Di Lelang') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('lelang.store')}}" method="post" class="col-md-12">
                    @csrf
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
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
  