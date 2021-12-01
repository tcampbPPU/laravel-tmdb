<?php

use function PHPUnit\Framework\assertInstanceOf;
use Tcamp\Tmdb\Collections\ChangeCollection;
use Tcamp\Tmdb\Models\Change;
use Tcamp\Tmdb\Models\Pagination;

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
    $movieChangeList = tmdb()
        ->changes()
        ->page(1)
        ->between(now()->subDays(7)->startOfDay(), now())
        ->movieChangeList();

    assertInstanceOf(Pagination::class, $movieChangeList);
    assertInstanceOf(ChangeCollection::class, $movieChangeList->items);
    assertInstanceOf(Change::class, $movieChangeList->items[0]);
});

test('get tv change list', function () {
    $tvChangeList = tmdb()->changes()->tvChangeList();

    assertInstanceOf(Pagination::class, $tvChangeList);
    assertInstanceOf(ChangeCollection::class, $tvChangeList->items);
    assertInstanceOf(Change::class, $tvChangeList->items[0]);
});

test('get person change list', function () {
    $personChangeList = tmdb()->changes()->personChangeList();

    assertInstanceOf(Pagination::class, $personChangeList);
    assertInstanceOf(ChangeCollection::class, $personChangeList->items);
    assertInstanceOf(Change::class, $personChangeList->items[0]);
});
