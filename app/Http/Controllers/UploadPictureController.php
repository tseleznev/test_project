<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Models\Picture;
use Intervention\Image\Facades\Image;

class UploadPictureController extends Controller
{
    public function upload(UploadRequest $request)
	{
	    if(isset($_POST['name'])){
            $file = $request->file('image');
            $name = $request->input('name');
            $height = (int)((Image::make($file)->height())/2);
            $width = (int)((Image::make($file)->width())/2);
            $p1 = Image::make($file)->crop($width,$height,0,0)->encode('data-url');
            $p2 = Image::make($file)->crop($width,$height,$width,0)->encode('data-url');
            $p3 = Image::make($file)->crop($width,$height,0,$height)->encode('data-url');
            $p4 = Image::make($file)->crop($width,$height,$width,$height)->encode('data-url');
            Picture::create([
                    'name'=>$name,
                    'part_1'=>$p1,
                    'part_2'=>$p2,
                    'part_3'=>$p3,
                    'part_4'=>$p4
            ]);
            return view('form')->with('result', 'For access to part of image insert into url /name/#Part');
        }
	    else{
            return abort(404);
        }
//		$size = $img->filesize();
//    	dd($name.$file);
	}
}
