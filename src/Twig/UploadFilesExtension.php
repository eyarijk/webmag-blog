<?php

namespace App\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class UploadFilesExtension extends AbstractExtension
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * UploadFilesExtension constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('uploadFilePath', [$this, 'formatUploadFilePath']),
        ];
    }

    /**
     * @param string|null $fileName
     * @return string|null
     */
    public function formatUploadFilePath(?string $fileName): ?string
    {
        return $fileName !== null ? $this->container->getParameter('images_directory_public') . $fileName : null;
    }
}
