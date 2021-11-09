<?php


test('test it works', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response(recentMovieDataset(), 200),
    ]);


    $recentMovies = tmdb()->recentMovies()->get();

    dd($recentMovies);
});
