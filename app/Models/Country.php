<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code'];

    public function tours() {
        return $this->hasMany(related: Tour::class);
    }

    public function hotels() {
        return $this->hasMany(related: Hotel::class);
    }

    public function restaurants() {
        return $this->hasMany(related: Restaurant::class);
    }
}
