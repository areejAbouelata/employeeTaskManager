<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function employeeTask()
    {
        return $this->hasOne(EmployeeTask::class , 'task_id') ;
    }
}
