<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use App\Models\priority;
use App\Models\User;

class TaskController extends Controller
{
    private  $validationRules = [
        'name' => ['required', 'min:3', 'max:64'],
        'description' => ['max:512'],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tasks = Task::all();
        $search = $request->session()->get('task_search', null);
        $filter_priority = $request->session()->get('priority_filter_task', null);

        /*
        if ($search==null && $filter_warehouse==null){
            $products=Product::all();
        }else{
            $products=Product::orderBy('name');
            if ($search!=null){
                $products=$products->where('name','like',"%$search%");
            }
            if ($filter_warehouse!=null){
                $products=$products->where('warehouse_id',$filter_warehouse);
            }
            $products=$products->get();
        }
        */

        $tasks = Task::search($search)->fromPriority($filter_priority)->with('priority')->get();

        $priorities = Priority::all();

        return view("tasks.index", [
            'tasks' => $tasks,
            'priorities' => $priorities,
            'search' => $search,
            'filter_priority' => $filter_priority
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorities = Priority::all();
        $users = User::all();
        return view('tasks.create', [
            'priorities' => $priorities,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->priority_id = $request->priority_id;
        $task->user_id = $request->user_id;
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        $priorities = Priority::all();
        $users = User::all();
        return view('tasks.edit', [
            'task' => $task,
            'priorities' => $priorities,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {
        $request->validate($this->validationRules);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->priority_id = $request->priority_id;
        $task->user_id = $request->user_id;
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function search(Request $request)
    {
        $request->session()->put('task_search', $request->search);
        return redirect()->route('tasks.index');
    }

    public function reset(Request $request)
    {
        $request->session()->put('task_search', null);
        $request->session()->put('task_filter_priority', null);
        return redirect()->route('tasks.index');
    }

    public function filter(Request $request)
    {
        $request->session()->put('priority_filter_task', $request->filter_priority);
        return redirect()->route('tasks.index');
    }
}
