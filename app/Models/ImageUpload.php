<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    use HasFactory;


    public static function upload($image){
        $imageName = time() . '_' . $image->getClientOriginalName();
        $result = $image->move(public_path() . "/assets/img/products/", $imageName);

        if($result) {
             return $imageName;
        }

        return false;
    }

    public static function deleteImg($img){

        $oldImagePath = public_path() . "/assets/images/products/".$img;

        if(file_exists($oldImagePath)) {
            return unlink($oldImagePath);
        }
    }
}
