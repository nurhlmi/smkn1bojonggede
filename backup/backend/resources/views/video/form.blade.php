@csrf

<div class="mb-3">
    @php if($errors->has('url')) { $error = 'is-invalid';} else { $error = '';} @endphp
    {!! Form::text('url', null, ["class" => "form-control form-control-lg $error", 'placeholder' => "Your Post Youtube Url"]) !!}
    @if($errors->has('url'))
        <div class="invalid-feedback">{{ $errors->first('url') }}</div>
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

<div class="mb-3">
    @php if($errors->has('academic')) { $error = 'is-invalid';} else { $error = '';} @endphp
    {!! Form::select('academic', ['multimedia' => 'Multimedia', 'akutansi' => 'Akutansi', 'perhotelan' => 'Akomodasi Perhotelan', 'jasa_boga' => 'Jasa Boga', 'pariwisata' => 'Pariwisata'], !empty($video_data->academic) ? $video_data->academic : 'null' ,['class'=>"form-control $error",'placeholder'=>'Pilih Jurusan']) !!}
    @if($errors->has('academic'))
        <div class="invalid-feedback">{{ $errors->first('academic') }}</div>
    @endif
</div>

<button class="btn btn-sm btn-accent ml-auto" name="submit" value="publish"> <i class="material-icons">file_copy</i> {{ $submitButton }} </button>