<?php

namespace App\Http\Controllers;

use App\Category;
use App\Song;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories'=>Category::getAllCategories(),
            'songs'=>Song::getAll(),
        ];
        return view('songs.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    protected static function upload_song($attachment, $song)
    {
        $file = $attachment;
        $extension = $file->getClientOriginalExtension();

        $name = str_replace(" ", "_", $file->getClientOriginalName());
        $file_name = $song. '_' . $song->id . '_' . $name;
        $size = $file->getSize();
//        $mime_type = $file->getMimeType();
        $name = str_replace(" ", "_", $file->getClientOriginalName());
//        $mime_type = $file->getMimeType();
        $destinationPath = public_path() . '/uploads/songs/';
//        Storage::disk('local')->putFile($name, new File(public_path()));
        $destinationPath = public_path() . '/uploads/orders/new';
//        $file->copy($destinationPath, $file_name);
        return Storage::disk('local')->put($name,file_get_contents($file));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'artist'=>'required',
            'price'=>'required',
            'category'=>'required',
            'song'=>'required|mimes:mp4',
        ]);

        $image_file = $request->image;
        $file = $request->song;
        $extension = $file->getClientOriginalExtension();
        $name = str_replace(" ", "_", $file->getClientOriginalName());

        $song =  Song::query()->create([
            'title'=>$request->title,
            'category_id'=>$request->category,
            'artist'=>$request->artist,
            'price'=>$request->price,
            'uuid'=>Str::uuid(),
            'path'=>$name,
        ]);

        self::upload_song($request->song,$song);

        return redirect()->route('songs')->with('status','Song Created');
    }

    public function download($uuid){
        $path =  Song::query()->where('uuid',$uuid)->pluck('path')->first();
        $exists = Storage::disk('local')->exists($path);
        if($exists){
            return Storage::download($path);
        }
        return redirect()->back()->with('error','Something went wrong file not found');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buy($uuid)
    {
       $id =Song::query()->where('uuid',$uuid)->pluck('id')->first();
       $category_id =Song::query()->where('uuid',$uuid)->pluck('category_id')->first();
       $data=[
           'song'=>Song::getById($id),
           'related_songs'=>Song::relatedSongs($category_id,$id),
       ];
        return view('songs.buy',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
