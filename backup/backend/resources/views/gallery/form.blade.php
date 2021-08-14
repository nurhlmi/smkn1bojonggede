    @csrf
<div class="mb-3">
    @php if($errors->has('category')) { $error = 'is-invalid';} else { $error = '';} @endphp
    {!! Form::select('category', ['video' => 'Video', 'image' => 'Image'], !empty($gallery_data->category) ? $gallery_data->category : 'null' ,['id' => 'category', 'class'=>"form-control $error",'placeholder'=>'Pilih Kategori', !empty($gallery_data->id) ? 'disabled' : '']) !!}
    @if($errors->has('category'))
        <div class="invalid-feedback">{{ $errors->first('category') }}</div>
    @endif
</div>
@if(!empty($gallery_data))
    {!! Form::hidden('category', $gallery_data->category) !!}
@endif

<div class="form-upload mb-3">

</div>


@if(!empty($gallery_data->file) && $gallery_data->category == 'video' )
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="{{ $gallery_data->file }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
@endif

@if(!empty($gallery_data) && $gallery_data->category == 'image')
    <div><img src="{{ asset('images/gallery/'.$gallery_data->file) }}" class="img-thumbnail mb-3" id="photo" /></div>
@else 
    <div><img class="img-thumbnail" id="photo" /></div>
@endif


<div class="mb-3">
    @php if($errors->has('title')) { $error = 'is-invalid';} else { $error = '';} @endphp
        {!! Form::text('title', null, ['class' => "form-control $error", 'placeholder' => 'Title']) !!}
    @if($errors->has('title'))
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    @endif
</div>

<button class="btn btn-sm btn-accent ml-auto" name="submit" value="publish"> <i class="material-icons">file_copy</i> {{ $submitButton }} </button>