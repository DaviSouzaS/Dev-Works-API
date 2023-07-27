<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Technology extends Model
{
    use HasFactory;

    protected $table = 'technology';

    protected $fillable = [
        'name'
    ];

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }
}
