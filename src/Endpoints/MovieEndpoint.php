<?php

namespace Tcamp\Tmdb\Endpoints;

use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Collections\MovieCollection;
use Tcamp\Tmdb\Models\Movie;

class MovieEndpoint
{
    public function __construct(
        protected Api $api
    ) {
    }

    public function get(int $limit = 10, int $page = 1): MovieCollection
    {
        $data = $this->api->get('movie/now_playing', [
            'page' => $page,
            'limit' => $limit,
        ])->json('results');

        $collection = new MovieCollection($data);

        return $collection;
    }

    public function find(int $id): Movie
    {
        $data = $this->api->get("movie/{$id}")->json();

        return new Movie(...$data);
    }

    /**
     * Upcoming
     */

    /**
     * Top Rated
     */

    /**
     * Popular
     */

    /**
     * Now Playing
     */

    /**
     * Latest
     */

    /**
     * Similar Movies
     */

     /**
      * Get Reviews
      */

    /**
     * Get External ID's
     */
}
