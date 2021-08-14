<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Subcategory extends Model
{
    use softDeletes;
    protected $fillable = ['name', 'category_id'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
