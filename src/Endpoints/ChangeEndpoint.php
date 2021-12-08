<?php

namespace Tcamp\Tmdb\Endpoints;

use Carbon\Carbon;
use DateTimeInterface;
use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Collections\ChangeCollection;
use Tcamp\Tmdb\Models\Pagination;

class ChangeEndpoint
{
    protected ?int $page = null;
    protected ?string $startDate = null;
    protected ?string $endDate = null;

    public function __construct(
        protected Api $api
    ) {
    }

    /**
     * Get a list of all of the movie ids that have been changed in the past 24 hours.
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/changes/get-movie-change-list
     *
     * @return Pagination
     */
    public function movieChangeList(): Pagination
    {
        $response = $this->api->get('movie/changes', $this->builder())
            ->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new ChangeCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
    }

    /**
     * Get a list of all of the TV show ids that have been changed in the past 24 hours
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/changes/get-tv-change-list
     *
     * @return Pagination
     */
    public function tvChangeList(): Pagination
    {
        $response = $this->api->get('tv/changes', $this->builder())
            ->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new ChangeCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
    }

    /**
     * Get a list of all of the movie ids that have been changed in the past 24 hours.
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/changes/get-person-change-list
     *
     * @return Pagination
     */
    public function personChangeList(): Pagination
    {
        $response = $this->api->get('person/changes', $this->builder())
            ->json();

        $data['page'] = data_get($response, 'page') ?? 1;
        $data['total_pages'] = data_get($response, 'total_pages') ?? 1;
        $data['total_results'] = data_get($response, 'total_results') ?? 1;
        $data['items'] = new ChangeCollection(data_get($response, 'results') ?? []);

        return new Pagination(...$data);
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
     * Filter by date FROM
     *
     * @param  string|\DateTimeInterface  $date
     * @return $this
     *
     * @throws \Carbon\Exceptions\InvalidFormatException
     */
    public function from(string|DateTimeInterface $date): self
    {
        $this->startDate = Carbon::parse($date)->format('Y-m-d H:i:s');

        return $this;
    }

    /**
     * Filter by date TO
     *
     * @param  string|\DateTimeInterface  $date
     * @return $this
     *
     * @throws \Carbon\Exceptions\InvalidFormatException
     */
    public function to(string|DateTimeInterface $date): self
    {
        $this->endDate = Carbon::parse($date)->format('Y-m-d H:i:s');

        return $this;
    }

    /**
     * Filter by date
     *
     * @param  string|\DateTimeInterface  $from
     * @param  string|\DateTimeInterface  $to
     * @return $this
     *
     * @throws \Carbon\Exceptions\InvalidFormatException
     */
    public function between(string|DateTimeInterface $from, string | DateTimeInterface $to): self
    {
        return $this->from($from)->to($to);
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
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ])
            ->whereNotNull()
            ->toArray();
    }
}
