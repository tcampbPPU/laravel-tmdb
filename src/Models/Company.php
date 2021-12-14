<?php

namespace Tcamp\Tmdb\Models;

class Company
{
    /**
     * Struct for Company object
     *
     * @param int $id
     * @param string $name
     * @param string $logo_path
     * @param string $origin_country
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $logo_path = null,
        public ?string $origin_country = null,
    ) {
        $this->logo_path = isset($logo_path) ? "https://image.tmdb.org/t/p/w500{$logo_path}" : null;
    }
}
