<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Item extends Model
{
    use softDeletes;
    protected $fillable = ['codeno','name', 'photo','price','brand_id','subcategory_id'];

    public function subcategory()
    {
    	return $this->belongsTo('App\Subcategory');
    }

    public function brand()
    {
    	return $this->belongsTo('App\Brand');
    }

    public function orders()
    {
    	return $this->belongsToMany('App\Order');
    }
}
