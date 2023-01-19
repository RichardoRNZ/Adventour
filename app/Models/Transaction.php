<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['transactionheader_id','tour_id', 'quantity', 'price', 'transaction_timestamp'];

    public function tours() {
        return $this->belongsTo(Tour::class, 'tour_id', 'id'); 
    }

    public function transactioheaders() {
        return $this->hasMany(Transactionheader::class); 
    }
}
