<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\User;



class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_id',
    ];

    

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }
}
