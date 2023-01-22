<?php


namespace App\Services;


use Illuminate\Support\Facades\Storage;

class FileService
{
    public static function uploadFile($file, $defaultFile = 'no-foto.jpg', $folder = '/')
    {
        //Сохранение файла в /storage/app/public
        if ($file !== null) {
            $path = $file->store($folder, 'public');
        } else {
           $path = $defaultFile;
       }
        return $path;
    }
//
//    public static function deleteFile($file, $folder = 'public/', $defaultFile = 'no-foto.jpg')
//    {
//        $path = $folder . $file;
//        if (Storage::exists($path) && ($file != $defaultFile)) {
//            Storage::delete($path);
//        }
//    }
//

  //  public static function uploadFile($file, $default = "no-foto.jpg", $folder = '/')
  //  {
  //      if ($file !== null) {
  //          $full_path = $file->store($folder, 'public');
  //          copy($_SERVER['DOCUMENT_ROOT'] . '/storage/app/public/' . $full_path, $_SERVER['DOCUMENT_ROOT'] . '/public/storage/' . $full_path);
  //          $path = explode('/', $full_path);
   //         return $path[1];
   //     }
  //      $path = $default;
   //     return $path;
  //  }

    public static function updateFile($file, $order, $defaultFile = 'no-foto.jpg', $folder = '/', $public = 'public/')
    {
        $path = self::uploadFile($file, $defaultFile, $folder) ?? $order;
        if ($file != null) {
            self::deleteFile($order, $public . $folder, $defaultFile);
        }
        return $path;
    }

    public static function deleteFile($file, $folder = 'public/', $defaultFile = 'no-foto.jpg')
    {
        $path = $folder . $defaultFile;
        if (Storage::exists($path)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . '/public/storage/' . $file);
            Storage::delete($path);
        }
    }
}
