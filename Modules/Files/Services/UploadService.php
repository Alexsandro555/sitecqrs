<?php
/**
 * Created by PhpStorm.
 * User: alexsandro
 * Date: 18.04.18
 * Time: 14:20
 */

namespace Modules\Files\Services;

use Leader\UploadFile\Models\UploadInfo;
use Modules\Files\Entities\TypeFile;

class UploadService {
  public function upload(UploadInfo $info) {
    $typeFile = null;
    if($info->typefile) {
      $typeFile = TypeFile::where('name',$info->typefile)->first();
    }
    else {
      // тип файла по-умолчанию
      $typeFile = TypeFile::where('name','file')->first();
    }
    if(!$typeFile) {
      throw new \App\Exceptions\NotFoundTypeFileException('Не найден тип файла с заданным именем');
    }
  }
}