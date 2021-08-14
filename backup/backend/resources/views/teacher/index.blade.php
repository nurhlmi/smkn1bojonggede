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
                <a href="{{ url('teacher/create') }}" class="btn btn-primary btn-sm">tambah data</a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Alert Session -->
        @include('_partial.flash_message')
    <!-- / Alert Session -->
    
    <div class="row" id="teacher-list">
    @foreach($teacher_data as $teacher)
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="ccard card-small card-post card-post--1">
                <div class="card-post__image" style="background-image: url({{ asset('images/teacher/'.$teacher->image) }});"></div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-fiord-blue" href="#">{{ $teacher->name }}</a>
                    </h5>
                    <div>{{ $teacher->position }}</div>
                    <!-- <div>{!! substr($teacher->description,0,80) !!}</div> -->
                    <p class="card-text"></p>
                    <div>
                        <a href="{{ url('teacher/'.$teacher->id.'/edit') }}">
                            <button class="btn btn-sm btn-outline-accent float-right mr-n2 mt-n3"> <i class="far fa-edit"></i> Edit </button>
                        </a>
                        <button class="btn btn-sm btn-outline-danger float-right mr-2 mt-n3" data-toggle="modal" data-target="#ModalDelete" data-id="{{ $teacher->id }}" id="hapusData"> <i class="far fa-trash-alt"></i> Delete </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="float-left mr-3">
                {{ $teacher_data->links() }}
            </div>
            <div class="float-left ml-3">
                <button class="btn btn-outline-accent">Total {{ $teacher_data->total() }} teacher</button>
            </div>
        </div>
    </div>
@stop
@section('modal_delete')
    <!-- News Modal Delete-->
    @include('teacher/modalDelete')
@stop