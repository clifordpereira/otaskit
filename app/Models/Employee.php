<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'mobile_no', 'department', 'status'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
