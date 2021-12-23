<?php

namespace Tcamp\Tmdb;

use Exception;
use Illuminate\Http\Client\Factory as HttpClient;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Tcamp\Tmdb\Exceptions\AuthenticationException;

class Api
{
    public HttpClient $httpClient;
    public Response $latestResponse;

    // Utilizing version 3 of the API
    protected string $baseUrl = 'https://api.themoviedb.org/4/';

    public function __construct(
        protected string $token
    ) {
        $this->httpClient = new HttpClient();
    }

    /**
     * Perform a GET request
     *
     * @param  string  $endpoint
     * @param  null|array  $query
     * @return Response
     *
     * @throws AuthenticationException
     * @throws Exception
     */
    public function get(string $endpoint, ?array $query = null): Response
    {
        $this->latestResponse = $this->request()->get($endpoint, $query);

        return $this->response();
    }

    /**
     * Perform a POST request
     *
     * @param  string  $endpoint
     * @param  null|array  $data
     * @return Response
     *
     * @throws AuthenticationException
     * @throws Exception
     */
    public function post(string $endpoint, ?array $data = null): Response
    {
        $this->latestResponse = $this->request()->post(
            $endpoint,
            collect($data)->whereNotNull()->toArray()
        );

        return $this->response();
    }

    /**
     * Perform a DELETE request
     * @param  string  $endpoint
     * @param  array  $data
     * @return Response
     *
     * @throws AuthenticationException
     * @throws Exception
     */
    public function delete(string $endpoint, array $data = []): Response
    {
        $this->latestResponse = $this->request()->delete($endpoint, $data);

        return $this->response();
    }

    /**
     * Standardized request format
     *
     * @return PendingRequest
     */
    protected function request(): PendingRequest
    {
        return $this->httpClient->baseUrl($this->baseUrl)
            ->withHeaders([
                'Authorization' => "Bearer {$this->token}",
            ]);
    }

    /**
     * Standardized response format
     *
     * @return Response
     *
     * @throws AuthenticationException
     * @throws Exception
     */
    protected function response(): Response
    {
        if ($this->latestResponse->status() === 401) {
            throw new AuthenticationException($this->latestResponse->body());
        }

        if (! $this->latestResponse->successful()) {
            throw new Exception($this->latestResponse->body());
        }

        return $this->latestResponse;
    }
}
