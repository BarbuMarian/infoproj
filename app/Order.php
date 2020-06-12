<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'phone', 'address',
    ];
    public $timestamps = false;

    public function products()
    {
      return $this->belongToMany('App\Product')->withPivot(['product_amount']);
     // return $this->belongToMany(App\Product)->withPivot(['product_amount']);
    }
}
