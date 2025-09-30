<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

        protected $fillable = [
        'country_id',
        'name',
        'abbr',
        'phone_code',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function masjids(): HasMany
    {
        return $this->hasMany(Masjid::class);
    }

    public function mohallahs(): HasMany
    {
        return $this->hasMany(Mohallah::class);
    }

    public function halqahs(): HasMany
    {
        return $this->hasMany(Halqah::class);
    }

    public function markazs(): HasMany
    {
        return $this->hasMany(Markaz::class);
    }

    public function zones(): HasMany
    {
        return $this->hasMany(Zone::class);
    }



}
