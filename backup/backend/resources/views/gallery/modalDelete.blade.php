<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" style="padding-top:1em !important; padding-bottom:0.5em !important;">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mb-3">
                    Apa anda yakin ingin menghapusnya ?
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-md-center">
                <div>
                  {!! Form::open(['method' => 'DELETE', 'action' => ['galleryController@destroy', 'delete']]) !!}
                      {!! Form::text('id', null, ['id' => 'id', 'hidden']) !!}
                      <button type="submit" class="btn btn-sm btn-outline-accent">Yes</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">No</button>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>