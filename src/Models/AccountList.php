<?php

namespace Tcamp\Tmdb\Models;

class AccountList
{
    /**
     * Struct for AccountList object
     *
     * @param int $id
     * @param string $description
     * @param int $favorite_count
     * @param int $item_count
     * @param string $iso_639_1
     * @param string $list_type
     * @param string $name
     * @param string $poster_path
     * @return self
     */
    public function __construct(
        public int $id,
        public string $description,
        public int $favorite_count,
        public int $item_count,
        public string $iso_639_1,
        public string $list_type,
        public string $name,
        public ?string $poster_path = null
    ) {
        $this->poster_path = isset($poster_path) ? "https://image.tmdb.org/t/p/w500{$poster_path}" : null;
    }
}
