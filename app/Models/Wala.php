<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wala extends Model
{
    use HasFactory;

    // protected $guareded = [];
    protected $guarded = [];


    public function khidmat(): BelongsTo
    {
        return $this->belongsTo(Khidmat::class);
    }

    public function markaz(): BelongsTo
    {
        return $this->belongsTo(Markaz::class);
    }

    public function ahbab(): BelongsTo
    {
        return $this->BelongsTo(Ahbab::class);
    }

    // public function ahbabs(): HasMany
    // {
    //     return $this->hasMany(Ahbab::class);
    // }

    public function khidmats(): HasMany
    {
        return $this->hasMany(Khidmat::class);
    }


}
