<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name',
        'qty',
        'description',
        'isAvailble',
        'category_id',

    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id'::class);
    }
}
