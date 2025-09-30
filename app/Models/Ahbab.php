<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ahbab extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function marriage(): BelongsTo
    {
        return $this->belongsTo(Marriage::class);
    }

     public function occupation(): BelongsTo
    {
        return $this->belongsTo(Occupation::class);
    }   

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

     public function mohallah(): BelongsTo
    {
        return $this->belongsTo(Mohallah::class);
    }

    public function halqah(): BelongsTo
    {
        return $this->belongsTo(Halqah::class);
    }

    public function markaz(): BelongsTo
    {
        return $this->belongsTo(Markaz::class);
    }

    public function tafakuts(): HasMany
    {
        return $this->hasMany(Tafakut::class);
    }    
   
    public function azams(): HasMany
    {
        return $this->hasMany(Azam::class);
    }    


    public function amalans(): HasMany
    {
        return $this->hasMany(Amalan::class);
    }

}
