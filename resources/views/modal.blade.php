<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Penawaran Anda') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('lelangin.store', $lelangs->id)}}" method="post" class="col-md-12">
                    @csrf
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
