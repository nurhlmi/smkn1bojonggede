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
    @if(!empty($page_data->image))
        <img src="{{ asset('images/page/'.$page_data->image) }}" class="img-thumbnail mb-3" id="photo" />
    @else 
        <img class="img-thumbnail mb-3" id="photo" />
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
    @php if($errors->has('description')) { $error = 'is-invalid';} else { $error = '';} @endphp
    {!! Form::textarea('description', null, ["class" => "form-control $error", 'id' => 'editor', 'placeholder' => 'Enter Description']) !!}
    @if($errors->has('description'))
        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
    @endif
</div>

@if(!empty($halaman) && $halaman != 'page_edit')
<div class="mb-3">
    @php if($errors->has('category_page')) { $error = 'is-invalid';} else { $error = '';} @endphp
    {!! Form::select('category_page', $page_category_list,'null',['class'=>"form-control $error",'placeholder'=>'Select Page Category']) !!}
    @if($errors->has('category_page'))
        <div class="invalid-feedback">{{ $errors->first('category_page') }}</div>
    @endif
</div>
@endif

<button class="btn btn-sm btn-accent ml-auto" name="submit" value="publish"> <i class="material-icons">file_copy</i> {{ $submitButton }} </button>