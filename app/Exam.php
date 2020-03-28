<?php

namespace App;

use App\Model\Grammar\GrammarQuestion;
use App\Model\Grammar\StudentGrammarQuestion;
use App\Model\Writing\Dialog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Grammars\Grammar;

class Exam extends Model
{
    protected $fillable = [
        'name', 'slug', 'user_id', 'status'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function grammarQuestions()
    {
        return $this->hasMany(GrammarQuestion::class);
    }

    public function sets()
    {
        return $this->belongsToMany(QuestionSet::class, 'exam_question_set', 'exam_id');
    }
    public function students()
    {
        return $this->hasMany(StudentGrammarQuestion::class);
    }

    // Dialog
    public function dialogs()
    {
        return $this->hasMany(Dialog::class);
    }
}
