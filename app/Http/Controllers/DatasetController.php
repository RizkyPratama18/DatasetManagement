<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dataset;

class DatasetController extends Controller
{
    public function viewUpload(){
        return view('dataset.upload');
    }

    public function store(Request $request){
        $file = $request->file('dataset');
        $filename = $file->getClientOriginalName();
        $upload = $request->file('dataset');
        $path = $upload->store('public/dataset/');
        $new_dataset = new dataset();
        $new_dataset->name_dataset = $request->name_dataset;
        $new_dataset->filename = $filename;
        $new_dataset->path = $path;
        $new_dataset->save();
        return redirect('/dataset/upload') ;
    }
}
