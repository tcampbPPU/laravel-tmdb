<?php

namespace Tcamp\Tmdb\Endpoints;

use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Collections\AccountListCollection;
use Tcamp\Tmdb\Collections\MovieCollection;
use Tcamp\Tmdb\Enums\Sort;
use Tcamp\Tmdb\Exceptions\IncorrectValueException;
use Tcamp\Tmdb\Models\Account;

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
    public function accountDetails(string $apiKey, string $sessionId): Account
    {
        $data = $this->api->get('account', [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
        ])->json();

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
    public function getAccountLists(int $accountId, string $apiKey, string $sessionId, int $page = 1, string $language = 'en-US'): AccountListCollection
    {
        $data = $this->api->get("account/{$accountId}/lists", [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
            'page' => $page,
            'language' => $language,
        ])->json('results');

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
    public function getAccountFavMovies(int $accountId, string $apiKey, string $sessionId, ?int $page = 1, ?string $language = 'en-US', ?string $sortBy = Sort::ASC): MovieCollection
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
        ])->json('results');


        $collection = new MovieCollection($data);

        return $collection;
    }
}
