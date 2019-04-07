<?php

namespace App\DTO;

class SearchDTO
{
    /**
     * @var string|null
     */
    private $query;

    /**
     * @return string|null
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @param string $query
     */
    public function setQuery(string $query): void
    {
        $this->query = trim($query);
    }
}
