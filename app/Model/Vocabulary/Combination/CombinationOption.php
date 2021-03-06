<?php

namespace App\Model\Vocabulary\Combination;

use App\Exam;
use App\Set;
use Illuminate\Database\Eloquent\Model;

class CombinationOption extends Model
{
    protected $guarded = [];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function set()
    {
        return $this->belongsTo(Set::class);
    }
    public function combination()
    {
        return $this->hasOne(Combination::class);
    }
}
