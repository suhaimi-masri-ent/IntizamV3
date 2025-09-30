<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\HasMany;

class Khidmat extends Model
{
    use HasFactory;

    // protected $guareded = [];
    protected $guarded = [];


    // public function markaz(): BelongsTo
    // {
    //     return $this->belongsTo(Markaz::class);
    // }

    public function wala(): BelongsTo
    {
        return $this->belongsTo(Wala::class);
    }


}
