<?php

namespace Tcamp\Tmdb\Endpoints;

use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Collections\MovieCollection;

class MostRecentEndpoint
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


        // dd($this->cursor);

        $collection = new MovieCollection($data);

        return $collection;
    }
}
