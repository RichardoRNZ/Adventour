<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $fillable = ['header_id','tour_id', 'quantity', 'price'];
    public static function getLatestHeaderTransaction()
    {
        $transaction = Transactionheader::latest()->first();
        return $transaction;
    }
}
