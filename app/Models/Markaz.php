<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Markaz extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'state_id',
    //     'abbr',
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

    public function mohallahs(): HasMany
    {
        return $this->hasMany(Mohallah::class);
    }

    public function halqahs(): HasMany
    {
        return $this->hasMany(Halqah::class);
    }    

}
