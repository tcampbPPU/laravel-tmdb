<?php

use Tcamp\Tmdb\Collections\MovieCollection;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertTrue;

test('get most recent movies collection', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $recentMovies = tmdb()->recentMovies()->get();

    assertInstanceOf(MovieCollection::class, $recentMovies);
});
