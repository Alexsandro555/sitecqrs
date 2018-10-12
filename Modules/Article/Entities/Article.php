<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Files\Entities\File;
use App\Traits\RelationTrait;
use App\Traits\TableColumnsTrait;

class Article extends Model
{
  use SoftDeletes;
  use RelationTrait;
  use TableColumnsTrait;

  protected $dates = ['deleted_at'];

  public $form = [
    'id' => [
      'enabled' => true
    ],
    'title' => [
      'enabled' => true,
      'validations' => [
        'required' => true,
        'max' => 255
      ]
    ],
    'url_key' => [
      'enabled' => true,
      'validations' => [
        'required' => true,
        'max' => 255,
        'regex' => '^[a-z0-9-]+$',
      ]
    ],
    'content' => [
      'enabled' => true
    ],
    'news' => [
      'enabled' => true
    ]
  ];

  protected $guarded = [];

  public function setTitleAttribute($value) {
    $this->attributes['title'] = strip_tags($value);
  }

  public function files() {
    return $this->morphMany(File::class, 'fileable');
  }
}
