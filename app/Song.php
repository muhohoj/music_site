<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $guarded = [];


    public static function getAll(){
        return self::with(['category'])->get();
    }

    public function category(){
        return self::belongsTo(Category::class,'category_id');
    }


    public static function getById($id){
       return self::query()->with(['category'])->findOrFail($id);
    }

    public static function relatedSongs($category_id,$song_id){
       return self::query()
           ->whereNotIn('id',[$song_id])
           ->where('category_id',$category_id)
           ->get();
    }
}
