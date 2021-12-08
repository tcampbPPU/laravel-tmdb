<?php

namespace Tcamp\Tmdb;

use Tcamp\Tmdb\Endpoints\AccountEndpoint;
use Tcamp\Tmdb\Endpoints\AuthenticationEndpoint;
use Tcamp\Tmdb\Endpoints\ChangeEndpoint;
use Tcamp\Tmdb\Endpoints\DiscoverEndpoint;
use Tcamp\Tmdb\Endpoints\FindEndpoint;
use Tcamp\Tmdb\Endpoints\MostRecentEndpoint;
use Tcamp\Tmdb\Endpoints\SearchEndpoint;
use Tcamp\Tmdb\Endpoints\TrendingEndpoint;

class Tmdb
{
    public Api $api;
    protected AccountEndpoint $account;
    protected AuthenticationEndpoint $auth;
    protected ChangeEndpoint $changes;
    protected DiscoverEndpoint $discovery;
    protected MostRecentEndpoint $recentMovies;
    protected FindEndpoint $movie;
    protected SearchEndpoint $search;
    protected TrendingEndpoint $trendingResults;

    public function __construct(string $token)
    {
        $this->api = new Api($token);
    }

    public function account(): AccountEndpoint
    {
        return $this->account ??= new AccountEndpoint($this->api);
    }

    public function auth(): AuthenticationEndpoint
    {
        return $this->auth ??= new AuthenticationEndpoint($this->api);
    }

    public function changes(): ChangeEndpoint
    {
        return $this->changes ??= new ChangeEndpoint($this->api);
    }

    public function discovery(): DiscoverEndpoint
    {
        return $this->discovery ??= new DiscoverEndpoint($this->api);
    }

    public function search(): SearchEndpoint
    {
        return $this->search ??= new SearchEndpoint($this->api);
    }

    // --

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
     * Get trending movies
     *
     * @return TrendingEndpoint
     */
    public function trending(): TrendingEndpoint
    {
        return $this->trendingResults ??= new TrendingEndpoint($this->api);
    }
}
