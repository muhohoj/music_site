<div class="col-lg-4 py-1" >
    <div class="card border-primary">
        <div class="card-header"
        >
            {{ucwords($song->title)}}.
        </div>
        <div class="card-body">
            <p>Artist:{{ucwords($song->artist)}}</p>
            <p>Category:{{ucwords($song->category->name)}}</p>
        </div>

        <div class="card-footer">
            {{--<b class="float-right">Price: ${{$song->price}}</b>--}}
            {{--{{ \Illuminate\Support\Facades\Storage::disk('local')->url($song->path) }}--}}
            <a class="btn btn-dark" href="{{ route('song.download',$song->uuid) }}">
                download
            </a>
        </div>
    </div>
</div>