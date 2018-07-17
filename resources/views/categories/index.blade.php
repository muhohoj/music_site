@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        {{--create category--}}
                        <form autocomplete="off" action="{{ route('category.create') }}" method="post" class="form-inline">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                &nbsp;
                                <input type="text" class="form-control" name="name" id="name">
                                &nbsp;
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>

                        </form>
                        {{--create category--}}
                    </div>

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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td scope="row">
                                {{$loop->iteration}}
                            </td>
                            <td>{{$category->name}}</td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
