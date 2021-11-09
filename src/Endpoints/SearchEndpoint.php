<?php

namespace Tcamp\Tmdb\Endpoints;

use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Collections\MovieCollection;

class SearchEndpoint
{
    public function __construct(
        protected Api $api,
        protected string $query,
    ) {
    }

    public function get(): MovieCollection
    {
        $data = $this->api->get('search/movie', [
            'query' => $this->query,
        ])->json('results');


        $collection = new MovieCollection($data);

        return $collection;
    }
}
