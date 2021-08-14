@extends('dashboardTemplate')
@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Page Posts</span>
        <h3 class="page-title">Add New Post</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Alert Session -->
    @include('_partial.flash_message')
    <!-- / Alert Session -->

    <!-- End Page Header -->
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                    {!! Form::open(['url' => 'gallery', 'files' => 'true']) !!}
                        @include('gallery/form', ['submitButton' => 'Publish'])
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- / Add New Post Form -->
        </div>
    </div>
@stop
@include('_partial/modalImageUpload')
@section('script')
    <script>
        $(document).ready(function() {
            function photo() {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#photo').attr('src', e.target.result);
                            $('#photo').addClass('mb-3');
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#image-upload").change(function() {
                    readURL(this);
                });
            }

            function formImage() {
                $(".form-upload").html(`
                <div id="image" class="custom-file mb-3">
                    @php if($errors->has('file')) { $error = 'is-invalid'; } else { $error = ''; } @endphp
                    <input type="file" class="custom-file-input {{ $error }}" id="image-upload" name="file" placeholder="Your Post Image" accept = "image/*">
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    @if($errors->has('file'))
                        <div class="invalid-feedback" style="font-size:12">{{ $errors->first('file') }}</div>
                    @endif
                </div>
                `)
            }

            function formVideo() {
                $(".form-upload").html(`
                    <div id="video" class="form-upload mb-3">
                        @php if($errors->has('file')) { $error = 'is-invalid';} else { $error = '';} @endphp
                        {!! Form::url('file', null, ["class" => "form-control form-control-lg $error", 'placeholder' => 'Your Post Url']) !!}
                        @if($errors->has('file'))
                            <div class="invalid-feedback">{{ $errors->first('file') }}</div>
                        @endif
                    </div>
                `)
            }
            
            if($("#category").val() == 'image') {
                formImage()
                photo()
            } else if($("#category").val() == 'video') {
                formVideo()
            }

            $("#category").change(function() {
                $(".form-upload").html()
                if($(this).val() == 'image') {
                    formImage()
                    photo()
                } else if($(this).val() == 'video') {
                    formVideo()
                }
            })
        });
        // $(document).ready(function() {
        //     $(".form-upload").hide();
        //     $("#category").change(function() {
        //         $(".form-upload").hide();
        //         $("#"+$(this).val()).show()
        //     })
        // })
    </script>
@stop