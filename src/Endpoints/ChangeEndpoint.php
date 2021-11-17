<?php

namespace Tcamp\Tmdb\Endpoints;

use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Collections\ChangeCollection;

class ChangeEndpoint
{
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
     * @param int $page
     * @param string $endDate
     * @param string $startDate
     * @return ChangeCollection
     */
    public function movieChangeList(int $page = 1, ?string $endDate = null, ?string $startDate = null): ChangeCollection
    {
        $data = $this->api->get('movie/changes', [
            'page' => $page,
            'end_date' => $endDate,
            'start_date' => $startDate,
        ])
            ->json('results');

        $collection = new ChangeCollection($data);

        return $collection;
    }

    /**
     * Get a list of all of the TV show ids that have been changed in the past 24 hours
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/changes/get-tv-change-list
     *
     * @param int $page
     * @param string $endDate
     * @param string $startDate
     * @return ChangeCollection
     */
    public function tvChangeList(int $page = 1, ?string $endDate = null, ?string $startDate = null): ChangeCollection
    {
        $data = $this->api->get('tv/changes', [
            'page' => $page,
            'end_date' => $endDate,
            'start_date' => $startDate,
        ])
            ->json('results');

        $collection = new ChangeCollection($data);

        return $collection;
    }

    /**
     * Get a list of all of the movie ids that have been changed in the past 24 hours.
     *
     * @api GET
     * @see https://developers.themoviedb.org/3/changes/get-person-change-list
     *
     * @param int $page
     * @param string $endDate
     * @param string $startDate
     * @return ChangeCollection
     */
    public function personChangeList(int $page = 1, ?string $endDate = null, ?string $startDate = null): ChangeCollection
    {
        $data = $this->api->get('person/changes', [
            'page' => $page,
            'end_date' => $endDate,
            'start_date' => $startDate,
        ])
            ->json('results');

        $collection = new ChangeCollection($data);

        return $collection;
    }
}
