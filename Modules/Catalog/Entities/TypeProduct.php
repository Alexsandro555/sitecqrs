<?php

namespace Modules\Catalog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\RelationTrait;

class TypeProduct extends Model
{
  use SoftDeletes;

  use RelationTrait;

  protected $fillable = [
    'id',
    'title',
    'sort',
    'tnved_id',
    'category_id',
    'description'
  ];

  protected $dates = ['deleted_at'];

  public function products() {
    return $this->hasMany('Modules\Catalog\Entities\Product');
  }

  public function tnveds() {
    return $this->belongsTo('Modules\Catalog\Entities\Tnved');
  }

  public function producer_type_products() {
    return $this->hasMany('Modules\Catalog\Entities\ProducerTypeProduct');
  }

  public function producers() {
    return $this->belongsToMany('Modules\Catalog\Entities\Producer')->withPivot('id','name_line','sort');
  }

  /*public function files() {
    return $this->morphMany('Leader\UploadFile\Models\File', 'fileable');
  }*/

  public function attributes() {
    return $this->morphToMany('Modules\Catalog\Entities\Attribute', 'attributable');
  }

  public function categories() {
    return $this->belongsTo('Modules\Catalog\Entities\Category');
  }
}
