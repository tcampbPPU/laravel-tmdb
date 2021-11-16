<?php

namespace Tcamp\Tmdb\Models;

class Genre
{
    /**
     * Struct for Genre object
     *
     * @param int $id
     * @param string $name
     * @return self
     */
    public function __construct(
        public int $id,
        public string $name
    ) {
    }
}
