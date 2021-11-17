<?php

namespace Tcamp\Tmdb\Endpoints;

use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Models\Session;

class AuthenticationEndpoint
{
    public function __construct(
        protected Api $api
    ) {
    }

    /**
     * Create Guest API Session Token
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/authentication/create-guest-session
     *
     * @param string $apiKey
     * @return Session
     */
    public function createGuestSession(string $apiKey): Session
    {
        $data = $this->api->get('authentication/guest_session/new', [
            'api_key' => $apiKey,
        ])
            ->json();

        return new Session(...$data);
    }

    /**
     * Create Temporary Request Token
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/authentication/create-request-token
     *
     * @param string $apiKey
     * @return Session
     */
    public function createRequestToken(string $apiKey): Session
    {
        $data = $this->api->get('authentication/token/new', [
            'api_key' => $apiKey,
        ])
            ->json();

        return new Session(...$data);
    }

    /**
     * Create Session ID for user given request token
     *
     * @api POST
     * @see https://developers.themoviedb.org/3/authentication/create-session
     *
     * @param string $apiKey
     * @param string $requestToken
     * @return Session
     */
    public function createSession(string $apiKey, string $requestToken): Session
    {
        $data = $this->api->post('authentication/session/new', [
            'api_key' => $apiKey,
            'request_token' => $requestToken,
        ])
            ->json();

        return new Session(...$data);
    }

    /**
     * Create Session ID for user given username and password
     * @api POST
     * @see https://developers.themoviedb.org/3/authentication/validate-request-token
     *
     * @param string $apiKey
     * @param string $requestToken
     * @param string $username
     * @param string $password
     * @return Session
     */
    public function createSessionWithLogin(string $apiKey, string $requestToken, string $username, string $password): Session
    {
        $data = $this->api->post('authentication/session/new', [
            'api_key' => $apiKey,
            'request_token' => $requestToken,
            'username' => $username,
            'password' => $password,
        ])
            ->json();

        return new Session(...$data);
    }

    /**
     * Delete or Logout Session
     *
     * @api DELETE
     * @see https://developers.themoviedb.org/3/authentication/delete-session
     *
     * @param string $apiKey
     * @param string $sessionId
     * @return array{success:bool}
     */
    public function deleteSession(string $apiKey, string $sessionId): array
    {
        return $this->api->delete('authentication/session/new', [
            'api_key' => $apiKey,
            'sessionId' => $sessionId,
        ])
            ->json();
    }
}
