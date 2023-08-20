<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_Project_User extends Model
{
    use HasFactory;

    protected $table = 'comment_project_user';

    protected $fillable = [
        'comment'
    ];
}
