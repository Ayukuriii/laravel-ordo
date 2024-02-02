<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'price', 'year_produced'
    ];

    public function manufacturer(): HasOne
    {
        return $this->hasOne(Manufacture::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
