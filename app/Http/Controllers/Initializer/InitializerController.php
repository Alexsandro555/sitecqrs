<?php

namespace App\Http\Controllers\Initializer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Builder;

class InitializerController extends Controller
{
    public function fields(Builder $builder, $name) {
      $tableName = $name.'s';
      $columns = Schema::getColumnListing($tableName);
      $arrFields = [];
      foreach ($columns as $column) {
        $modelName = ucfirst($tableName);
        $arr['name'] = $column;
        $arr['type'] = Schema::getColumnType($name,strtolower($column));
        $arr['form'] = true;

        $arrFields[] = $arr;
      }
      return $arrFields;
    }
}
