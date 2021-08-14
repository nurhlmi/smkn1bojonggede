@extends('dashboardTemplate')
@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">News Carousel</span>
        <h3 class="page-title">Add New Carousel</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                {!! Form::model($carousel_data, ['method' => 'PATCH', 'files'=>'true', 'action' => ['carouselController@update', $carousel_data->id]]) !!}
                    @include('carousel/form')
                {!! Form::close() !!}   
                </div>
            </div>
            <!-- / Add New Post Form -->
        </div>
    </div>
@stop
@include('modalImageUpload')