<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'country_id', 'city', 'description', 'image'];

    public function countries() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function tours() {
        return $this->hasMany(related: Tour::class);
    }
}
