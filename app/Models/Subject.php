<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ["grade_id","title","slug","user_id"];

    public function grade(){
       return $this->belongsTo(Grade::class,'grade_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
