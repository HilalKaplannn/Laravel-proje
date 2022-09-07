<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Task;

class TrashedController extends Controller
{
    public function trashed(){
        $tasks =Task::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('task.trashed', compact('tasks'));
    }
    public function recover($task_uuid){
        Task::onlyTrashed()->where("uuid","=","$task_uuid")->restore();
        return redirect()->route('tasks.index');
    }
    public function hardDelete($task_uuid){
        Task::onlyTrashed()->where("uuid","=","$task_uuid")->forceDelete();
        return redirect()->route('tasks.index');
    }
}
