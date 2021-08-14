<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = "";
        //Page Dashboard
        if(Request::segment(1) == 'dashboard') {
            $halaman = 'dashboard';
        }

        //Page Blog
        if(Request::segment(1) == 'blog') {
            $halaman = 'blog';
        }

        if(Request::segment(1) == 'blog' && Request::segment(2) == 'create') {
            $halaman = 'blog_create';
        }

        //Page Teacher
        if(Request::segment(1) == 'teacher') {
            $halaman = 'teacher';
        }

        if(Request::segment(1) == 'teacher' && Request::segment(2) == 'create') {
            $halaman = 'teacher_create';
        }

        //Page Carousel
        if(Request::segment(1) == 'carousel') {
            $halaman = 'carousel';
        }

        if(Request::segment(1) == 'carousel' && Request::segment(2) == 'create') {
            $halaman = 'carousel_create';
        }

        //Page Page
        if(Request::segment(1) == 'page') {
            $halaman = 'page';
        }

        if(Request::segment(1) == 'page' && Request::segment(3) == 'edit') {
            $halaman = 'page_edit';
        }

        //Page Video
        if(Request::segment(1) == 'video') {
            $halaman = 'video';
        }

        view()->share('halaman', $halaman);

        Schema::defaultStringLength(191);
    }
}
