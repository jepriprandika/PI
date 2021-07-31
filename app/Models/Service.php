<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable =[
        'parent_id',
        'user_id',
        'sku',
        'name',
        'slug',
        'price',
        'short_description',
        'description',
        'status',
    ];

    public function user ()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\category', 'service_categories');
    }

     public function variants()
    {
        return $this->hasMany('App\Models\service', 'parent_id')->orderBy('price', 'ASC');
    }

   public function parent()
    {
        return $this->belongsTo('App\Models\service', 'parent_id');
    }

   public function serviceImages()
    {
       return $this->hasMany('App\Models\ServiceImage');
    }

    public static function statuses()
    {
        return[
            0 => 'draft',
            1 => 'active',
            2 => 'inactive',       
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1)
                ->where('parent_id', NULL)
                ->orderBy('created_at', 'DESC');
    }

    function price_label()
    {
        return ($this->variants->count() > 0) ? $this->variants->first()->price : $this->price;
    }

    public function configurable()
    {
        return $this->type == 'configurable';
    }

    public function simple()
    {
        return $this->type == 'simple';
    }
}
