<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\task;
use App\File;
use App\dataset;
use Illuminate\Support\Facades\Storage;


class TaskController extends Controller
{
    public function getListTask(){
        $data = task::all()->where('status', '<>', 'I');
        return view('task.list',compact('data'));
    }

    public function deleteTask($id){
        $delete_task = task::find($id);
        $delete_task->status = 'I';
        $delete_task->save();
        return redirect('/task/list');
    }

    public function registerTask(){
        $dataset = dataset::all();
        return view('task.create', compact('dataset'));
    }

    public function saveTask(Request $request){
        $new_task = new task();
        $new_task->name_task = $request->name_task;
        $new_task->id_dataset = $request->id_dataset;
        $new_task->id_user = NULL;
        $new_task->status = 'N';
        $new_task->save();

        return redirect('/task/register');

    }

    public function viewTaskUser(){
        $id_user  = Auth::id();
        $data1 = task::all()->where('status', 'N');
        $haha = task::all()->where('status', 'P');
        $data3 = task::all()->where('status', 'A')
                            ->where ('id_user',$id_user);
        return view('task.listuser',compact('data1','haha','data3'));
    }

    public function bookTask($id){
        $id_user  = Auth::id();
        $revoke_task = task::find($id);
        $revoke_task->id_user = $id_user;
        $revoke_task->status = 'P';
        $revoke_task->save();
        return redirect('/task/user');
    }

    public function revokeTask($id){
        $revoke_task = task::find($id);
        $revoke_task->id_user = NULL;
        $revoke_task->status = 'N';
        $revoke_task->save();
        return redirect('/task/user');
    }

    public function listManagementTask(){
        $data = task::all()->where('status', 'P');
        return view('task.management', compact('data'));
    }

    public function listManagementAcceptTask($id){
        $revoke_task = task::find($id);
        $revoke_task->status = 'A';
        $revoke_task->save();
        return redirect('/task/management');
    }

    public function listManagementRefuseTask($id){
        $revoke_task = task::find($id);
        $revoke_task->id_user = NULL;
        $revoke_task->status = 'N';
        $revoke_task->save();
        return redirect('/task/management');
    }

    public function downloadDataset($id){
        $dataset = dataset::find($id);
        return Storage::download($dataset->path, $dataset->filename);
    }
}
