<?php

namespace Tcamp\Tmdb\Endpoints;

use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Collections\MovieCollection;
use Tcamp\Tmdb\Models\Pagination;
use Tcamp\Tmdb\Traits\QueryBuilder;

class DiscoverEndpoint
{
    use QueryBuilder;

    protected int $page = 1;
    protected string $sort_by = 'popularity.desc';
    protected ?string $language = null;
    protected ?string $region = null;
    protected ?string $certification_country = null;
    protected ?string $certification = null;
    protected ?string $certification_lte = null;
    protected ?string $certification_gte = null;
    protected ?bool $include_adult = null;
    protected ?bool $include_video = null;
    protected ?int $primary_release_year = null;
    protected ?string $primary_release_date_gte = null;
    protected ?string $primary_release_date_lte = null;

    public function __construct(
        protected Api $api
    ) {
    }

    /**
     * Dump query
     *
     * @return array
     */
    public function query(): array
    {
        return collect([
            'page' => $this->page,
            'language' => $this->language,
            'region' => $this->region,
            'sort_by' => $this->sort_by,
            'certification' => $this->certification,
            'certification_country' => $this->certification_country,
            'certification_lte' => $this->certification_lte,
            'certification_gte' => $this->certification_gte,
            'include_adult' => $this->include_adult,
            'include_video' => $this->include_video,
            'primary_release_year' => $this->primary_release_year,
        ])
            ->whereNotNull()
            ->toArray();
    }

    /**
     * Discover movies by different types
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/discover/movie-discover
     *
     * @return Pagination
     */
    public function movies(): Pagination
    {
        $response = $this->api->get('discover/movie', $this->query())->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new MovieCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
    }

    /**
     * Discover movies by different types
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/discover/tv-discover
     *
     * @return Pagination
     */
    public function shows(): Pagination
    {
        $response = $this->api->get('discover/tv', $this->query())->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new MovieCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
    }
}
