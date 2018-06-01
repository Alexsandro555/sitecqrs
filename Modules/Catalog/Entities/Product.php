<?php

namespace Modules\Catalog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $form = [
    'id' => [
      'primary' => true,
      'type' => 'text',
      'hidden' => true
    ],
    'title' => [
      'type' => 'text',
      'validation' => 'titleRules',
    ],
    'vendor' => [
      'type' => 'text',
    ],
    'IEC' => [
      'type' => 'text',
    ],
    'qty' => [
      'type' => 'number',
      'validation' => 'requiredRules'
    ],
    'sort' => [
      'type' => 'number',
    ],
    'price' => [
      'type' => 'decimal',
      'validation' => 'priceRules'
    ],
    'description' => [
      'type' => 'textarea'
    ],
    'onsale' => [
      'type' => 'checkbox'
    ],
    'special' => [
      'type' => 'checkbox'
    ],
    'need_order' => [
      'type' => 'checkbox'
    ],
    'active' => [
      'type' => 'checkbox'
    ],
    'type_product_id' => [
      'type' => 'select-box'
    ],
    'producer_id' => [
      'type' => 'select-box'
    ],
    'producer_type_product_id' => [
      'type' => 'select-box'
    ]
  ];

  protected $fillable = [
    'id',
    'title',
    'url_key',
    'price',
    'description',
    'qty',
    'active',
    'sort',
    'onsale',
    'special',
    'need_order',
    'type_product_id',
    'producer_type_product_id',
    'producer_id',
    'vendor',
    'IEC'
  ];


  public function type_product() {
    return $this->belongsTo('Modules\Catalog\Entities\TypeProduct');
  }


  public function attributes() {
    return $this->belongsToMany('Modules\Catalog\Entities\Attribute')->withPivot('value');
  }

  /**
   * Получить все изображения продукта
   */
  public function files() {
    return $this->morphMany('Modules\Files\Entities\File', 'fileable');
  }

  public function producer_type_product() {
    return $this->belongsTo('Modules\Catalog\Entities\ProducerTypeProduct');
  }

  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = strip_tags($value);
  }

  public function setPriceAttribute($value)
  {
    $this->attributes['price'] = strip_tags($value);
  }

  public function setArticleAttribute($value)
  {
    $this->attributes['article'] = strip_tags($value);
  }

  public function setIECAttribute($value)
  {
    $this->attributes['IEC'] = strip_tags($value);
  }
}
