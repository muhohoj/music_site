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
                        <h3>First Slide</h3>
                        <p>This is a description for the first slide.</p>
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
                        @foreach($categories as $category)
                            <a href="{{ route('category.show',$category->uuid) }}" class="list-group-item list-group-item-action">
                                {{ucwords($category->name)}}
                            </a>
                        @endforeach
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
    @endsection