<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable= [
        'name',
        'uuid',

    ];

    public static function getAllCategories(){
        return self::all();
    }

    public static function getByid($id){
        return self::query()->with(['songs'])->findOrFail($id);
    }

    public function songs(){
        return $this::hasMany(Song::class);
    }
}
