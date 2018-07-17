@extends('layouts.master')
@section('master')
    <div class="container py-5">
        <div class="row justify-content-center ">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <p>Buy {{$song->title}}</p>


                        <p class="pull-right">{{ $song->price }}</p>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Card Number</label>
                                    <input type="text" class="form-control" name="card_number">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Cvv</label>
                                    <input type="text" class="form-control" name="card_number">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">EXPIRATION DATE</label>
                                    <input type="text" class="form-control" name="card_number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <button class="btn btn-primary">
                                        Pay
                                    </button>

                                    <a href="{{ url('/') }}" class="btn btn-secondary">
                                        Home
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center py-5">
            <div class="col-lg-10">
                <h3 class="text-muted text-center">
                    Related Songs {{$song->category->name}} Songs
                </h3>
                <div class="row">
                @each('songs.partials.songs',$related_songs,'song')
                </div>
            </div>
        </div>
    </div>
@endsection