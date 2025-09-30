<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Azam extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    // protected function casts(): array
    // {
    //     return [
    //         'cuti' => 'boolean',
    //         'permission' => 'boolean',
    //         'amer' => 'boolean',
    //         'pengendali' => 'boolean',
    //         'tertib' => 'boolean',
    //     ];
    // }   

    // protected $casts = [
    //         'cuti' => 'boolean',
    //         'permission' => 'boolean',
    //         'amer' => 'boolean',
    //         'pengendali' => 'boolean',
    //         'tertib' => 'boolean',
    // ];

    // protected $fillable = [
    //     'mohallah_id',
    //     'ahbab_id',
    //     'checkin',
    //     'duration',
    //     'expense',
    //     'last1y',
    //     'last2y',
    //     'description',
    // ];

    public function amalan(): BelongsTo
    {
        return $this->belongsTo(Amalan::class);
    }

    public function ahbab(): BelongsTo
    {
        return $this->belongsTo(Ahbab::class);
    }    

    public function markaz(): BelongsTo
    {
        return $this->belongsTo(Markaz::class);
    }  

    public function halqah(): BelongsTo
    {
        return $this->belongsTo(Halqah::class);
    }  
    
    public function mohallah(): BelongsTo
    {
        return $this->belongsTo(Mohallah::class);
    }      

    public function ahbabs(): HasMany
    {
        return $this->hasMany(Ahbab::class);
    }

}
