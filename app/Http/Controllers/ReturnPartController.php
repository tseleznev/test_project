<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;

class ReturnPartController extends Controller
{
    public function get($name,$id=null){
        $images = Picture::where('name',$name)->get();
        return view('view')->with(['imgs'=>$images,'id'=>$id]);
    }
}
