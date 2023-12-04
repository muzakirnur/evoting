<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Calon extends Model
{
    use HasFactory;
    use HasRichText;

    protected $richTextFields = [
        'visi_misi',
    ];

    protected $fillable = [
        'visi_misi',
        'schedule_id',
        'nomer_urut',
        'nama',
        'foto',
        'alamat',
        'tempat_lahir',
        'pendidikan',
        'tanggal_lahir',
        'vote'
    ];

    public function schedule():BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function result():HasMany
    {
        return $this->hasMany(Result::class);
    }

}
