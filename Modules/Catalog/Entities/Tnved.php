<?php

namespace Modules\Catalog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tnved extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable = ['title','service','active'];

  public function type_products()
  {
    return $this->hasMany('Modules\Catalog\Entities\TypeProduct');
  }
}
