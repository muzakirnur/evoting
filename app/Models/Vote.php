<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function schedule():BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
