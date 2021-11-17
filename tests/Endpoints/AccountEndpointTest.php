<?php

use function PHPUnit\Framework\assertInstanceOf;

use Tcamp\Tmdb\Collections\AccountListCollection;
use Tcamp\Tmdb\Collections\EpisodeCollection;
use Tcamp\Tmdb\Collections\MovieCollection;
use Tcamp\Tmdb\Models\Account;
use Tcamp\Tmdb\Models\Status;

test('get account details endpoint', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(accountDetailDataset(), 200),
    ]);

    $account = tmdb()->account()->details(testSession());

    assertInstanceOf(Account::class, $account);
});

test('get account created list', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(accountCreatedLists(), 200),
    ]);

    $lists = tmdb()->account()->createdList(testAccountId(), testSession());

    assertInstanceOf(AccountListCollection::class, $lists);
});

test('get account favorite movies', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $favMovies = tmdb()->account()->favoriteMovies(testAccountId(), testSession());

    assertInstanceOf(MovieCollection::class, $favMovies);
});

test('get account favorite tv shows', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $favTvShows = tmdb()->account()->favoriteTvShows(testAccountId(), testSession());

    assertInstanceOf(MovieCollection::class, $favTvShows);
});

test('mark item as favorite', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response([
                'status_code' => 12,
                'status_message' => "The item/record was updated successfully.",
        ], 201),
    ]);

    $status = tmdb()->account()->markAsFavorite(testAccountId(), testSession(), 'movie', 123, true);

    assertInstanceOf(Status::class, $status);
});

test('get account rated movies', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $ratedMovies = tmdb()->account()->ratedMovies(testAccountId(), testSession());

    assertInstanceOf(MovieCollection::class, $ratedMovies);
});

test('get account rated tv shows', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $ratedTvShows = tmdb()->account()->ratedTvShows(testAccountId(), testSession());

    assertInstanceOf(MovieCollection::class, $ratedTvShows);
});

test('get account rated tv episodes', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response([
            'page' => 1,
            'results' => [
              [
                'air_date' => "2013-10-15",
                'episode_number' => 5,
                'id' => 64782,
                'name' => "The Workplace Proximity",
                'overview' => "Amy starts working at Caltech which causes friction with Sheldon. Howard agrees with Sheldon who mentions this to Bernadette causing a big fight for the Wolowitzes.",
                'production_code' => "4X5305",
                'season_number' => 7,
                'show_id' => 1418,
                'still_path' => "/8gsO10PHQnMO0qqXKN58Dk9bBBm.jpg",
                'vote_average' => 7.583,
                'vote_count' => 6,
                'rating' => 8,
              ],
            ],
            'total_pages' => 8,
            'total_results' => 152,
        ], 200),
    ]);

    $ratedEpisodes = tmdb()->account()->ratedTvEpisodes(testAccountId(), testSession());

    assertInstanceOf(EpisodeCollection::class, $ratedEpisodes);
});

test('get account movie watch list', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $movieWatchList = tmdb()->account()->movieWatchList(testAccountId(), testSession());

    assertInstanceOf(MovieCollection::class, $movieWatchList);
});

test('get account tv show watch list', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);

    $tvShowWatchList = tmdb()->account()->tvShowWatchList(testAccountId(), testSession());

    assertInstanceOf(MovieCollection::class, $tvShowWatchList);
});

test('add item to watch list', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response([
                'status_code' => 1,
                'status_message' => "Success.",
        ], 201),
    ]);

    $status = tmdb()->account()->addToWatchList(testAccountId(), testSession(), 'movie', 123, true);

    assertInstanceOf(Status::class, $status);
});
