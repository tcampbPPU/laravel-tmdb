<?php

namespace Tcamp\Tmdb\Endpoints;

use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Models\Movie;

class FindEndpoint
{
    public function __construct(
        protected Api $api,
        protected int $id,
    ) {
    }

    public function get(): Movie
    {
        $data = $this->api->get("movie/{$this->id}")->json();

        return new Movie(...$data);
    }
}
