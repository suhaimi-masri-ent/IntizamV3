<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tafakut extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pencadang1(): BelongsTo
    {
        return $this->belongsTo(Ahbab::class, 'pencadang1_id');
    }

    public function pencadang2(): BelongsTo
    {
        return $this->belongsTo(Ahbab::class, 'pencadang2_id');
    }

    public function azam(): BelongsTo
    {
        return $this->belongsTo(Azam::class);
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
