<?php

use function PHPUnit\Framework\assertInstanceOf;

use Tcamp\Tmdb\Collections\MovieCollection;

test('get most recent movies collection', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $recentMovies = tmdb()->recentMovies()->get();

    assertInstanceOf(MovieCollection::class, $recentMovies);
});
