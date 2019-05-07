<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    protected $dates = ['deleted_at'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
 
}
