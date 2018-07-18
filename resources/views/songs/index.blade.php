@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">

                <div class="card">
                    <div class="card-header">Create Song</div>

                    <div class="card-body">
                        <form autocomplete="off" action="{{ route('song.create') }}" method="post" enctype="multipart/form-data">
                            @csrf


                            {{--{{$errors}}--}}

                            {{--image_upload--}}
                            {{--<div class="slim"--}}
                                 {{--data-label="Drop the song avatar here"--}}
                                 {{--data-service=""--}}
                                 {{--data-size="240,240"--}}
                                 {{--data-push="true"--}}
                                 {{--data-button-edit-label="false"--}}
                                 {{--data-ratio="1:1">--}}
                                {{--<input type="file" name="image"/>--}}
                            {{--</div>--}}
                            {{--image_upload--}}

                            {{--create song--}}

                            <div class="form-group py-1">
                                <label for="name">Song Title</label>
                                <input value="{{ old('title') }}" type="text" class="form-control" name="title" id="title">
                            </div>


                            <div class="form-group">
                                <label for="artist">Artist</label>
                                <input value="{{ old('artist') }}" type="text" class="form-control" name="artist" id="artist">
                            </div>


                            <div class="form-group">
                                <label for="price">Price</label>
                                <input value="{{ old('price') }}" type="number" min="1" class="form-control" name="price" id="price">
                            </div>


                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="name">Song File</label>
                                <input type="file" class="form-control{{ $errors->has('song') ? ' is-invalid' : '' }}" name="song" id="song">
                                @if ($errors->has('song'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('song') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>

                        </form>
                        {{--create song--}}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Songs</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Artist</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($songs as $song)
                            <tr>
                                <td scope="row">
                                    {{$loop->iteration}}
                                </td>
                                <td>{{$song->title}}</td>
                                <td>{{$song->category->name}}</td>
                                <td>{{$song->artist}}</td>
                                <td>{{$song->price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
