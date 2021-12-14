<?php

namespace Tcamp\Tmdb\Models;

class Selection
{
    /**
     * Struct for Selection object
     *
     * @param bool $adult
     * @param string $backdrop_path
     * @param int $id
     * @param string $name
     * @param string $original_language
     * @param string $original_name
     * @param string $overview
     * @param string $poster_path
     * @return self
     */
    public function __construct(
        public  ?bool $adult = null,
        public  ?string $backdrop_path = null,
        public  ?int $id = null,
        public  ?string $name = null,
        public  ?string $original_language = null,
        public  ?string $original_name = null,
        public  ?string $overview = null,
        public  ?string $poster_path = null,
    ) {
        $this->backdrop_path = isset($backdrop_path) ? "https://image.tmdb.org/t/p/w500{$backdrop_path}" : null;
        $this->poster_path = isset($poster_path) ? "https://image.tmdb.org/t/p/w500{$poster_path}" : null;
    }
}
