<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marriage extends Model
{
    use HasFactory;

    protected $fillable = [
        'marriage_status',
    ];

    public function ahbab(): BelongsTo
    {
        return $this->belongsTo(Ahbab::class);
    }

}
