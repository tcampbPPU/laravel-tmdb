<?php

use function PHPUnit\Framework\assertInstanceOf;

use Tcamp\Tmdb\Collections\MovieCollection;
use Tcamp\Tmdb\Models\Movie;
use Tcamp\Tmdb\Models\Pagination;

test('search movie by title', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $searchResults = tmdb()->search()->movies('dune');

    assertInstanceOf(Pagination::class, $searchResults);
    assertInstanceOf(MovieCollection::class, $searchResults->items);
    assertInstanceOf(Movie::class, $searchResults->items[0]);
});
