<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Assignment;



class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        
    ];

  public function  subjects()
  {
    return $this->hasMany(Subject::class,'teacher_id');
  }

  public function  assignment()
  {
    return $this->hasMany(Assignment::class,'teacher_id');
  }

  
}
