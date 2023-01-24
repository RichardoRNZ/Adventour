<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'country_id', 'hotel_id', 'restaurant_id', 'description', 'price', 'image'];

    public function tourdetails() {
        return $this->hasMany(Tourdetail::class,'tour_id','id');
    }

    public function countries() {
        return $this->belongsTo(Country::class, 'country_id','id');
    }

    public function hotels() {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    public function restaurants() {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    public function transactions() {
        return $this->hasMany(related: Transaction::class);
    }
}
