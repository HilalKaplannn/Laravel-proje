<?php

namespace App\Http\Controllers;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $tasks = Task::query()
            ->select("tasks.gorev_adi","tasks.gorevli","tasks.aciklama","tasks.uuid")
            ->addSelect("statuses.name as status_name","users.name as user_name","tasks.created_at")
            ->join("users","users.id","=","tasks.user_id")
            ->join("statuses","statuses.id","=","tasks.status_id")
            ->get();
        $status_completed = Status::completed();
        $devam_eden_tasks = Task::query()
            ->select("tasks.gorev_adi", "tasks.gorevli", "tasks.aciklama", "tasks.uuid")
            ->addSelect("statuses.name as status_name", "users.name as user_name", "tasks.created_at")
            ->join("users", "users.id", "=", "tasks.user_id")
            ->join("statuses", "statuses.id", "=", "tasks.status_id")
            ->where("tasks.status_id", "!=", $status_completed->id)
            ->get();
        $completed_tasks = Task::query()
            ->select("tasks.gorev_adi", "tasks.gorevli", "tasks.aciklama", "tasks.uuid")
            ->addSelect("statuses.name as status_name", "users.name as user_name", "tasks.created_at")
            ->join("users", "users.id", "=", "tasks.user_id")
            ->join("statuses", "statuses.id", "=", "tasks.status_id")
            ->where("tasks.status_id", "=", $status_completed->id)
            ->get();

        return view('dashboard',compact("tasks","devam_eden_tasks","completed_tasks"));


    }

}
