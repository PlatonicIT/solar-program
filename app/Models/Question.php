<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];
    public function question_options(){
        return $this->hasMany(QuestionOption::class);
    }
}
