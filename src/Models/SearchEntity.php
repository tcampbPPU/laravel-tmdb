<?php

namespace Tcamp\Tmdb\Models;

use Tcamp\Tmdb\Collections\KnownForCollection;

class SearchEntity
{
    /**
     * Struct for SearchEntity object
     *
     * @param string $media_type - movie|tv|person
     * @param string $poster_path
     * @param bool $adult
     * @param string $overview
     * @param string $release_date
     * @param string $original_title
     * @param array<int> $genre_ids
     * @param int $id
     * @param string $original_language
     * @param string $title
     * @param string $backdrop_path
     * @param float $popularity
     * @param int $vote_count
     * @param bool $video
     * @param float $vote_average
     * @param string $first_air_date
     * @param array<string> $origin_country
     * @param array $known_for
     * @param string $name
     * @param string $original_name
     * @param string $profile_path
     * @param int $gender
     * @param string $known_for_department
     * @return self
     */
    public function __construct(
        public ?string $media_type = null,
        public ?string $poster_path = null,
        public ?bool $adult = null,
        public ?string $overview = null,
        public ?string $release_date = null,
        public ?string $original_title = null,
        public ?array $genre_ids = null,
        public ?int $id = null,
        public ?string $original_language = null,
        public ?string $title = null,
        public ?string $backdrop_path = null,
        public ?float $popularity = null,
        public ?int $vote_count = null,
        public ?bool $video = null,
        public ?float $vote_average = null,
        public ?string $first_air_date = null,
        public ?array $origin_country = null,
        public array|KnownForCollection|null $known_for = null,
        public ?string $name = null,
        public ?string $original_name = null,
        public ?string $profile_path = null,
        public ?int $gender = null,
        public ?string $known_for_department = null,
    ) {
        $this->known_for = empty($known_for) ? null : new KnownForCollection((array) $known_for);
    }
}
