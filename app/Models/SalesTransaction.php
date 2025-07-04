<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalesTransaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class);
    }
}
