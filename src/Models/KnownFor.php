<?php

namespace Tcamp\Tmdb\Models;

class KnownFor
{
    /**
     * Struct for KnownFor object
     *
     * @param string $media_type - movie|tv
     * @param int $id
     * @param string $overview
     * @param string $poster_path
     * @param array<int> $genre_ids
     * @param string $original_language
     * @param string $backdrop_path
     * @param float $popularity
     * @param int $vote_count
     * @param float $vote_average
     * @param bool $adult
     * @param string $release_date
     * @param string $original_title
     * @param string $title
     * @param bool $video
     * @param string $first_air_date
     * @param array<string> $origin_country
     * @param string $name
     * @param string $original_name
     * @return self
     */
    public function __construct(
        public string $media_type,
        public ?int $id = null,
        public ?string $overview = null,
        public ?string $poster_path = null,
        public ?array $genre_ids = null,
        public ?string $original_language = null,
        public ?string $backdrop_path = null,
        public ?float $popularity = null,
        public ?int $vote_count = null,
        public ?float $vote_average = null,
        public ?bool $adult = null,
        public ?string $release_date = null,
        public ?string $original_title = null,
        public ?string $title = null,
        public ?bool $video = null,
        public ?string $first_air_date = null,
        public ?array $origin_country = null,
        public ?string $name = null,
        public ?string $original_name = null,
    ) {
    }
}
