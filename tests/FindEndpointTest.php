<?php

use function PHPUnit\Framework\assertInstanceOf;

use Tcamp\Tmdb\Models\Movie;

test('find movie by tmdb id', function () {
    $fakeMovie = recentMovieDataset()['results'][0];

    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response($fakeMovie, 200),
    ]);

    $movie = tmdb()->find($fakeMovie['id'])->get();

    assertInstanceOf(Movie::class, $movie);
});
