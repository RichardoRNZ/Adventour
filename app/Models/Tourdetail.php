<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourdetail extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'tour_id', 'description', 'image'];
    protected $table = 'tourdetails';
    public function tours() {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }

}
