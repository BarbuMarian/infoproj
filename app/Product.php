<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'pic'
    ];
    public $timestamps = false;

    public function orders()
    {
       return $this->belongToMany('App\Order')->withPivot(['product_amount']);
       //return $this->belongToMany('App\Order')->withPivot(['product_amount']);
    }


}
