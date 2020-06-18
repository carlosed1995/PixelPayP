<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
use App\TaskStatus;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Tasks::orderBy('id','DESC')->paginate(3);
        return view('tasks.index',compact('tasks')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'title'=>'required', 'description'=>'required', 'active'=>'required']);
        $task = Tasks::create($request->all());
         TaskStatus::create(
            [
            'status'=>$request->active,
            'tasks_id'=>$task->id
            ]);

        return redirect()->route('tasks.index')->with('success','Registro creado satisfactoriamente');


   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks=Tasks::find($id);
        return  view('tasks.show',compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks=Tasks::find($id);
        return view('tasks.edit',compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'title'=>'required', 'description'=>'required','active'=>'required']); 
        Tasks::find($id)->update($request->all());
        TaskStatus::where('tasks_id',$id)->update(array(
                          'status'=>$request->active,
        ));
        return redirect()->route('tasks.index')->with('success','Registro actualizado satisfactoriamente');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        DB::table('status_tasks')->where('tasks_id', $id)->delete();
        Tasks::find($id)->delete();
        return redirect()->route('tasks.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
