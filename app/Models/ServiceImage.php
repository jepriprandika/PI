<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
     protected $fillable = [
         'service_id',
         'path',
     ];

     public function service()
     {
        return $this->belongsTo('App\Models\Service');
     }
 }
