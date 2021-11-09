<?php

use Tcamp\Tmdb\Collections\MovieCollection;

use function PHPUnit\Framework\assertInstanceOf;

test('search movie by title', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $searchResults = tmdb()->search('dune')->get();

    assertInstanceOf(MovieCollection::class, $searchResults);

});
