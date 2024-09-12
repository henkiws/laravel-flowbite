<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use Image;
use File;

trait FileUploadTrait {

    public function uploadFileByUrl($url, $folder_name = '', $params = [], $model) {
        $img        = $params;
        $imageContent = file_get_contents($url);
        $filename   = Str::random(40);
        $infoPath = pathinfo($url);
        $extension = $infoPath['extension'];
        $path       = public_path('data/'.$folder_name);
        $path_file  = 'data/'.$folder_name.'/'.$filename.'.'.$extension;

        Storage::disk('public_data')->put($path_file, $imageContent);

        $img['filename']    = $filename;
        $img['path']        = $path_file;
        $img['extention']   = $extension;
        $res_img            = $model::create($img);
        
        return $res_img;
    }

    public function uploadFile($file, $folder_name = '', $unique_filename = '', $is_crop = false) {
        $extension  = $file->getClientOriginalExtension();
        if( empty($unique_filename) ) {
            $filename   = $file->getClientOriginalName();
        }else{
            $filename   = $unique_filename.'.'.$extension;
        }
        $path       = public_path('data/'.$folder_name);
        $path_file  = 'data/'.$folder_name.'/'.$filename;
        $file->move($path, $filename);

        if( $is_crop ) {
            $image  = Image::make(file_get_contents(public_path($path_file)));
            $path = public_path('data/'.$folder_name);
            $image->fit(300, 300)->save($path.'/'.$filename);
            $path_file  = 'data/'.$folder_name.'/'.$filename;
        }

        $img['filename']    = $filename;
        $img['path']        = $path_file;
        $img['extention']   = $extension;
        
        return $img;
    }

    public function deleteFileByName($filename, $model) {
        $model::where('filename',$filename)->delete();
        $file_path = public_path('data/menu').'/'.$filename;
        if(File::exists($file_path)){
            File::delete($file_path);
        }
        return 1;
    }

    public function createDirectory($path) {
        $fullpath = public_path().'/'.$path;
        File::makeDirectory($fullpath, 0777, true, true);
        return true;
    }

}