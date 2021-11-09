<?php

namespace Tcamp\Tmdb\Facade;

use Tcamp\Tmdb\Tmdb as TmdbManager;
use Illuminate\Support\Facades\Facade;

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
