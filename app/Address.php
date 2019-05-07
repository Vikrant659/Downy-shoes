<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'user_id','address1','address2','mobile_number','landmark', 'city', 'state','zip_code'
    ];
}
