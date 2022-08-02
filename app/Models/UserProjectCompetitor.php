<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProjectCompetitor extends Model
{
    use HasFactory;

    protected $table = 'user_project_competitors';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id',
        'competitor_id'
    ];

    public function project()
    {
        return $this->hasOne(UserProjects::class,'id','competitor_id');
    }
}
