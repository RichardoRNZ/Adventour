<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactionheader extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'transaction_timestamp'];

    public function transactions() {
        return $this->belongsTo(Transaction::class, 'transactionheader_id', 'id'); 
    }
}
