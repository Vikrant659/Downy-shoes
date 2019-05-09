<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    
      protected $dates = ['deleted_at']; 
    protected $fillable = [
        'category_id','name','price','type','size','image',
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function review()
    {
        return $this->hasMany('App\Review');
    }
   
}
