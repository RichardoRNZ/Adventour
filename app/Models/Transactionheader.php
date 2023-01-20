<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactionheader extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'transaction_date','transaction_id'];

    public function transactions() {
        return $this->belongsTo(Transaction::class, 'transactionheader_id', 'id');
    }
    public static function getLatestTransaction()
    {
        $transaction = Transaction::latest()->first();
        return $transaction;
    }
}
