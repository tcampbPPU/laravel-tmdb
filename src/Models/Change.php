<?php

namespace Tcamp\Tmdb\Models;

class Change
{
    /**
     * Struct for Change object
     *
     * @param int $id
     * @param bool $adult
     * @return self
     */
    public function __construct(
        public int $id,
        public ?bool $adult = false
    ) {
    }
}
