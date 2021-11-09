<?php

namespace Tcamp\Tmdb;

use Tcamp\Tmdb\Endpoints\FindEndpoint;
use Tcamp\Tmdb\Endpoints\MostRecentEndpoint;
use Tcamp\Tmdb\Endpoints\SearchEndpoint;

class Tmdb
{
    public Api $api;
    protected MostRecentEndpoint $recentMovies;
    protected SearchEndpoint $searchResults;
    protected FindEndpoint $movie;

    public function __construct(string $token)
    {
        $this->api = new Api($token);
    }

    public function recentMovies(): MostRecentEndpoint
    {
        return $this->recentMovies ??= new MostRecentEndpoint($this->api);
    }

    public function find(int $id): FindEndpoint
    {
        return $this->movie ??= new FindEndpoint($this->api, $id);
    }

    public function search(string $query): SearchEndpoint
    {
        return $this->searchResults ??= new SearchEndpoint($this->api, $query);
    }
}
