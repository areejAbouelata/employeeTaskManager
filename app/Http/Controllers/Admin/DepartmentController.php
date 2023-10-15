<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        To DO
        $data = Department::when($request->key_word, function ($q) use ($request) {
            $q->where('name', "LIKE", "%" . $request->key_word . "%");
        })
            ->get();
        return view('admin.department.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $managers = User::where('user_type', 'manager')->latest()->get();
        return view('admin.department.create', compact('managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\Department $request)
    {
        Department::create($request->validated());
        return redirect()->route('admin.department.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        $managers = User::where('user_type', 'manager')->latest()->get();
        return view('admin.department.edit', compact('department', 'managers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\Department $request, string $id)
    {
        $item = Department::findOrFail($id);
        $item->update($request->validated());
        return redirect()->route('admin.department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        if ($department->employees()->count()) return redirect()->back()->with('danger', 'can not delete');

        $department->delete();
        return redirect()->back()->with('primary', 'delete');
    }
}
