<?php

use function PHPUnit\Framework\assertInstanceOf;

use Tcamp\Tmdb\Collections\SearchEntityCollection;
use Tcamp\Tmdb\Models\SearchEntity;
use Tcamp\Tmdb\Models\SearchResults;

test('search movie by title', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $searchResults = tmdb()->search()->movies('dune');

    assertInstanceOf(SearchResults::class, $searchResults);
    assertInstanceOf(SearchEntityCollection::class, $searchResults->results);
    assertInstanceOf(SearchEntity::class, $searchResults->results[0]);
});
