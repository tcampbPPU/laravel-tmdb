<?php

namespace Tcamp\Tmdb\Endpoints;

use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Collections\MovieCollection;
use Tcamp\Tmdb\Models\Pagination;
use Tcamp\Tmdb\Traits\QueryBuilder;

class SearchEndpoint
{
    use QueryBuilder;

    protected int $page = 1;
    protected string $query = ''; // URL encoded
    protected ?string $language = null;
    protected ?bool $include_adult = null;
    protected ?string $region = null;
    protected ?int $year = null;
    protected ?int $primary_release_year = null;
    protected ?int $first_air_date_year = null;

    public function __construct(
        protected Api $api,
    ) {
    }

    /**
     * Dump query builder
     *
     * @return array
     */
    public function builder(): array
    {
        return collect([
            'page' => $this->page,
            'language' => $this->language,
            'query' => $this->query,
            'include_adult' => $this->include_adult,
            'region' => $this->region,
            'year' => $this->year,
            'primary_release_year' => $this->primary_release_year,
            'first_air_date_year' => $this->first_air_date_year,
        ])
            ->whereNotNull()
            ->toArray();
    }

    /**
     * Search Companies
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/search/search-companies
     *
     * @return Pagination
     */
    public function companies(): Pagination
    {
        $response = $this->api->get('search/company', $this->builder())->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new MovieCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
    }

    /**
     * Search Collections
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/search/search-collections
     *
     * @return Pagination
     */
    public function collections(): Pagination
    {
        $response = $this->api->get('search/collection', $this->builder())->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new MovieCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
    }

    /**
     * Search Keywords
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/search/search-keywords
     *
     * @return Pagination
     */
    public function keywords(): Pagination
    {
        $response = $this->api->get('search/keyword', $this->builder())->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new MovieCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
    }

    /**
     * Search Movies
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/search/search-movies
     *
     * @return Pagination
     */
    public function movies(): Pagination
    {
        $response = $this->api->get('search/movie', $this->builder())->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new MovieCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
    }

    /**
     * Search TV Shows
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/search/search-tv-shows
     *
     * @return Pagination
     */
    public function shows(): Pagination
    {
        $response = $this->api->get('search/tv', $this->builder())->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new MovieCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
    }

    /**
     * Search People
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/search/search-people
     *
     * @return Pagination
     */
    public function people(): Pagination
    {
        $response = $this->api->get('search/person', $this->builder())->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new MovieCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
    }

    /**
     * Multi Search
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/search/search-multi
     *
     * @return Pagination
     */
    public function all(): Pagination
    {
        $response = $this->api->get('search/multi', $this->builder())->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new MovieCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
    }
}
