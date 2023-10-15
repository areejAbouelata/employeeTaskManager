<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeeTask;
use App\Models\Task;
use Illuminate\Http\Request;

class EmployeeTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Task::when($request->key_word, function ($q) use ($request) {
            $q->where('title', "LIKE", "%" . $request->key_word . "%");
        })->whereHas('employeeTask', function ($q) {
            $q->where('employee_id', auth()->id());
        })
            ->get();
        return view('admin.employee_task.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('admin.employee_task.create', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id) ;
        EmployeeTask::where([
            'task_id' => $task->id ,
            'employee_id' => auth()->id()
         ])->update([
             'status' => $request->status
        ]) ;
        return redirect()->route('admin.employee_task.index')->with('primary', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
