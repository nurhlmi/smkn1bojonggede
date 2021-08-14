@csrf
<div class="form-group">
    <div class="col-lg-12" style="font-size:.8125rem;" >
        @php if($errors->has('image')) { $error = 'is-invalid'; } else { $error = ''; } @endphp
        {!! Form::file('image', ["class"=> "custom-file-input $error", 'id' => 'image', 'data-type' => 'carousel', 'accept' => 'image/*']) !!}
        <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
        @if($errors->has('image'))
            <div class="row invalid-feedback" style="font-size:12">{{ $errors->first('image') }}</div>
        @endif
    </div>
</div>

<div class="mb-3">
    @if(!empty($carousel_data->image))
        <img src="{{ asset('images/carousel/'.$carousel_data->image) }}" class="img-thumbnail mb-3" id="photo" />
    @else 
        <img class="img-thumbnail" id="photo" />
    @endif
</div>

<div class="form-group">
    @php if($errors->has('title')) { $error = 'is-invalid'; } else { $error = ''; } @endphp
    {!! Form::text('title', null, ["class" => "form-control form-control-lg $error", 'placeholder' => 'Title']) !!}
    @if($errors->has('title'))
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    @endif
</div>

<div class="form-group">
    @php if($errors->has('description')) { $error = 'is-invalid'; } else { $error = ''; } @endphp
    {!! form::textarea('description', null, ["class" => "form-control $error", 'placeholder' => 'Description']) !!}
    @if($errors->has('description'))
        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
    @endif
</div>

<div class="form-group">
    @php if($errors->has('url')) { $error = 'is-invalid'; } else { $error = ''; } @endphp
    {!! form::url('url', null, ["class" => "form-control form-control-lg $error", 'placeholder' => 'Redirect Url']) !!}
    @if($errors->has('url'))
        <div class="invalid-feedback">{{ $errors->first('url') }}</div>
    @endif
</div>

<div class="form-group">
    @php if($errors->has('order')) { $error = 'is-invalid'; } else { $error = ''; } @endphp
    {!! Form::number('order', null, ["class" => "form-control form-control-lg $error ", 'placeholder' => 'Order Image Preview']) !!}
    @if($errors->has('order'))
        <div class="invalid-feedback">{{ $errors->first('order') }}</div>
    @endif
</div>

<button class="btn btn-sm btn-outline-accent"> <i class="material-icons">save</i> Save </button>