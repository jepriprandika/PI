<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
   protected $fillable = [
        'order_id',
        'service_id',
        'qty',
        'base_price',
        'base_total',
        'sub_total',
        'sku',
        'name',
    ];

    /**
     * Define relationship with the Servic
     *
     * @return void
     */
    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

}