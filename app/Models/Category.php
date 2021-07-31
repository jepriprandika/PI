<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug','parent_id'];

    public function chlids () {
        return $this->hasMany('App\Models\Category','parent_id');
    }

    public function parent () {
        return $this->belongsTo('App\Models\Category','parent_id');
    }

    public function services () {
        return $this->belongsToMany('App\Models\Service', 'service_categories');
    }


    public function scopeParentCategories($query)
    {
        return $query->where('parent_id', 0);
    }
}
