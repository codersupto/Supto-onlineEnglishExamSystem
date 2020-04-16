<?php

namespace App\Model\Grammar;

use App\Exam;
use App\QuestionSet;
use Illuminate\Database\Eloquent\Model;

class Grammar extends Model
{
    protected $guarded = [];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function set()
    {
        return $this->belongsTo(QuestionSet::class, 'question_set_id');
    }
}