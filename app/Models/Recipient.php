<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Recipient extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function credits(): HasMany
    {
        return $this->hasMany(Credit::class);
    }

    public function payments(): HasManyThrough
    {
        return $this->hasManyThrough(Payment::class, Credit::class);
    }
}
