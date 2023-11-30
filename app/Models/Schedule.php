<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function calon():HasMany
    {
        return $this->hasMany(Calon::class);
    }

    public function vote():HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function result():HasOne
    {
        return $this->hasOne(Result::class);
    }

    protected $richTextFields = ['visi_misi'];
}
