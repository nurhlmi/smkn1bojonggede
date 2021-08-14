@extends('dashboardTemplate')
@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">News Posts</span>
        <h3 class="page-title">Add New Post</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                    <form action="{{ url('blog') }}" method="POST" class="add-new-post" enctype="multipart/form-data">
                        @include('blog/form')
                    </form>
                </div>
            </div>
            <!-- / Add New Post Form -->
        </div>
    </div>
@stop
@include('_partial/modalImageUpload')