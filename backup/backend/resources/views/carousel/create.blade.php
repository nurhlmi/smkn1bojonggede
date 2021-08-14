@extends('dashboardTemplate')
@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Carousel Image Posts</span>
        <h3 class="page-title">Add New Carousel Image</h3>
        </div>
    </div>

    <!-- Alert Session -->
        @include('_partial.flash_message')
    <!-- / Alert Session -->
    
    <!-- End Page Header -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                {!! Form::open(['url' => 'carousel', 'files' => 'true']) !!}
                    @include('carousel/form')
                {!! Form::close() !!}
                </div>
            </div>
            <!-- / Add New Post Form -->
        </div>
    </div>
@stop
@include('modalImageUpload')