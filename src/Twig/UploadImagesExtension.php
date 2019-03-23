<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class UploadImagesExtension extends AbstractExtension
{
    /**
     * @var string
     */
    private $imagesPublicPath;

    /**
     * UploadImagesExtension constructor.
     * @param string $imagesPublicPath
     */
    public function __construct(string $imagesPublicPath)
    {
        $this->imagesPublicPath = rtrim($imagesPublicPath, '/') . '/';
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('uploadImagePath', [$this, 'formatUploadImagePath']),
        ];
    }

    /**
     * @param string $fileName
     * @return string
     */
    public function formatUploadImagePath(string $fileName): string
    {
        return $this->imagesPublicPath . $fileName;
    }
}
