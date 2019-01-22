<?php

namespace App\Twig;

use App\Service\Gravatar;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class GravatarExtension extends AbstractExtension
{
    /**
     * @var Gravatar
     */
    private $gravatar;

    public function __construct(Gravatar $gravatar)
    {
        $this->gravatar = $gravatar;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('gravatar', [$this, 'gravatar']),
        ];
    }

    /**
     * @param string $email
     * @return string
     */
    public function gravatar(string $email): string
    {
        return $this->gravatar->getUrlForAvatarByEmailOrDefaultImage($email);
    }
}
