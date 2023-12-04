<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function schedule():BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function calon():BelongsTo
    {
        return $this->belongsTo(Calon::class);
    }
}
