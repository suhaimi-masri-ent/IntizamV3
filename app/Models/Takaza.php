<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Takaza extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mohallah(): BelongsTo
    {
        return $this->belongsTo(Mohallah::class);
    }

    public function amal(): BelongsTo
    {
        return $this->belongsTo(Amal::class);
    }

    public function tafakuts(): HasMany
    {
        return $this->hasMany(Tafakut::class);
    }    //
}
