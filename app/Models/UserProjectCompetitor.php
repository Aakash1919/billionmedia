<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProjectCompetitor extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->hasOne(UserProjects::class,'id','competitor_id');
    }
}
