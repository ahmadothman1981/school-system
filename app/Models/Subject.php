<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Semester;



class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_id',
        'semester_id',
    ];

    public function teachers()
    {
       return  $this->belongsTo(Teacher::class);
    }

    public function semesters()
    {
       return  $this->belongsTo(Semester::class,'semester_id');
    }
    
}
