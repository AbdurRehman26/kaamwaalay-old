<?php


use Image,Storage;

public static function cropImage($file, $details) {

    $extensions = !empty($details['extensions']) ? $details['extensions'] : [ 'jpg' , 'jpeg', 'png', 'gif', 'bmp', 'svg'];

    $path = !empty($details['path']) ? $details['path'] : '/';


    $thumb_width = !empty($details['thumb_width']) ? $details['thumb_width'] : config('app.uploads.images.thumbnails.width');
    $thumb_height = !empty($details['thumb_height']) ? $details['thumb_height'] : config('app.uploads.images.thumbnails.height');

    if(!$thumb_width){
        $thumb_width = 360;
    }

    if(!$thumb_height){
        $thumb_height = 200;
    }

    list($name, $ext) = explode('.', $file->hashName());
    if($file->extension() == 'gif'){
        $file->storeAs($path, $name.".".$file->extension());
        $file->storeAs($path, $name."@3x.".$file->extension());
        $file->storeAs($path, $name."@2x.".$file->extension());
        $file->storeAs($path, $name."@thumb.".$file->extension());
        return $name;
    }

    if (in_array($file->guessExtension(), $extensions)) {
        $image = Image::make($file);
        $width = $image->width();
        $height = $image->height();
        $store = Storage::put($path.'/'.$name.'@3x.'.$ext, $image->stream()->__toString());
        $store = Storage::put($path.'/'.$name.'@2x.'.$ext, $image->resize($width / 1.5, $height / 1.5)->stream()->__toString());
        $store = Storage::put($path.'/'.$name.'@thumb.'.$ext, $image->fit($thumb_width, $thumb_height, function($constraint) { $constraint->aspectRatio(); })->stream()->__toString());
        $store = Storage::put($path.'/'.$name.'.'.$ext, $image->resize($width / 3, $height / 3)->stream()->__toString());
        return $name;
    }

    return false;
}