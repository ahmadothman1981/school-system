<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subject;
use App\Models\Assignment;




class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'semester');
    }

    public function  subjects()
    {
      return $this->hasMany(Subject::class,'semester_id');
    }

    public function  assignment()
  {
    return $this->hasMany(Assignment::class,'semester_id');
  }
}
