<?php

namespace App\Models;

use App\Enums\ClassKnowledge;
use App\Enums\ClassType;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use GeneratesUuid;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getClassNameAttribute()
    {
        return ClassType::getKey($this->class);
    }

    public function getKnowledgeTextAttribute()
    {
        return ClassKnowledge::getKey($this->knowledge);
    }
}
