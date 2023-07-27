<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function technologies(): HasMany {
        return $this->hasMany(Technology::class);
    }

    public function comments(): HasMany {
        return $this-> hasMany(Comment_Project_User::class);
    }
}
