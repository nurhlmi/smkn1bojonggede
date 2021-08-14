<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <title>Admin Dashboard</title>

    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('styles/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
    <link rel="stylesheet" href="{{ asset('styles/extras.1.1.0.min.css') }}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>

  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{ asset('images/shards-dashboards-logo.svg') }}" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">Admin Dashboard</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link {{ empty($halaman && $halaman == 'dashboard' ? 'active' : '') }}" href="index.html">
                  <i class="material-icons">edit</i>
                  <span>Blog Dashboard</span>
                </a>
              </li>
              <li class="nav-item dropdown {{ !empty($halaman && $halaman == 'blog' || $halaman == 'blog_create') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                  <i class="far fa-newspaper"></i>
                  <span>Blog</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item {{ !empty($halaman && $halaman == 'blog') ? 'active' : '' }}" href="{{ url('blog') }}">Blog Post</a>
                  <a class="dropdown-item {{ !empty($halaman && $halaman == 'blog_create') ? 'active' : '' }}" href="{{ url('blog/create') }}">Add New Post</a>
                </div>
              </li>

              <li class="nav-item dropdown {{ !empty($halaman && $halaman == 'carousel' || $halaman == 'carousel_create') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                  <i class="far fa-newspaper"></i>
                  <span>Carousel</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item {{ !empty($halaman && $halaman == 'carousel') ? 'active' : '' }}" href="{{ url('carousel') }}">Carousel Post</a>
                  <a class="dropdown-item {{ !empty($halaman && $halaman == 'carousel_create') ? 'active' : '' }}" href="{{ url('carousel/create') }}">Add New Post</a>
                </div>
              </li>

              <li class="nav-item dropdown {{ !empty($halaman && $halaman == 'teacher' || $halaman == 'teacher_create') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                  <i class="far fa-newspaper"></i>
                  <span>Teacher</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item {{ !empty($halaman && $halaman == 'teacher') ? 'active' : '' }}" href="{{ url('teacher') }}">Teacher Post</a>
                  <a class="dropdown-item {{ !empty($halaman && $halaman == 'teacher_create') ? 'active' : '' }}" href="{{ url('teacher/create') }}">Add New Post</a>
                </div>
              </li>
              <li class="nav-item dropdown {{ !empty($halaman && $halaman == 'page' || $halaman == 'video' || $halaman == 'page_edit') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                  <i class="far fa-newspaper"></i>
                  <span>Page</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item {{ !empty($halaman && $halaman == 'page') ? 'active' : '' }}" href="{{ url('page') }}">Page</a>
                  <a class="dropdown-item {{ !empty($halaman && $halaman == 'video') ? 'active' : '' }}" href="{{ url('video') }}">Video</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ empty($halaman && $halaman == 'gallery' ? 'active' : '') }}" href="{{ url('gallery') }}">
                  <i class="material-icons">edit</i>
                  <span>Gallery</span>
                </a>
              </li>
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->

        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <div class="main-navbar__search w-100 d-none d-md-flex d-lg-flex"></div>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="{{ asset('images/avatars/0.jpg') }}" alt="User Avatar">
                    <span class="d-none d-md-inline-block">{{ Auth::user()->name }}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="user-profile-lite.html"> 
                      <i class="material-icons">&#xE7FD;</i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                      <i class="material-icons text-danger">&#xE879;</i> Logout 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
              </ul>
              
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
              
            </nav>
          </div>

          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            @yield('content')
          </div>
        </main>
      </div>
    </div>

    @yield('modal_delete');
    
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="{{ asset('scripts/extras.1.1.0.min.js') }}"></script>
    <script src="{{ asset('scripts/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{ asset('scripts/app/app-blog-overview.1.1.0.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script>
      //CK Editor
      $(document).ready(function(){
          CKEDITOR.replace( 'editor', {height:'20em'});
      })

      //Delete Data
      $(document).ready(function() {
          $('#ModalDelete').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');
            $(this).find('.modal-body #id').val(id);
          });
      });

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#photo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#image").change(function() {
          readURL(this);
        });
    </script>
    @yield('script')
  </body>
</html>