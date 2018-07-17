<?php

namespace App\Http\Controllers;

use App\Category;
use App\Song;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        $data = [
            'songs'=>Song::getAll(),
            'categories'=>Category::getAllCategories(),
        ];
        return view('welcome',$data);
    }
}
