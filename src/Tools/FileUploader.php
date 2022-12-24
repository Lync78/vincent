<?php


namespace App\Tools;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{

    private function Upload(UploadedFile $file, string $parameters)
    {
        $file->move($parameters, $file->getClientOriginalName());
    }


}