<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Halqah extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'markaz_id',
    //     'name',
    //     'description',
    // ];

    protected $guarded = [];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function markaz(): BelongsTo
    {
        return $this->belongsTo(Markaz::class);
    }

    public function mohallahs(): HasMany
    {
        return $this->hasMany(Mohallah::class);
    }

    public function masjids(): HasMany
    {
        return $this->hasMany(Masjid::class);
    }


}
