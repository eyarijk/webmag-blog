<?php

namespace App\Twig;

use App\Entity\Category;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class LayoutVariablesExtension extends AbstractExtension
{
    private static $enabledTags;
    private static $enabledCategoriesWithArticleCount;
    private static $menuCategories;

    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return array
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('getEnabledTags', [$this, 'getEnabledTags']),
            new TwigFunction('getCategoriesForMenu', [$this, 'getCategoriesForMenu']),
            new TwigFunction('getEnabledCategoriesWithCountArticles', [$this, 'getEnabledCategoriesWithCountArticles']),
        ];
    }

    /**
     * @return array
     */
    public function getEnabledTags(): array
    {
        if (static::$enabledTags === null) {
            static::$enabledTags = $this
                ->doctrine
                ->getRepository(Tag::class)
                ->getEnabled()
            ;
        }

        return static::$enabledTags;
    }

    /**
     * @return array
     */
    public function getEnabledCategoriesWithCountArticles(): array
    {
        if (static::$enabledCategoriesWithArticleCount === null) {
            static::$enabledCategoriesWithArticleCount = $this
                ->doctrine
                ->getRepository(Category::class)
                ->getEnabledWithCountArticles()
            ;
        }

        return static::$enabledCategoriesWithArticleCount;
    }

    /**
     * @return array
     */
    public function getCategoriesForMenu(): array
    {
        if (static::$menuCategories === null) {
            static::$menuCategories = $this
                ->doctrine
                ->getRepository(Category::class)
                ->getForMenu()
            ;
        }

        return static::$menuCategories;
    }
}
