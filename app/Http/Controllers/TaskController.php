<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $data = [];
        $tasks = Task::get();
        $data['tasks'] = $tasks;
        return view('tasks.index',$data);
    }

    public function store(StoreTaskRequest $request){
        $dataInsert =[
            'name' => $request->name
        ];
        $task = Task::create($dataInsert);
        session()->flash('success', 'Added successfully.');
        return redirect()->back();
    }
    public function destroy($id){
        $task = Task::find($id);
        $task->delete();
        session()->flash('success', 'Deleted successfully.');
        return redirect()->back();
    }   
}
