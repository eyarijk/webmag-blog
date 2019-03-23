<?php

namespace App\Service;

use Symfony\Component\Filesystem\Filesystem;

class ImageRemove
{
    /**
     * @var string
     */
    private $imagesDirectory;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * ImageRemove constructor.
     * @param string $imagesDirectory
     * @param Filesystem $filesystem
     */
    public function __construct(string $imagesDirectory, Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
        $this->imagesDirectory = rtrim($imagesDirectory, '/') . '/';
    }

    /**
     * @param string $filename
     */
    public function remove(string $filename): void
    {
        $path = $this->imagesDirectory . $filename;

        $this->filesystem->remove($path);
    }
}
