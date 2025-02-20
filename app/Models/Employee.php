<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'salary_type',
        'rate',
        'fixed_salary',
        'hire_date',
        'status',
    ];

    public function salaries(): HasMany
    {
        return $this->hasMany(Salary::class);
    }

    public function projectsEmployees(): HasMany
    {
        return $this->hasMany(ProjectEmployee::class);
    }
}
