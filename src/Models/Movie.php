<?php

namespace Tcamp\Tmdb\Models;

use Carbon\Carbon;

class Movie
{
    public function __construct(
        public bool $adult,
        public string $backdrop_path,
        public array $genre_ids,
        public int $id,
        public string $original_language,
        public string $original_title,
        public string $overview,
        public float $popularity,
        public string $poster_path,
        public string $release_date,
        public string $title,
        public bool $video,
        public float $vote_average,
        public float $vote_count,
    ) {
        $this->poster_path = "https://image.tmdb.org/t/p/w500{$poster_path}";
        $this->release_date = Carbon::parse($release_date);
    }
}
