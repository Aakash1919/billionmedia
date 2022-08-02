<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProjectKeyword extends Model
{ 
    use HasFactory;

    protected $table = 'user_project_keywords';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id',
        'keyword',
        'previous_position',
        'current_position',
        'stats',
        'status',
    ];
}
