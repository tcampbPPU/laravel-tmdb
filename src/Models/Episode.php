<?php

namespace Tcamp\Tmdb\Models;

use Carbon\Carbon;

class Episode
{
    /**
     * Struct for Episode object
     *
     * @param int $id
     * @param int $show_id
     * @param string $name
     * @param string $overview
     * @param string|int $season_number
     * @param string|int $episode_number
     * @param string $production_code
     * @param int $vote_count
     * @param int|float $rating
     * @param float $vote_average
     * @param string $air_date
     * @param string $still_path
     * @return self
     */
    public function __construct(
        public int $id,
        public int $show_id,
        public string $name,
        public string $overview,
        public string|int $season_number,
        public string|int $episode_number,
        public string $production_code,
        public int $vote_count,
        public int|float $rating,
        public float $vote_average,
        public string $air_date,
        public string $still_path
    ) {
        $this->air_date = Carbon::parse($air_date);
        $this->still_path = "https://image.tmdb.org/t/p/w500{$still_path}";
    }
}
