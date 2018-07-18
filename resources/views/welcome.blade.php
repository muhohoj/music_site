@extends('layouts.master')
@section('header')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('{{asset('img/slide_four.jpg')}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Download music on our website</h1>
                        <p>Just select the song from our catalog and hit the.
                            <button class="btn btn-outline-info">Download</button> button to get the music</p>

                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{asset('img/slide_one.jpg')}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Second Slide</h3>
                        <p>This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{asset('img/slide_three.jpg')}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Third Slide</h3>
                        <p>This is a description for the third slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>
@endsection
@section('master')
    <!-- Page Content -->
    <section class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <div class="list-group">
                        <li class="list-group-item list-group-item-action active" style="margin-top: 1.3rem;">
                            Categories
                        </li>
                        @each('categories.partials.side_menu',$categories,'category')
                    </div>
                </div>
                <div class="col-lg-10">
                    @if(\Illuminate\Support\Facades\Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{\Illuminate\Support\Facades\Session::get('error')}}</strong>
                        </div>
                    @endif
                    <div class="row">
                        @each('songs.partials.songs',$songs,'song')
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--about--}}
    <section style="
            background-image: url('{{asset('img/slide_four.jpg')}}');!important;
            background-attachment:fixed;
            background-position: center;
            " id="about" class="content-section bg-primary text-white text-center  text-white">
        <div class="container text-center">
            <h2 class="mb-4">About Tribute Ltd</h2>
            <p style="font-size: 2rem;">
                Tribute Ltd is a music production company that specializes in music production,Sales and promotions
            </p>
        </div>
    </section>

    <!-- services -->
    <section class="content-section bg-white" id="services">
        <div class="container-fluid">
            <div class="">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card ">
                                <div class="card-header bg-primary text-white text-center ">
                                    Music Production
                                </div>
                                <div class="card-body">
                                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa,
                                        ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique
                                        quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white text-center ">
                                    Music Production
                                </div>
                                <div class="card-body">
                                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa,
                                        ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique
                                        quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white text-center ">
                                    Music Production
                                </div>
                                <div class="card-body">
                                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa,
                                        ipsam, eligendi, in quo sunt possimus non
                                        incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae
                                        fugiat numquam repellat.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>


    <section class="content-section bg-light justify-content-center" id="contacts">
        <div class="container-fluid">
            <p class="text-center">
                Contacts: +221 089 2178
            </p>

            <p class="text-center">
                email: info@tribute.com
            </p>

            <p class="text-center">
                Location: Texas
            </p>

        </div>
        <div style="width: 100%;height: 50px;background: #c5c5c5;position: fixed;bottom: 0;padding: .5rem;">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">
                        Admin login
                    </a>
                </li>
            </ul>
        </div>
    </section>
@endsection