<?php

namespace Tcamp\Tmdb\Models;

use Illuminate\Support\Collection;

class SearchResults
{
    /**
     * Struct for SearchResults object
     *
     * @param int $page
     * @param Collection $results
     * @param int $total_results
     * @param int $total_pages
     * @return self
     */
    public function __construct(
        public int $page,
        public Collection $results,
        public int $total_results,
        public int $total_pages,
    ) {
    }
}
