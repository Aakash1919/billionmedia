<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProjects extends Model
{
    protected $table = 'user_projects';
    protected $primaryKey = 'id';

    protected $fillable = [
        'userid',
        'website_name',	
        'website_url',	
        'location',	
        'previous_keywords',	
        'new_keywords',	
        'status'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
