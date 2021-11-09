<?php

namespace Tcamp\Tmdb\Facade;

use Illuminate\Support\Facades\Facade;
use Tcamp\Tmdb\Tmdb as TmdbManager;

/**
 * @method static \Tcamp\Tmdb\Endpoints\MostRecentEndpoint recentMovies()
 * @see \Tcamp\Tmdb\Tmdb
 */
class Tmdb extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TmdbManager::class;
    }
}
