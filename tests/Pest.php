<?php

use Illuminate\Http\Client\Factory;
use Pest\TestSuite;
use PHPUnit\Framework\TestCase;
use Tcamp\Tmdb\Tmdb;

function this(): TestCase
{
    return TestSuite::getInstance()->test;
}

function tmdb(): Tmdb
{
    return this()->tmdb ??= new Tmdb('test-token');
}

function httpClient(): Factory
{
    return tmdb()->api->httpClient;
}

function recentMovieDataset()
{
    return [
        'dates' => [
            'maximum' => "2021-11-06",
            'minimum' => "2021-09-19",
        ],
        'page' => 1,
        'total_pages' => 87,
        'total_results' => 1725,
        'results' => [
            [
                'adult' => false,
                'backdrop_path' => "/lNyLSOKMMeUPr1RsL4KcRuIXwHt.jpg",
                'genre_ids' => [
                    878,
                    28,
                    12,
                ],
                'id' => 580489,
                'original_language' => "en",
                'original_title' => "Venom: Let There Be Carnage",
                'overview' => "After finding a host body in investigative reporter Eddie Brock, the alien symbiote must face a new enemy, Carnage, the alter ego of serial killer Cletus Kasady.",
                'popularity' => 6526.86,
                'poster_path' => "/rjkmN1dniUHVYAtwuV3Tji7FsDO.jpg",
                'release_date' => "2021-09-30",
                'title' => "Venom: Let There Be Carnage",
                'video' => false,
                'vote_average' => 6.8,
                'vote_count' => 1659,
            ],
            [
                'adult' => false,
                'backdrop_path' => "/eeijXm3553xvuFbkPFkDG6CLCbQ.jpg",
                'genre_ids' => [
                    28,
                    12,
                    878,
                ],
                'id' => 438631,
                'original_language' => "en",
                'original_title' => "Dune",
                'overview' => "Paul Atreides, a brilliant and gifted young man born into a great destiny beyond his understanding, must travel to the most dangerous planet in the universe to ensure the future of his family and his people. As malevolent forces explode into conflict over the planet's exclusive supply of the most precious resource in existence-a commodity capable of unlocking humanity's greatest potential-only those who can conquer their fear will survive.",
                'popularity' => 4080.34,
                'poster_path' => "/d5NXSklXo0qyIYkgV94XAgMIckC.jpg",
                'release_date' => "2021-09-15",
                'title' => "Dune",
                'video' => false,
                'vote_average' => 8,
                'vote_count' => 3535,
            ],
            [
                'adult' => false,
                'backdrop_path' => "/3G6wET9eLvYn3aoIj8NfQFhpYEB.jpg",
                'genre_ids' => [
                    28,
                    12,
                    878,
                ],
                'id' => 524434,
                'original_language' => "en",
                'original_title' => "Eternals",
                'overview' => "The Eternals are a team of ancient aliens who have been living on Earth in secret for thousands of years. When an unexpected tragedy forces them out of the shadows, they are forced to reunite against mankind’s most ancient enemy, the Deviants.",
                'popularity' => 3786.236,
                'poster_path' => "/6AdXwFTRTAzggD2QUTt5B7JFGKL.jpg",
                'release_date' => "2021-11-03",
                'title' => "Eternals",
                'video' => false,
                'vote_average' => 7.1,
                'vote_count' => 480,
            ],
        ],
    ];
}
