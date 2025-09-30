<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Amal extends Model
{
    use HasFactory;

    // protected $guareded = [];
    protected $guarded = [];

    public function amalan(): BelongsTo
    {
        return $this->belongsTo(Amalan::class);
    }

    // public function ahbabs(): HasMany
    // {
    //     return $this->hasMany(Ahbab::class);
    // }

}
