<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Assignment extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = [
        'name',
        'notes',
        'exam_date',
        'semester_id',
        'teacher_id',
        'subject_id',
        
    ];

    public function semester()
    {
       return  $this->belongsTo(Semester::class,'semester_id');
    }

    public function teacher()
    {
       return  $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function subject()
    {
       return  $this->belongsTo(Subject::class,'subject_id');
    }

}
