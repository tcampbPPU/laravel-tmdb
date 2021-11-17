<?php

use function PHPUnit\Framework\assertInstanceOf;
use Tcamp\Tmdb\Collections\ChangeCollection;

beforeEach(function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response([
            'results' => [
                [
                    'id' => 1670120,
                    'adult' => false,
                ],
            ],
            'page' => 1,
            'total_pages' => 7,
            'total_results' => 620,
        ], 200),
    ]);
});

test('get movie change list', function () {
    $movieChangeList = tmdb()->changes()->movieChangeList();

    assertInstanceOf(ChangeCollection::class, $movieChangeList);
});

test('get tv change list', function () {
    $tvChangeList = tmdb()->changes()->tvChangeList();

    assertInstanceOf(ChangeCollection::class, $tvChangeList);
});

test('get person change list', function () {
    $personChangeList = tmdb()->changes()->personChangeList();

    assertInstanceOf(ChangeCollection::class, $personChangeList);
});
