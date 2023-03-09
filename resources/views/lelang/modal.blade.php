<div class="modal fade" tabindex="-1" role="dialog" id="modal-pemenang">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Penawaran Anda') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('lelang.setpemenang', [$lelangs->id])}}" method="post" class="col-md-12">
                    @csrf
                    @method('put')
           <div class="form-group row">
             <div class="col-lg-6">
               <input type="text" value="" class="form-control" id="pemenang" name="pemenang" >
               </div>
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
