<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}