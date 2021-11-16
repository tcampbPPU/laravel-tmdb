<?php

namespace Tcamp\Tmdb\Models;

class Status
{
    /**
     * Struct for Status object
     *
     * @param int $status_code
     * @param string $status_message
     * @return self
     */
    public function __construct(
        public int $status_code,
        public string $status_message
    ) {
    }
}
