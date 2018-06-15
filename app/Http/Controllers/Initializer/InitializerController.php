<?php

namespace App\Http\Controllers\Initializer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\File;
use Mockery\Exception;

class InitializerController extends Controller
{
    public function fields(Builder $builder, $name) {
      $arrResult = [];
      $tableName = $name.'s';
      $columns = Schema::getColumnListing($tableName);
      if($columns) {
        $primaryKey = \DB::select(\DB::raw("SELECT k.column_name FROM information_schema.table_constraints t JOIN information_schema.key_column_usage k USING(constraint_name, table_schema, table_name) WHERE t.constraint_type='PRIMARY KEY' AND t.table_schema=schema() AND t.table_name='".$tableName."'"))[0]->column_name;
        foreach ($columns as $column) {
          $arr=[];
          $arr['type'] = Schema::getColumnType($tableName,$column);
          $arr['label'] = \DB::select(\DB::raw("SELECT COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_NAME = '".$tableName."' AND COLUMN_NAME='".$column."'"))[0]->COLUMN_COMMENT;
          if($column === $primaryKey) {
            $arr['primary'] = true;
          }
          $arrResult[$column] = $arr;
        }
      }
      else {
        throw new Exception("Не могу получить данные из таблицы ".$tableName);
      }


      $directories = \Illuminate\Support\Facades\File::directories(base_path().'/Modules');
      $form = [];
      foreach ($directories as $directory) {
        $dirModule = substr($directory, strripos($directory, '/')+1);
        $namespace = "Modules\\".$dirModule."\\Entities\\";
        if(class_exists($namespace.ucfirst($name))) {
          $modelName = $namespace.ucfirst($name);
          $model = new $modelName;
          if($model->validations && count($model->validations)>0) {
            foreach($arrResult as $key => $item) {
              if(array_key_exists($key,$model->validations)) {
                $arrResult[$key]['validations'] = $model->validations[$key];
              }
            }
          }
          $form = $model->form;
          $relationships = $model->getRelationships();
          foreach ($relationships as $key => $relationship) {
            $arr = [];
            $arrKeys = [];
            if($relationship["type"] == 'BelongsTo') {
              $model = new $relationship["model"];
              $arr['type'] = 'selectbox';
              $arr['title'] = $model->name?$model->name:'title';
              $arr['label'] = \DB::select(\DB::raw("SELECT TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_NAME = '".$relationship["table"]."'"))[0]->TABLE_COMMENT;
              $modelRelationship = new $relationship["model"];
              $subRelationships = $modelRelationship->getRelationships();
              foreach($subRelationships as $keyRel => $subRelationship) {
                if($subRelationship["type"] == 'HasMany' || $subRelationship["type"] == 'BelongsToMany') {
                  $arrKeys[] = $keyRel;
                }
              }
              $arr['items'] = $relationship["model"]::with($arrKeys)->get();
              $arr['relations'] = $arrKeys;
              //$arr['items'] = $relationship["model"]::all();
              $arrResult[$key] = $arr;
            }
          }
        }
      }
      $filteredResult = [];
      foreach ($form as $item) {
        if(array_key_exists($item, $arrResult)) {
          $filteredResult[$item] = $arrResult[$item];
        }
      }
      return $filteredResult;
    }
}
