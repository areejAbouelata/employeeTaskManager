<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        To DO
        $data = User::when($request->key_word, function ($q) use ($request) {
            $q->where('name', "LIKE", "%" . $request->key_word . "%")
                ->orWhere('last_name', "LIKE", "%" . $request->key_word . "%");
        })
            ->when($request->user == 'manager' , function ($q) use($request){
                $q->whereHas('employee' , function ($q)use($request){
                   $q->where('manager_id' , auth()->user()->id);
                });
            })
            ->where('user_type', 'employee')
            ->get();
        return view('admin.employee.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $managers = User::where('user_type', 'manager')->latest()->get();
        $departments = Department::latest()->get();
        return view('admin.employee.create', compact('managers' , 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
//        dd("ASas") ;
        $user = User::create($request->only(['name', 'last_name', 'password', 'image', 'email']) + ['user_type' => 'employee']);
        $user->employee()->create($request->only(['manager_id', 'salary' , 'department_id']));
        return redirect()->route('admin.employee.index');
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
        $user = User::findOrFail($id);
        $managers = User::where('user_type', 'manager')->latest()->get();
        $departments = Department::latest()->get();

        return view('admin.employee.edit', compact('user', 'managers' , 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $password = $request->password ? ['password' => $request->password] : [];
        $image = $request->image ? ['image' => $request->image] : [];
        $user->update($request->only(['name', 'last_name', 'email']) + $image + $password);
        $user->employee->update($request->only(['manager_id', 'salary' , 'department_id']));
        return redirect()->route('admin.employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
//        if ($user->tasks()->count()) return redirect()->back()->with('status', 'can not delete');
        $user->delete();
        return redirect()->back()->with('primary', 'delete');
    }
}
