<!-- Modal -->
<div id="uploadimageModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload & Crop Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div id="image_demo"></div>
          </div>
          <div class="col text-center">
            <button class="vanilla-rotate btn btn-primary mr-1" data-deg="90">
              <i class="fa fa-undo-alt" aria-hidden="true"></i>
            </button>
            <button class="vanilla-rotate btn btn-primary mr-1" data-deg="-90">
              <i class="fa fa-redo-alt" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary crop_image">Crop & Upload Image</button>
      </div>

    </div>
  </div>
</div>