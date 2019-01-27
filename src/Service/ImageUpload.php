<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUpload
{
    /**
     * @var string
     */
    private $imagesDirectory;

    /**
     * ImageUpload constructor.
     * @param string $imagesDirectory
     */
    public function __construct(string $imagesDirectory)
    {
        $this->imagesDirectory = $imagesDirectory;
    }

    /**
     * @param UploadedFile $uploadedImage
     * @return string
     */
    public function upload(UploadedFile $uploadedImage): string
    {
        $fileName = md5(uniqid('images', true)) . '.' . $uploadedImage->guessExtension();

        $uploadedImage->move(
            $this->imagesDirectory,
            $fileName
        );

        return $fileName;
    }
}
