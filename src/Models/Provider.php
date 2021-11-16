<?php

namespace Tcamp\Tmdb\Models;

class Provider
{
    /**
     * Struct for Provider object
     *
     * @param int $display_priority
     * @param string $logo_path
     * @param string $provider_name
     * @param int $provider_id
     * @return self
     */
    public function __construct(
        public int $display_priority,
        public string $logo_path,
        public string $provider_name,
        public int $provider_id,
    ) {
        $this->logo_path = "https://image.tmdb.org/t/p/w500{$logo_path}";
    }
}
