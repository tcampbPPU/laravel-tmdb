<?php

use function PHPUnit\Framework\assertInstanceOf;
use Tcamp\Tmdb\Models\Session;

test('create guest session', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response([
            'success' => true,
            'guest_session_id' => "1ce82ec1223641636ad4a60b07de3581",
            'expires_at' => "2016-08-27 16:26:40 UTC",
        ], 200),
    ]);

    $guestSession = tmdb()->auth()->createGuestSession();

    assertInstanceOf(Session::class, $guestSession);
});

test('create request token', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response([
            'success' => true,
            'expires_at' => "2016-08-26 17:04:39 UTC",
            'request_token' => "ff5c7eeb5a8870efe3cd7fc5c282cffd26800ecd",
        ], 200),
    ]);

    $requestToken = tmdb()->auth()->createRequestToken();

    assertInstanceOf(Session::class, $requestToken);
});

test('create session', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response([
            'success' => true,
            'session_id' => "79191836ddaa0da3df76a5ffef6f07ad6ab0c641",
        ], 200),
    ]);

    $session = tmdb()->auth()->createSession('request-token');

    assertInstanceOf(Session::class, $session);
});

test('create session with login info', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response([
            'success' => true,
            'expires_at' => "2018-07-24 04:10:26 UTC",
            'request_token' => "1531f1a558c8357ce8990cf887ff196e8f5402ec",
        ], 200),
    ]);

    $session = tmdb()->auth()->createSessionWithLogin('request-token', 'username', 'password');

    assertInstanceOf(Session::class, $session);
});

test('create delete session', function () {
    httpClient()->fake([
        'https://api.themoviedb.org/3/*' => httpClient()->response([
            'success' => true,
        ], 200),
    ]);

    $status = tmdb()->auth()->deleteSession(testSession());

    expect($status)
        ->toBeArray()
        ->toMatchArray([
            'success' => true,
        ]);
});
