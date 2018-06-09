<?php

namespace Modules\Catalog\Entities;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class ProducerTypeProduct extends Model
{
  protected $table = 'producer_type_product';

  public $name = 'name_line';

  //use SoftDeletes;

  protected $fillable = [
    'id',
    'name_line',
    'sort',
    'producer_id',
    'type_product_id'
  ];

  protected $guarded = [];

  public function type_product() {
    return $this->belongsTo('Modules\Catalog\Entities\TypeProduct');
  }

  public function producer() {
    return $this->belongsTo('Modules\Catalog\Entities\Producer');
  }

  public function products() {
    return $this->hasMany(Product::class);
  }

  /**
   * Получить все изображения категории
   */
  public function files() {
    return $this->morphMany('Modules\Files\Entities\File', 'fileable');
  }

  public function attributes() {
    return $this->morphToMany('Modules\Catalog\Entities\Attribute', 'attributable');
  }
}
