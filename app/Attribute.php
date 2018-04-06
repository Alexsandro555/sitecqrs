<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable = [
    'sort',
    'title',
    'alias',
  ];

  public function products() {
    return $this->belongsToMany('App\Product')->withPivot('value');;
  }

  public function typeProducts() {
    return $this->morphedByMany('App\TypeProduct', 'attributable');
  }

  public function lineProducts() {
    return $this->morphedByMany('App\ProducerTypeProduct', 'attributable');
  }
}
