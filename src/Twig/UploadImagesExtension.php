<?php

namespace App\Twig;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
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
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->imagesPublicPath = rtrim($parameterBag->get('images_public_path'), '/') . '/';
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
