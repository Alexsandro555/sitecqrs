<?php
/**
 * Created by PhpStorm.
 * User: alexsandro
 * Date: 26.04.18
 * Time: 12:08
 */

namespace Modules\Files\Classes;

use Intervention\Image\ImageManager;
use Modules\Files\Entities\File;

class FileUpdater extends AbstractFileUploader
{
  // путь для сохраняемых файлов
  protected $path = "app/public/";
  protected $manager;
  protected $typeFile;
  protected $file;

  public function __construct($file, $typeFile)
  {
    $this->file = $file;
    $this->typeFile = $typeFile;
    $this->manager = new ImageManager();
  }

  public function addFormat($original, $name, $resize, $absolute, $width, $height) {
    $file = $this->manager->make(storage_path($this->path).$original);
    $pos = strripos($original,'.');
    $originalNameWithoutExt = substr($original, 0, $pos);
    $extension = substr($original,$pos+1,strlen($original)-1);
    $filename = $this->sanitize($originalNameWithoutExt);
    // вызываем метод без вызова file_exists, потому что оригинальный файл по-любому существует в storage
    $allowed_filename = $this->createUniqueFilename($filename, $extension);
    if ($resize) {
      if ($absolute) {
        $uploadiconSuccess = $this->resizeAbsolute($file, $allowed_filename, $width, $height, $this->path);
      } else {
        $uploadiconSuccess = $this->resizeRelative($file, $allowed_filename, $width, $height, $this->path);
      }
      if (!$uploadiconSuccess) {
        return false;
      }
      $size = $this->size($uploadiconSuccess);
    }
    else {
      return false;
    }

    // сохранение в базе
    //Начало построения структуры коллекции
    $arrFile['filename'] = $allowed_filename;
    $arrFile['size'] = $size;
    if(isset($uploadiconSuccess) && $uploadiconSuccess) {
      $arrFile['width'] = $uploadiconSuccess->width();
      $arrFile['height'] = $uploadiconSuccess->height();
    }
    if($this->typeFile->config->has('resize')) {
      $resize = $this->typeFile->config->get('resize');
      foreach ($resize as $item) {
        if($item["name"] === $name) {
          $arrFile['resize'] = $item;
        }
      }
    }

    $this->arrFile[$name] = $arrFile;
    $files = $this->file->config->get('files');
    $files[$name] = $arrFile;
    $fileCollect = collect();
    $fileCollect->put('files',$files);
    $this->file->config = $fileCollect;
    $this->file->save();
    return true;
  }
}