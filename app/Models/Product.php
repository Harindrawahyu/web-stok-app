<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class);
    }

    public function stockReports()
    {
        return $this->hasMany(StockReport::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
