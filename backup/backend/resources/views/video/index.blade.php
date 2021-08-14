@extends('dashboardTemplate')
@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-md-6 col-sm-6 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Components</span>
            <h3 class="page-title">News Posts </h3>
        </div>

        <div class="col-md-6 d-flex justify-content-end mt-2">
            <div class="mr-3 ml-3">
                <a href="{{ url('video/create') }}" class="btn btn-primary btn-sm">tambah data</a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Alert Session -->
        @include('_partial.flash_message')
    <!-- / Alert Session -->
    
    <div class="row" id="page-list">
    @foreach($video_data as $video)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="ccard card-small card-post card-post--1">
                <div class="card-post__image">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ $video->url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <a href="#" class="card-post__category badge badge-pill badge-danger">{{ $video->academic }}</a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-fiord-blue" href="#">{{ $video->title }}</a>
                    </h5>
                    <div>{!! substr($video->description,0,80) !!}</div>
                    <p class="card-text"></p>
                    <div>
                        <a href="{{ url('video/'.$video->id.'/edit') }}">
                            <button class="btn btn-sm btn-outline-accent float-right mr-n2 mt-n3"> <i class="far fa-edit"></i> Edit </button>
                        </a>
                        <button class="btn btn-sm btn-outline-danger float-right mr-2 mt-n3" data-toggle="modal" data-target="#ModalDelete" data-id="{{ $video->id }}" id="hapusData"> <i class="far fa-trash-alt"></i> Delete </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="float-left mr-3">
                {{ $video_data->links() }}
            </div>
            <div class="float-left ml-3">
                <button class="btn btn-outline-accent">Total {{ $video_data->total() }} Video</button>
            </div>
        </div>
    </div>
@stop
@section('modal_delete')
    <!-- News Modal Delete-->
    @include('video/modalDelete')
@stop