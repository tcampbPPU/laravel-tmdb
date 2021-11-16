<?php

namespace Tcamp\Tmdb\Endpoints;

use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Collections\AccountListCollection;
use Tcamp\Tmdb\Collections\EpisodeCollection;
use Tcamp\Tmdb\Collections\MovieCollection;
use Tcamp\Tmdb\Enums\Sort;
use Tcamp\Tmdb\Enums\Type;
use Tcamp\Tmdb\Exceptions\IncorrectValueException;
use Tcamp\Tmdb\Models\Account;
use Tcamp\Tmdb\Models\Status;

class AccountEndpoint
{
    public function __construct(
        protected Api $api
    ) {
    }

    /**
     * Get Account Details
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/account/get-account-details
     *
     * @param string $apiKey
     * @param string $sessionId
     * @return Account
     */
    public function details(string $apiKey, string $sessionId): Account
    {
        $data = $this->api->get('account', [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
        ])
            ->json();

        return new Account(...$data);
    }

    /**
     * Get all of the lists created by an account
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/account/get-created-lists
     *
     * @param int $accountId
     * @param string $apiKey
     * @param int $page
     * @param string $language
     * @return AccountListCollection
     */
    public function createdList(int $accountId, string $apiKey, string $sessionId, int $page = 1, string $language = 'en-US'): AccountListCollection
    {
        $data = $this->api->get("account/{$accountId}/lists", [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
            'page' => $page,
            'language' => $language,
        ])
            ->json('results');

        $collection = new AccountListCollection($data);

        return $collection;
    }

    /**
     * Get Account Favorite Movies
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/account/get-favorite-movies
     *
     * @param int $accountId
     * @param string $apiKey
     * @param int $page
     * @param string $language
     * @param string $sortBy
     * @return MovieCollection
     */
    public function favoriteMovies(int $accountId, string $apiKey, string $sessionId, ?int $page = 1, ?string $language = 'en-US', ?string $sortBy = Sort::ASC): MovieCollection
    {
        if (isset($sortBy) && ! in_array($sortBy, Sort::values())) {
            throw new IncorrectValueException('Incorrect sortBy option specified');
        }

        $data = $this->api->get("account/{$accountId}/favorite/movies", [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
            'page' => $page,
            'language' => $language,
            'sort_by' => $sortBy,
        ])
            ->json('results');

        $collection = new MovieCollection($data);

        return $collection;
    }

    /**
     * Get Account Favorite TV Shows
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/account/get-favorite-tv-shows
     *
     * @param int $accountId
     * @param string $apiKey
     * @param int $page
     * @param string $language
     * @param string $sortBy
     * @return MovieCollection
     */
    public function favoriteTvShows(int $accountId, string $apiKey, string $sessionId, ?int $page = 1, ?string $language = 'en-US', ?string $sortBy = Sort::ASC): MovieCollection
    {
        if (isset($sortBy) && ! in_array($sortBy, Sort::values())) {
            throw new IncorrectValueException('Incorrect sortBy option specified');
        }

        $data = $this->api->get("account/{$accountId}/favorite/tv", [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
            'page' => $page,
            'language' => $language,
            'sort_by' => $sortBy,
        ])
            ->json('results');

        $collection = new MovieCollection($data);

        return $collection;
    }

    /**
     * Mark as Favorite
     *
     * @api POST
     * @see https://developers.themoviedb.org/3/account/mark-as-favorite
     *
     * @param int $accountId
     * @param string $apiKey
     * @param string $sessionId
     * @param string $mediaType
     * @param int $mediaId
     * @param bool $favorite
     * @return Status
     */
    public function markAsFavorite(int $accountId, string $apiKey, string $sessionId, string $mediaType, int $mediaId, bool $favorite): Status
    {
        if (! in_array($mediaType, [Type::MOVIE, Type::TV])) {
            throw new IncorrectValueException('Incorrect mediaType option specified');
        }

        $data = $this->api->post("account/{$accountId}/favorite", [
            'api_key' => $apiKey,
            'session_id' => $sessionId,
            'media_type' => $mediaType,
            'media_id' => $mediaId,
            'favorite' => $favorite,
        ])
            ->json();

        return new Status(...$data);
    }

    /**
     * Get List of Rated Movies
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/account/get-rated-movies
     *
     * @param int $accountId
     * @param string $apiKey
     * @param int $page
     * @param string $language
     * @param string $sortBy
     * @return MovieCollection
     */
    public function ratedMovies(int $accountId, string $apiKey, string $sessionId, ?int $page = 1, ?string $language = 'en-US', ?string $sortBy = Sort::ASC): MovieCollection
    {
        if (isset($sortBy) && ! in_array($sortBy, Sort::values())) {
            throw new IncorrectValueException('Incorrect sortBy option specified');
        }

        $data = $this->api->get("account/{$accountId}/rated/movies", [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
            'page' => $page,
            'language' => $language,
            'sort_by' => $sortBy,
        ])
            ->json('results');

        $collection = new MovieCollection($data);

        return $collection;
    }

    /**
     * Get List of Rated TV Shows
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/account/get-rated-tv-shows
     *
     * @param int $accountId
     * @param string $apiKey
     * @param int $page
     * @param string $language
     * @param string $sortBy
     * @return MovieCollection
     */
    public function ratedTvShows(int $accountId, string $apiKey, string $sessionId, ?int $page = 1, ?string $language = 'en-US', ?string $sortBy = Sort::ASC): MovieCollection
    {
        if (isset($sortBy) && ! in_array($sortBy, Sort::values())) {
            throw new IncorrectValueException('Incorrect sortBy option specified');
        }

        $data = $this->api->get("account/{$accountId}/rated/tv", [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
            'page' => $page,
            'language' => $language,
            'sort_by' => $sortBy,
        ])
            ->json('results');

        $collection = new MovieCollection($data);

        return $collection;
    }

    /**
     * Get List of Rated TV Episodes
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/account/get-rated-tv-episodes
     *
     * @param int $accountId
     * @param string $apiKey
     * @param int $page
     * @param string $language
     * @param string $sortBy
     * @return EpisodeCollection
     */
    public function ratedTvEpisodes(int $accountId, string $apiKey, string $sessionId, ?int $page = 1, ?string $language = 'en-US', ?string $sortBy = Sort::ASC): EpisodeCollection
    {
        if (isset($sortBy) && ! in_array($sortBy, Sort::values())) {
            throw new IncorrectValueException('Incorrect sortBy option specified');
        }

        $data = $this->api->get("account/{$accountId}/rated/tv/episodes", [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
            'page' => $page,
            'language' => $language,
            'sort_by' => $sortBy,
        ])
            ->json('results');

        $collection = new EpisodeCollection($data);

        return $collection;
    }

    /**
     * Get list of all the movies added to watch list
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/account/get-movie-watchlist
     *
     * @param int $accountId
     * @param string $apiKey
     * @param int $page
     * @param string $language
     * @param string $sortBy
     * @return MovieCollection
     */
    public function movieWatchList(int $accountId, string $apiKey, string $sessionId, ?int $page = 1, ?string $language = 'en-US', ?string $sortBy = Sort::ASC): MovieCollection
    {
        if (isset($sortBy) && ! in_array($sortBy, Sort::values())) {
            throw new IncorrectValueException('Incorrect sortBy option specified');
        }

        $data = $this->api->get("account/{$accountId}/watchlist/movies", [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
            'page' => $page,
            'language' => $language,
            'sort_by' => $sortBy,
        ])
            ->json('results');

        $collection = new MovieCollection($data);

        return $collection;
    }

    /**
     * Get list of all the Tv shows added to watch list
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/account/get-tv-show-watchlist
     *
     * @param int $accountId
     * @param string $apiKey
     * @param int $page
     * @param string $language
     * @param string $sortBy
     * @return MovieCollection
     */
    public function tvShowWatchList(int $accountId, string $apiKey, string $sessionId, ?int $page = 1, ?string $language = 'en-US', ?string $sortBy = Sort::ASC): MovieCollection
    {
        if (isset($sortBy) && ! in_array($sortBy, Sort::values())) {
            throw new IncorrectValueException('Incorrect sortBy option specified');
        }

        $data = $this->api->get("account/{$accountId}/watchlist/tv", [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
            'page' => $page,
            'language' => $language,
            'sort_by' => $sortBy,
        ])
            ->json('results');

        $collection = new MovieCollection($data);

        return $collection;
    }

    /**
     * Add a movie or TV show to watch list
     *
     * @api POST
     * @see https://developers.themoviedb.org/3/account/add-to-watchlist
     *
     * @param int $accountId
     * @param string $apiKey
     * @param string $sessionId
     * @param string $mediaType
     * @param int $mediaId
     * @param bool $watchList
     * @return Status
     */
    public function addToWatchList(int $accountId, string $apiKey, string $sessionId, string $mediaType, int $mediaId, bool $watchList): Status
    {
        if (! in_array($mediaType, [Type::MOVIE, Type::TV])) {
            throw new IncorrectValueException('Incorrect mediaType option specified');
        }

        $data = $this->api->post("account/{$accountId}/watchlist", [
            'api_key' => $apiKey,
            'session_id' => $sessionId,
            'media_type' => $mediaType,
            'media_id' => $mediaId,
            'watchlist' => $watchList,
        ])
            ->json();

        return new Status(...$data);
    }
}
