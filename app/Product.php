<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

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
    return $this->belongsTo('App\TypeProduct');
  }


  public function attributes() {
    return $this->belongsToMany('App\Attribute')->withPivot('value');
  }

  /**
   * Получить все изображения продукта
   */
  public function files() {
    return $this->morphMany('Leader\UploadFile\Models\File', 'fileable');
  }

  public function producer_type_product() {
    return $this->belongsTo('App\ProducerTypeProduct');
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
