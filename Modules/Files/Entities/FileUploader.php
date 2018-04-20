<?php
/**
 * Created by PhpStorm.
 * User: alexsandro
 * Date: 19.04.18
 * Time: 14:52
 */

namespace Modules\Files\Entities;

use Illuminate\Http\Request;
use Modules\Files\Contracts\Uploader;
use Modules\Files\Entities\File;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;

class FileUploader implements Uploader {

  // путь для сохраняемых файлов
  private $path = "app/public/";
  protected $file;
  protected $uploadFile;
  protected $filename;
  protected $extension;
  protected $uploadInfo;
  protected $manager;
  private $arrFile;

  public function __construct(Request $request, UploadInfo $uploadInfo)
  {
    $this->uploadInfo = $uploadInfo;
    $uploadedFile = $request->file('file');
    if($uploadedFile->isValid())
    {
      $this->manager = new ImageManager();
      $this->uploadFile = $uploadedFile;
      $originalName = $uploadedFile->getClientOriginalName();
      $this->extension = $uploadedFile->getClientOriginalExtension();
      $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($this->extension) - 1);
      $this->filename = $this->sanitize($originalNameWithoutExt);

      // Создание экземпляра модели File
      $this->file = new File;
      $this->file->fileable_id = $request->fileableId;
      $this->file->fileable_type = $request->model;
      $this->file->original_name = $originalName;
    }
    else {
      throw new \Exception('Файла не существует');
    }

  }

  public function upload($typeFile, $name, $resize, $absolute, $width=null, $height=null)
  {
    $allowed_filename = $this->createUniqueFilename($this->filename, $this->extension);
    // Если отмечен флаг resize используем обработку изображений иначе просто перемещаем файл без обработки
    if ($resize) {
      if ($absolute)
        $uploadiconSuccess = $this->resizeAbsolute($this->uploadFile , $allowed_filename, $width, $height, $this->path);
      else
        $uploadiconSuccess = $this->resizeRelative($this->uploadFile , $allowed_filename, $width, $height, $this->path);
      if (!$uploadiconSuccess) {
        throw new \Exception('Ресайз завершился с ошибкой');
      }
      $size = $this->size($uploadiconSuccess);
    }
    else {
      $uploadSuccess = $this->move($this->uploadFile, $allowed_filename);
      if (!$uploadSuccess) {
        throw new \Exception('Перемещение файла завершилось с ошибкой');
      }
      $size = $this->uploadFile->getClientSize();
    }

    // Для WYSIWYG-редактора
    if($this->uploadInfo->filename !== '')
    {
      $this->uploadInfo->filename = $this->uploadInfo->filename.','.'/storage/'.$allowed_filename;
    }
    else {
      $this->uploadInfo->filename = '/storage/'.$allowed_filename;
    }
    // конец установки filename


    // сохранение в базе
    //Начало построения структуры коллекции
    $file = collect();
    $file->put('filename',$allowed_filename);
    $file->put('size',$size);
    if(isset($uploadiconSuccess) && $uploadiconSuccess) {
      $file->put('width',$uploadiconSuccess->width());
      $file->put('height',$uploadiconSuccess->height());
    }
    if($typeFile->config->has('resize')) {
      $resize = $typeFile->config->get('resize');
      foreach ($resize as $item) {
        if($item["name"] === $name) {
          $file->put('resize',$item);
        }
      }
    }
    $this->arrFile[$name] = $file;
    $fileCollect = collect();
    $fileCollect->put('files',$this->arrFile);
    // конец построения структуры коллекции
    $this->file->config = $fileCollect;
    $this->file->type_file_id = $typeFile->id;
    $this->file->save();
    // конец сохранения в базе
    $this->uploadInfo->currentFileId = $this->file->id;
    return true;
  }



  private function sanitize($string, $force_lowercase = true, $anal = false)
  {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
      "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
      "â€”", "â€“", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

    return ($force_lowercase) ?
      (function_exists('mb_strtolower')) ?
        mb_strtolower($clean, 'UTF-8') :
        strtolower($clean) :
      $clean;
  }



  private function createUniqueFilename( $filename, $extension )
  {
    // Generate token for image
    $imageToken = substr(sha1(mt_rand()), 0, 5);
    return $filename . '-' . $imageToken . '.' . $extension;
  }


  private function size( $photo )
  {
    $image = $this->manager->make( $photo );
    $size = $image->filesize();
    return $size;
  }

  private function move( $photo, $filename )
  {
    Storage::putFileAs('public',$photo,$filename);
    return $filename;
  }

  private function resizeAbsolute( $photo, $filename, $width, $height, $path )
  {
    $image = $this->manager->make( $photo )->resize($width,$height)->save(storage_path($this->path) . $filename );
    return $image;
  }

  private function resizeRelative( $photo, $filename, $width, $height, $path )
  {
    $image = $this->manager->make( $photo );
    $image = $image->resize($width,$height,function($constraing) {
      $constraing->aspectRatio();
      $constraing->upsize();
    })->save(storage_path($this->path) . $filename );
    return $image;
  }


}