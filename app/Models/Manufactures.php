<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manufactures extends Model
{
    use HasFactory;

    protected $fillable = [
        'cars_id', 'name', 'address'
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Cars::class);
    }
}
