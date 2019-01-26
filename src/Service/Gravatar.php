<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class Gravatar
{
    private const GRAVATAR_URL = 'https://www.gravatar.com/avatar/';

    /**
     * Photo size.
     */
    private const CONFIG_SIZE = 's';

    /**
     * Default image.
     */
    private const CONFIG_DEFAULT_IMAGE = 'd';

    /**
     * @var
     */
    private $paramsQueryString;

    /**
     * Gravatar constructor.
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $gravatarConfiguration = $parameterBag->get('gravatar');

        $params = [
            self::CONFIG_SIZE => $gravatarConfiguration['size'],
            self::CONFIG_DEFAULT_IMAGE => $gravatarConfiguration['defaultImage'],
        ];

        $this->paramsQueryString = '?' . http_build_query($params);
    }

    /**
     * @param string $email
     * @return string
     */
    public function getUrlForAvatarByEmailOrDefaultImage(string $email): string
    {
        return self::GRAVATAR_URL . md5(strtolower(trim($email))) . $this->paramsQueryString;
    }
}
