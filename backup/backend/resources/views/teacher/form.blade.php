@csrf
<div class="custom-file mb-3">
    @php if($errors->has('image')) { $error = 'is-invalid'; } else { $error = ''; } @endphp
    <input type="file" class="custom-file-input {{ $error }}" name="image" id="image" placeholder="Your Post Title" accept = "image/*">
    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    @if($errors->has('image'))
        <div class="invalid-feedback" style="font-size:12">{{ $errors->first('image') }}</div>
    @endif
</div>

<div>
    @if(!empty($teacher_data->image))
        <img src="{{ asset('images/teacher/'.$teacher_data->image) }}" class="img-thumbnail mb-3" id="photo" />
    @else
        <img class="img-thumbnail mb-3" id="photo" />
    @endif
</div>


<div>
    @php if($errors->has('name')) { $error = 'is-invalid'; } else { $error = ''; } @endphp
    {!! Form::text('name', null, ["class" => "form-control form-control-lg mb-3 $error", 'placeholder' => "Your Post Name"]) !!}
    @if($errors->has('name'))
        <div class="invalid-feedback">{{ $errors->first('name`') }}</div>
    @endif
</div>

<div>
    @php if($errors->has('position')) { $error = 'is-invalid'; } else { $error = ''; } @endphp
    {!! Form::text('position', null, ["class" => "form-control form-control-lg mb-3 $error", 'placeholder' => "Posisi"]) !!}
    @if($errors->has('position'))
        <div class="invalid-feedback">{{ $errors->first('position') }}</div>
    @endif
</div>

<div class="mb-3">
    @php if($errors->has('description')) { $error = 'is-invalid'; } else { $error = ''; } @endphp
    {!! Form::textarea('description', null, ["class" => "form-control $error", 'id' => 'editor', 'placeholder' => 'Enter Description']) !!}
    @if($errors->has('description'))
        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
    @endif
</div>

<button class="btn btn-sm btn-accent ml-auto" name="submit" value="publish"> <i class="material-icons">file_copy</i> Publish </button>