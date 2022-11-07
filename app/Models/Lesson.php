<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['grade_id','subject_id','title','excerpt_title','slug','description','excerpt','user_id'];

    public function getGrade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
    public function getSubject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
    public function getUser(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getLessonImages(){
        return $this->hasMany(Photo::class,'lesson_id');
    }
}
