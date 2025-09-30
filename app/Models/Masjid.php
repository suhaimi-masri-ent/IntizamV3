<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\HasMany;


class Masjid extends Model
{
    //
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'type',
    //     'management',
    //     'city_id',        
    //     'mohallah_id',        
    // ];

    protected $guarded = [];

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

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }



}
