<?php

function getImage($folder=null,$file=null){

    $url = asset("images/nothing.png");
    $path = public_path('images/'.$folder.'/'.$file);
    if (!empty($folder) && (!empty($file))) {
        if(file_exists($path)){
            $url = asset('images/'.$folder.'/'.$file);
        }
    }
    return $url;
}

function deleteImage($folder=null, $file=null){
    if(!empty($folder) && (!empty($file))){
        $path = public_path($folder.'/'.$file);
        $isExsist = file_exists($path);
        if($isExsist){
            unlink($path);
        }
    }
    return true;
}

function createImage($getId=null, $folder=null,$file=null, $request=null, $label=null){
    if($request->hasFile($file)){

        $originName =$request->file($file)->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extention = $request->file($file)->getClientOriginalExtension();
        $fileName =$label.$getId->id.'.'.$extention;

        $request->file($file)->move(public_path($folder), $fileName);
        // $data[$file] = $fileName;
        $getId->$file = $fileName;

        $getId->save();
    }
}
function updateImage($folder=null,$file=null, $request=null, $label=null, $id=null){
    if($request->hasFile($file)){
        deleteImage($folder, $file);
        $originName =$request->file($file)->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extention = $request->file($file)->getClientOriginalExtension();
        $fileName =$label . $id.'.'.$extention;

        $request->file($file)->move(public_path($folder), $fileName);
        // $data[$file] = $fileName;
        return $fileName;
    }
}

function strLimit($value=null, $limit=null){
   $limit2 = "Input Something";
if(!empty($value) && !empty($limit)){
       $limit2 = \Illuminate\Support\Str::limit($value, $limit, '...');
   }
   return $limit2;
}





?>
