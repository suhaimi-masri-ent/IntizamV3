<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\HasMany;

class Amalan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function amal(): BelongsTo
    {
        return $this->belongsTo(Amal::class);
    }

    public function ahbab(): BelongsTo
    {
        return $this->belongsTo(Ahbab::class);
    }    

    public function mohallah(): BelongsTo
    {
        return $this->belongsTo(Mohallah::class);
    }    



    // public function ahbabs(): HasMany
    // {
    //     return $this->hasMany(Ahbab::class);
    // }
}
