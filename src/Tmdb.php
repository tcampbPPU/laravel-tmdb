<?php

namespace Tcamp\Tmdb;

use Tcamp\Tmdb\Endpoints\AccountEndpoint;
use Tcamp\Tmdb\Endpoints\FindEndpoint;
use Tcamp\Tmdb\Endpoints\MostRecentEndpoint;
use Tcamp\Tmdb\Endpoints\SearchEndpoint;
use Tcamp\Tmdb\Endpoints\TrendingEndpoint;

class Tmdb
{
    public Api $api;
    protected AccountEndpoint $account;
    protected MostRecentEndpoint $recentMovies;
    protected FindEndpoint $movie;
    protected SearchEndpoint $searchResults;
    protected TrendingEndpoint $trendingResults;

    public function __construct(string $token)
    {
        $this->api = new Api($token);
    }

    public function account(): AccountEndpoint
    {
        return $this->account ??= new AccountEndpoint($this->api);
    }

    /**
     * Get recent movies
     *
     * @return MostRecentEndpoint
     */
    public function recentMovies(): MostRecentEndpoint
    {
        return $this->recentMovies ??= new MostRecentEndpoint($this->api);
    }

    /**
     * Find specific movie by TMDB ID
     *
     * @param int $id - The movie DB ID
     * @return FindEndpoint
     */
    public function find(int $id): FindEndpoint
    {
        return $this->movie ??= new FindEndpoint($this->api, $id);
    }

    /**
     * Search for movies
     *
     * @param string $query
     * @return SearchEndpoint
     */
    public function search(string $query): SearchEndpoint
    {
        return $this->searchResults ??= new SearchEndpoint($this->api, $query);
    }

    /**
     * Get trending movies
     *
     * @return TrendingEndpoint
     */
    public function trending(): TrendingEndpoint
    {
        return $this->trendingResults ??= new TrendingEndpoint($this->api);
    }
}
