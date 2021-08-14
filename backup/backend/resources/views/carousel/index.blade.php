@extends('dashboardTemplate')
@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-md-6 col-sm-6 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Components</span>
            <h3 class="page-title">Carousel Posts </h3>
        </div>

        <div class="col-md-6 d-flex justify-content-end mt-2">
            <div class="mr-3 ml-3">
                <a href="{{ url('carousel/create') }}" class="btn btn-primary btn-sm">tambah data</a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Alert Session -->
        @include('_partial.flash_message')
    <!-- / Alert Session -->
    <div class="row">
    @foreach($carousel_data as $carousel)
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post card-post--1">
                <div class="card-post__image" style="background-image: url({{ asset('images/carousel/'.$carousel->image) }});">
                    <a href="#" class="card-post__category badge badge-pill badge-primary">{{ $carousel->order }}</a>
                </div>
                <div class="card-body">
                    <a href="{{ url('carousel/'.$carousel->id.'/edit') }}">
                        <button class="btn btn-sm btn-outline-accent float-right mr-n2 mt-n3"> <i class="far fa-edit"></i> Edit </button>
                    </a>                   
                    <button class="btn btn-sm btn-outline-danger float-right mr-2 mt-n3" data-toggle="modal" data-target="#ModalDelete" data-id="{{ $carousel->id }}"> <i class="far fa-trash-alt"></i> Delete </button>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="float-left mr-3">
                
            </div>
            <div class="float-left ml-3">
                
            </div>
        </div>
    </div>
@stop
@section('modal_delete')
    <!-- News Modal Delete-->
    @include('carousel/modalDelete')
@stop