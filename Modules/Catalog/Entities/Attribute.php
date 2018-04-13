<?php

namespace Modules\Catalog\Entities;

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
    return $this->belongsToMany('Modules\Catalog\Entities\Product')->withPivot('value');;
  }

  public function typeProducts() {
    return $this->morphedByMany('Modules\Catalog\Entities\TypeProduct', 'attributable');
  }

  public function lineProducts() {
    return $this->morphedByMany('Modules\Catalog\Entities\ProducerTypeProduct', 'attributable');
  }
}
