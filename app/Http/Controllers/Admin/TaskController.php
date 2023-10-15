<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeeTask;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        To DO
        $data = Task::when($request->key_word, function ($q) use ($request) {
            $q->where('title', "LIKE", "%" . $request->key_word . "%");
        })->where('manager_id', auth()->id())
            ->get();
        return view('admin.task.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = User::where('user_type', 'employee')
            ->whereHas('employee', function ($q) {
                $q->where('manager_id', auth()->id());
            })
            ->latest()->get();

        return view('admin.task.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\Task $request)
    {
//        return $request->all();
        $task = Task::create($request->only(['title']) + ['manager_id' => auth()->user()->id]);
        EmployeeTask::create([
            'task_id' => $task->id,
            'employee_id' => $request->employee_id,
        ]);
        return redirect()->route('admin.task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

}
