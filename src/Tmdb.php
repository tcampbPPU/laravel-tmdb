<?php

namespace Tcamp\Tmdb;

use Tcamp\Tmdb\Endpoints\MostRecentEndpoint;

class Tmdb
{
    public Api $api;
    protected MostRecentEndpoint $recentMovies;

    public function __construct(string $token)
    {
        $this->api = new Api($token);
    }

    public function recentMovies(): MostRecentEndpoint
    {
        return $this->recentMovies ??= new MostRecentEndpoint($this->api);
    }
}
