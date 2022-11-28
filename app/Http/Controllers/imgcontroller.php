<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class imgcontroller extends Controller
{
    //
    function muluplaoad(Request $req){
        echo $req;
    }   
    // public function mulupload(Request $req){
    //     $images=$req->file('image');
    //     $imagename="";
    //     $imagesPath=[];
    //         foreach($images as $image){
    //             $new_name=rand().".".$image->getClientOriginalExtension();
    //             $image_path=$image->move(public_path('/uploads/images/'),$new_name);
    //             $imagename=$imagename.$new_name.",";
    //             $imagesPath['image']=$imagename;
    //         //    array_push($imagesPath,'/uploads/images/'.$new_name.".".$image->getClientOriginalExtension());
    //         }   
    //         dispatch(new db_ins($imagesPath));
       
      
            
         
    //         // $new_name=rand().".".$image->getClientOriginalExtension();
    //         // $image->move(public_path('/uploads/images/'),$new_name);


    //     // }
    
    //     // $uploadfile = $req->file->store('/uploads/images/');
    //     // return ['result'=>$imagesPath];


    // }
}
