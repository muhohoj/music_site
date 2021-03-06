@extends('layouts.master')
@section('master')
    <section class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 py-3">
                    <h3 class="text-center text-muted">
                    {{$category_one->songs->count()}} {{ucwords($category_one->name)}} Songs
                    </h3>
                </div>

                <div class="col-lg-2">
                    <div class="list-group">
                        <a href="{{ url('/')}}"
                           class="list-group-item list-group-item-action active">
                           Home
                        </a>
                        @foreach($categories as $category)
                            <a href="{{ route('category.show',$category->uuid) }}"
                               class="list-group-item list-group-item-action">
                                {{ucwords($category->name)}}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-10">
                    <div class="row">
                        @isset($category_one->songs)
                            @each('songs.partials.songs',$category_one->songs,'song')
                        @endisset

                        @empty($category_one->songs)
                            <h1>No Songs yet in this category</h1>
                        @endempty
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection