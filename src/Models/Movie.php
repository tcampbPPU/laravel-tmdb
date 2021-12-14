<?php

namespace Tcamp\Tmdb\Models;

use Carbon\Carbon;

class Movie
{
    /**
     * Struct for Movie object
     *
     * @param bool $adult
     * @param string $backdrop_path
     * @param int $id
     * @param string $original_language
     * @param string $original_title
     * @param string $overview
     * @param float $popularity
     * @param string $poster_path
     * @param string $release_date
     * @param string $title
     * @param bool $video
     * @param float $vote_average
     * @param float $vote_count
     * @param string $name
     * @param array $origin_country
     * @param string $original_name
     * @param string $first_air_date
     * @param array<int> $genre_ids
     * @param array{id:int, logo_path:string, name:string} $genres
     * @param array{id:int, logo_path:string, name:string, poster_path:string, backdrop_path:string} $belongs_to_collection
     * @param int $budget
     * @param string $homepage
     * @param string $imdb_id
     * @param array{id:int, logo_path:string, name:string, origin_country:string} $production_companies
     * @param array{iso_3166_1:string, name:string} $production_countries
     * @param int $revenue
     * @param int $runtime
     * @param int $gender
     * @param array{english_name:string, iso_639_1:string, name:string} $spoken_languages
     * @param string $status
     * @param string $tagline
     * @return self
     */
    public function __construct(
        public int $id,
        public string $original_language,
        public string $overview,
        public float $popularity,
        public float $vote_average,
        public float $vote_count,
        public ?string $poster_path = null,
        public ?string $title = null,
        public ?bool $video = null,
        public ?string $backdrop_path = null,
        public ?string $release_date = null,
        public ?string $original_title = null,
        public ?bool $adult = null,
        public ?string $name = null,
        public ?string $original_name = null,
        public ?array $origin_country = null,
        public ?string $first_air_date = null,
        public ?array $genre_ids = null,
        public ?array $genres = null,
        public ?array $belongs_to_collection = null,
        public ?int $budget = null,
        public ?string $homepage = null,
        public ?string $imdb_id = null,
        public ?array $production_companies = null,
        public ?array $production_countries = null,
        public ?int $revenue = null,
        public ?int $runtime = null,
        public ?int $gender = null,
        public ?array $spoken_languages = null,
        public ?string $status = null,
        public ?string $tagline = null,
    ) {
        $this->backdrop_path = isset($backdrop_path) ? "https://image.tmdb.org/t/p/w500{$backdrop_path}" : null;
        $this->poster_path = "https://image.tmdb.org/t/p/w500{$poster_path}";
        $this->release_date = Carbon::parse($release_date);
        $this->first_air_date = isset($first_air_date) ? Carbon::parse($first_air_date) : null;
    }
}
