<?php

namespace Modules\Catalog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\RelationTrait;

class Product extends Model
{
  use SoftDeletes;

  use RelationTrait;

  protected $dates = ['deleted_at'];

  public $form = ['id','title','vendor','IEC','qty','sort','price','description','onsale','special','need_order','active','type_product','producer_type_product','producer'];

  public $validations = [
    'title' => [
      'required' => true,
      'max' => 255,
    ],
    'vendor' => [
      'max' => 12,
    ],
    'IEC' => [
      'max' => 12,
    ],
    'price' => [
      'required' => true,
      'regex' => '^[0-9].*$',
      'max' => 12
    ],
    'qty' => [
      'required' => true,
      'regex' => '^[0-9].*$',
    ],
    'sort' => [
      'required' => true,
      'regex' => '^[0-9].*$',
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

  public function producer() {
    return $this->belongsTo('Modules\Catalog\Entities\Producer');
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
