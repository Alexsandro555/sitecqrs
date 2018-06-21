<?php

namespace App\Http\Controllers\Initializer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class InitializerController extends Controller
{
    public function fields(Builder $builder, $name) {
      $collectionResult = collect([]);
      if(Cache::has($name)) {
        $collectionResult = Cache::get($name);
      }
      else
      {
        $model = resolve($name);
        $collectionTableColumns = $model->getColumns($name);
        if($model->form && count($model->form)>0) {
          foreach($collectionTableColumns as $key => $item) {
            if(array_key_exists($key,$model->form)) {
              if($model->form[$key]['enabled']) {
                $arrResult[$key] = $collectionTableColumns->get($key);
                $collection = collect([]);
                foreach ($item as $itemKey => $valueItem) {
                  $collection->put($itemKey, $valueItem);
                  if(array_key_exists('validations',$model->form[$key])) {
                    $collection->put('validations', $model->form[$key]['validations']);
                  }
                }
                $collectionResult->put($key,$collection);
              }
            }
          }
          $relationships = $model->getRelationships();
          foreach ($relationships as $key => $relationship) {
            $arrKeys = [];
            if($relationship["type"] == 'BelongsTo') {
              $model = new $relationship["model"];
              $collection = collect([]);
              $collection->put('type','selectbox');
              $collection->put('title',$model->name?$model->name:'title');
              $collection->put('label', \DB::select(\DB::raw("SELECT TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_NAME = '".$relationship["table"]."'"))[0]->TABLE_COMMENT);
              $modelRelationship = new $relationship["model"];
              $subRelationships = $modelRelationship->getRelationships();
              foreach($subRelationships as $keyRel => $subRelationship) {
                if($subRelationship["type"] == 'HasMany' || $subRelationship["type"] == 'BelongsToMany') {
                  $arrKeys[] = $keyRel;
                }
              }
              $collection->put('items',$relationship["model"]::with($arrKeys)->get());
              $collection->put('relations',$arrKeys);
              $collectionResult->put($key,$collection);
            }
          }
        }
        Cache::add($name,$collectionResult,now()->addSeconds(10000000));
      }

      return $collectionResult;
    }
}
