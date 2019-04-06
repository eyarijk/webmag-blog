<?php

namespace App\Service;

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
     * @var string
     */
    private $paramsQueryString;

    /**
     * Gravatar constructor.
     * @param string $size
     * @param string $defaultImage
     */
    public function __construct(string $size, string $defaultImage)
    {
        $params = [
            self::CONFIG_SIZE => $size,
            self::CONFIG_DEFAULT_IMAGE => $defaultImage,
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
