@csrf
<div class="custom-file mb-3">
    @php if($errors->has('image')) { $error = 'is-invalid';} else { $error = '';} @endphp
    <input type="file" class="custom-file-input form-control {{ $error }}" name="image" id="image" placeholder="Your Post Title" accept = "image/*">
    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    @if($errors->has('image'))
        <div class="invalid-feedback" style="font-size:12">{{ $errors->first('image') }}</div>
    @endif
</div>


<div>
    @if(!empty($blog_data->image))
        <img src="{{ asset('images/blog/'.$blog_data->image) }}" class="img-thumbnail mb-3" id="photo" />
    @else 
        <img class="img-thumbnail mb-3" id="photo" />
    @endif
</div>
<div class="mb-3">
    @php if($errors->has('image_description')) { $error = 'is-invalid';} else { $error = '';} @endphp
    {!! Form::textarea('image_description', null, ["class" => "form-control form-control-lg $error", 'rows' => '3', 'placeholder' => "Your Post Image Description"]) !!}
    @if($errors->has('sort_description'))
        <div class="invalid-feedback">{{ $errors->first('sort_description') }}</div>
    @endif
</div>
<div class="mb-3">
    @php if($errors->has('title')) { $error = 'is-invalid';} else { $error = '';} @endphp
    {!! Form::text('title', null, ["class" => "form-control form-control-lg $error", 'placeholder' => "Your Post Title"]) !!}
    @if($errors->has('title'))
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    @endif
</div>

<div class="mb-3">
    @php if($errors->has('sort_description')) { $error = 'is-invalid';} else { $error = '';} @endphp
    {!! Form::textarea('sort_description', null, ["class" => "form-control form-control-lg $error", 'placeholder' => "Your Post Sort Description"]) !!}
    @if($errors->has('sort_description'))
        <div class="invalid-feedback">{{ $errors->first('sort_description') }}</div>
    @endif
</div>

<div class="mb-3">
    @php if($errors->has('description')) { $error = 'is-invalid';} else { $error = '';} @endphp
    {!! Form::textarea('description', null, ["class" => "form-control $error", 'id' => 'editor', 'placeholder' => 'Enter Description']) !!}
    @if($errors->has('description'))
        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
    @endif
</div>

<div class="mb-3">
    @php if($errors->has('absolute_link')) { $error = 'is-invalid';} else { $error = '';} @endphp
    {!! Form::url('absolute_link', null, ["class" => "form-control form-control-lg $error", 'placeholder' => 'Your Post Url']) !!}
    @if($errors->has('absolute_link'))
        <div class="invalid-feedback">{{ $errors->first('absolute_link') }}</div>
    @endif
</div>

<div class="custom-control custom-toggle custom-toggle-sm mb-3">
    @php if($errors->has('status')) { $error = 'is-invalid';} else { $error = '';} @endphp
    {!! Form::checkbox('status', null, !empty($blog_data->status) && $blog_data->status == 'on' ? true : false, ['id' => 'customToggle2', 'class' => "custom-control-input form-control $error"]) !!}
    <label class="custom-control-label" for="customToggle2">Active</label>
    @if($errors->has('status'))
        <div class="invalid-feedback">{{ $errors->first('status') }}</div>
    @endif
</div>

<button class="btn btn-sm btn-accent ml-auto" name="submit" value="publish"> <i class="material-icons">file_copy</i> Publish </button>