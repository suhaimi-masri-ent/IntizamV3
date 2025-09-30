<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Occupation extends Model
{
    use HasFactory;

    protected $fillable = [
        'occupation_name',
    ];

    public function ahbab(): BelongsTo
    {
        return $this->belongsTo(Ahbab::class);
    }

    
    
}
