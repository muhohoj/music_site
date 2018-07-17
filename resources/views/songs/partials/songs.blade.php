<div class="col-lg-4 py-1">
    <div class="card border-success">
        <div class="card-header">
            {{ucwords($song->title)}}.
        </div>
        <div class="card-body">
            <p>Artist:{{ucwords($song->artist)}}</p>
        </div>

        <div class="card-footer">
            <a href="{{ route('song.buy',$song->uuid) }}" class="btn btn-secondary">
                Buy
            </a>
            <b class="float-right">Price: ${{$song->price}}</b>
            {{--{{ \Illuminate\Support\Facades\Storage::disk('local')->url($song->path) }}--}}
            <a class="btn btn-outline-info" href="{{ route('song.download',$song->uuid) }}">
                download
            </a>


            {{--<video width="320" height="240" autoplay>--}}
                {{--<source src="{{asset('storage/'.$song->path)}}" type="video/mp4">--}}
                {{--Your browser does not support HTML5 video.--}}
            {{--</video>--}}
        </div>
    </div>
</div>