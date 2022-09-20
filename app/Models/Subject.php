<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function getGrade(){
       return $this->belongsTo(Grade::class,'grade_id');
    }
    public function getUser(){
        return $this->belongsTo(User::class,'user_id');
    }
}
