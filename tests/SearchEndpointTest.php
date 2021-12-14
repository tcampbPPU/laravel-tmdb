<?php

use function PHPUnit\Framework\assertInstanceOf;

use Tcamp\Tmdb\Collections\CompanyCollection;
use Tcamp\Tmdb\Collections\SearchEntityCollection;
use Tcamp\Tmdb\Collections\SelectionCollection;
use Tcamp\Tmdb\Models\Company;
use Tcamp\Tmdb\Models\Pagination;
use Tcamp\Tmdb\Models\SearchEntity;
use Tcamp\Tmdb\Models\SearchResults;
use Tcamp\Tmdb\Models\Selection;

test('search companies by name', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response([
            'page' => 1,
            'total_pages' => 1,
            'total_results' => 1,
            'results' => [
                [
                    'id' => 136673,
                    'logo_path' => null,
                    'name' => 'MGM',
                    'origin_country' => 'RU',
                ],
            ],
        ], 200),
    ]);

    $searchResults = tmdb()
        ->search()
        ->query('MGM')
        ->companies();

    assertInstanceOf(Pagination::class, $searchResults);
    assertInstanceOf(CompanyCollection::class, $searchResults->items);
    assertInstanceOf(Company::class, $searchResults->items->first());
});


test('search collections by name', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response([
            'page' => 1,
            'total_pages' => 1,
            'total_results' => 1,
            'results' => [
                [
                    'adult' => false,
                    'backdrop_path' => "rI8zOWkRQJdlAyQ6WJOSlYK6JxZ.jpg",
                    'id' => 131292,
                    'name' => "Iron Man Collection",
                    'original_language' => "en",
                    'original_name' => "Iron Man Collection",
                    'overview' => "A superhero film series based on the Marvel Comics character of the same name and part of the Marvel Cinematic Universe (MCU) series. Tony Stark AKA Iron Man, an industrialist and master engineer uses a powered exoskeleton to fight foes, with the aid of his personal assistant and love interest Pepper Potts.",
                    'poster_path' => "fbeJ7f0aD4A112Bc1tnpzyn82xO.jpg",
                ],
            ],
        ], 200),
    ]);


    $searchResults = tmdb()
        ->search()
        ->query('Iron Man')
        ->collections();


    assertInstanceOf(Pagination::class, $searchResults);
    assertInstanceOf(SelectionCollection::class, $searchResults->items);
    assertInstanceOf(Selection::class, $searchResults->items->first());
});

test('search movie by title', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $searchResults = tmdb()->search()->movies('dune');

    assertInstanceOf(SearchResults::class, $searchResults);
    assertInstanceOf(SearchEntityCollection::class, $searchResults->results);
    assertInstanceOf(SearchEntity::class, $searchResults->results[0]);
});
