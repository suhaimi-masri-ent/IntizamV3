<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id',
        'abbr'
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function masjids(): HasMany
    {
        return $this->hasMany(Masjid::class);
    }    

}