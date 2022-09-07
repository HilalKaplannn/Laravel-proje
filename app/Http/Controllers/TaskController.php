<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Contact;



class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
       // $tasks = Task::all();

        $status_completed = Status::completed();

        $tasks = Task::query()
            ->select("tasks.gorev_adi","tasks.gorevli","tasks.aciklama","tasks.uuid")
            ->addSelect("statuses.name as status_name","users.name as user_name","tasks.created_at")
            ->join("users","users.id","=","tasks.user_id")
            ->join("statuses","statuses.id","=","tasks.status_id")
            ->where("tasks.status_id","!=",$status_completed->id)
            ->get();
        return view("task.index",compact("tasks"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $task_statuses = Status::all();
        return view("task.create",compact("task_statuses"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->uuid = Str::uuid();
        $task->gorev_adi = $request->gorev_adi;
        $task->gorevli = $request->gorevli;
        $task->aciklama = $request->aciklama;
        $task->user_id = auth()->id();
        $task->status_id = $request->task_status;
        $task->save();

        return redirect()->to(route("tasks.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($task_uuid)
    {
        $task= Task::query()
            ->select("tasks.gorev_adi","tasks.gorevli","tasks.aciklama")
            ->addSelect("statuses.name as status_name","users.name as user_name","tasks.created_at")
            ->join("users","users.id","=","tasks.user_id")
            ->join("statuses","statuses.id","=","tasks.status_id")
            ->where("uuid","=", $task_uuid)->first();
        return view("task.show",compact("task"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($task_uuid)
    {
        $task= Task::query()
            ->select("tasks.gorev_adi","tasks.gorevli","tasks.aciklama","tasks.uuid","statuses.name as status_name")
            ->addSelect("tasks.status_id as status_id","users.name as user_name","tasks.created_at")
            ->join("users","users.id","=","tasks.user_id")
            ->join("statuses","statuses.id","=","tasks.status_id")
            ->where("uuid","=", $task_uuid)->first();
        $task_statuses = Status::all();

        return view("task.edit",compact("task","task_statuses"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $task_uuid)
    {
        $task = Task::query()->where("uuid","=","$task_uuid")->first();
        $task ->gorev_adi = $request->gorev_adi;
        $task ->gorevli =$request->gorevli;
        $task ->aciklama=$request->aciklama;
        $task ->status_id =$request->task_status;
        $task->update();
        return redirect()->to(route("tasks.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($task_uuid)
    {
        $task = Task::query()->where("uuid","=",$task_uuid)->first();
        $task->delete();
        return response()->redirectToRoute("tasks.index");
    }

    public function contactPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|min:5',
            'email'=>'required|email',
            'topic'=>'required',
            'message'=>'required|min:10'
        ]);
        if($validator->fails()){
            return redirect()->route('iletisim')->withErrors($validator)->withInput();
        }
        $contact = new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();
        return redirect()-> route('iletisim')->with('success',"Mesajınız bize iletildi. Teşekkür ederiz.");

    }



}



