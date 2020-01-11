<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function store(Request $request){

        // dd($request->all());
        $task = new Task;
        $this->validate($request,[
            'task'=>'required|max:100|min:5',

        ]);
        $task->task = $request->task;
        $task->save();
        // return redirect()->back();
        $data = Task::all();
        // dd($data);
        return view('tasks')->with('tasksvariables',$data);
        
    }

    public function UpdateTaskAsCompleted($id){
        $requiredrow = Task::find($id);
        $requiredrow->iscompleted = 1;
        $requiredrow->save();
        return redirect()->back();
    }

    public function UpdateTaskAsNotCompleted($id){
        $requiredrow = Task::find($id);
        $requiredrow->iscompleted = 0;
        $requiredrow->save();
        return redirect()->back();
    }

    public function deletetask($id){
        $requiredrow = Task::find($id);
        $requiredrow->delete();
        return redirect()->back();
    }

    public function updatetaskview($id){
        $requiredrow = Task::find($id);
        return view('updatetask')->with('updaterowdata',$requiredrow);
    }

    public function updateTask(Request $request){
        $oldid = $request->id;
        $newtask = $request->task;
        $requiredRow = Task::find($oldid);
        $requiredRow->task = $newtask;
        $requiredRow->save();
        $datas = Task::all();

        return view('tasks')->with('tasksvariables',$datas);
    }
}
