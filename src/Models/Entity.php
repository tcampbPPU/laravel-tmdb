<?php

namespace Tcamp\Tmdb\Models;

class Entity
{
    /**
     * Struct for Generic Entity object
     *
     * @param int $id
     * @param string $name
     * @return self
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
    ) {
    }
}
