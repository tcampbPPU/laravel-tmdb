<?php

namespace Tcamp\Tmdb\Models;

use Illuminate\Support\Collection;

class Pagination
{
    /**
     * Struct for Pagination object
     *
     * @param int $page
     * @param int $total_pages
     * @param int $total_results
     * @param Collection $items
     * @return self
     */
    public function __construct(
        public int $page,
        public int $total_pages,
        public int $total_results,
        public Collection $items
    ) {
    }
}
