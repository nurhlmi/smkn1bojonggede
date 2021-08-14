@if(Session::has('flash_message'))
    <div class="alert alert-info alert-dismissible fade show {{ Session::has('penting') ? 'alert-danger alert-important' : 'alert-info' }}" role="alert" style="border-radius:7px">
        {{ Session::get('flash_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif