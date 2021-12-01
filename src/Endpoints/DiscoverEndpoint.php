<?php

namespace Tcamp\Tmdb\Endpoints;

use Carbon\Carbon;
use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Collections\MovieCollection;
use Tcamp\Tmdb\Exceptions\IncorrectValueException;
use Tcamp\Tmdb\Models\Pagination;

class DiscoverEndpoint
{
    protected string $sort_by = 'popularity.desc';
    protected ?string $language = null;
    protected ?string $region = null;
    protected ?string $certification_country = null;
    protected ?string $certification = null;
    protected ?string $certification_lte = null;
    protected ?string $certification_gte = null;
    protected ?bool $include_adult = null;
    protected ?bool $include_video = null;
    protected int $page = 1;
    protected ?int $primary_release_year = null;
    protected ?string $primary_release_date_gte = null;
    protected ?string $primary_release_date_lte = null;

    public function __construct(
        protected Api $api
    ) {
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

    /**
     * Dump query
     *
     * @return array
     */
    public function query():array
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
     * Set starting page
     *
     * @param int $page
     * @return $this
     */
    public function page(int $page): self
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Specify a language to query translatable fields with
     *
     * @param string $lang
     * @return self
     */
    public function language(string $lang = 'em-US'): self
    {
        $matches = (bool) preg_match("/([a-z]{2})-([A-Z]{2})/", $lang);

        if (! $matches) {
            throw new IncorrectValueException('Pattern must match the following pattern: ([a-z]{2})-([A-Z]{2})');
        }

        $this->language = $lang;

        return $this;
    }

    /**
     * Specify a ISO 3166-1 code to filter release dates. Must be uppercase.
     *
     * @param string $code
     * @return self
     */
    public function region(string $code = 'US'): self
    {
        $matches = (bool) preg_match("/^[A-Z]{2}$/", $code);

        if (! $matches) {
            throw new IncorrectValueException('Pattern must match the following pattern: ([A-Z]{2})');
        }

        $this->region = $code;

        return $this;
    }

    /**
     * Set sort by options.
     *
     * @param string $value
     * @return self
     */
    public function sort(string $value): self
    {
        $allowed = [
            'popularity.asc',
            'popularity.desc',
            'release_date.asc',
            'release_date.desc',
            'revenue.asc',
            'revenue.desc',
            'primary_release_date.asc',
            'primary_release_date.desc',
            'original_title.asc',
            'original_title.desc',
            'vote_average.asc',
            'vote_average.desc',
            'vote_count.asc',
            'vote_count.desc',
        ];

        if (! in_array($value, $allowed)) {
            throw new IncorrectValueException('Incorrect sort by value specified');
        }

        $this->sort_by = $value;

        return $this;
    }

    /**
     *
     * @param string $certification
     * @return self
     */
    public function certification(string $certification): self
    {
        $this->certification = $certification;

        return $this;
    }

    /**
     *
     * @param string $country
     * @return self
     */
    public function certificationCountry(string $country): self
    {
        $this->certification_country = $country;

        return $this;
    }

    /**
     *
     * @param string $country
     * @return self
     */
    public function certificationCountryLte(string $country): self
    {
        $this->certification_lte = $country;

        return $this;
    }

    /**
     *
     * @param string $country
     * @return self
     */
    public function certificationCountryGte(string $country): self
    {
        $this->certification_gte = $country;

        return $this;
    }

    /**
     * A filter and include or exclude adult movie
     *
     * @param bool $val
     * @return $this
     */
    public function includeAdult(bool $val = true): self
    {
        $this->include_adult = $val;

        return $this;
    }

    /**
     * A filter to include or exclude videos
     *
     * @param bool $val
     * @return $this
     */
    public function includeVideo(bool $val = true): self
    {
        $this->include_video = $val;

        return $this;
    }

    /**
     * A filter to limit the results to a specific primary release year.
     *
     * @param int $year
     * @return self
     */
    public function releaseYear(int $year): self
    {
        $this->primary_release_year = $year;

        return $this;
    }

    /**
     * Filter and only include movies that have a primary release date that is greater or equal to the specified value.
     *
     * @param string $date
     * @return self
     */
    public function releaseDateGte(string $date): self
    {
        $this->primary_release_date_gte = Carbon::parse($date)->format('Y-m-d');

        return $this;
    }

    /**
     * A filter to limit the results to a specific primary release year.
     *
     * @param string $date
     * @return self
     */
    public function releaseDateLte(string $date): self
    {
        $this->primary_release_date_lte = Carbon::parse($date)->format('Y-m-d');

        return $this;
    }
}
