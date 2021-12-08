<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function departments()
    {
        return $this->belongsToMany(
            Employee::class,
            'employee_departments', 
            'department_id',
            'employee_id'
        );
    }
}
