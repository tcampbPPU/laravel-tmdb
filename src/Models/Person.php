<?php

namespace Tcamp\Tmdb\Models;

use Carbon\Carbon;

class Person
{
    /**
     * Struct for Person object
     *
     * @param bool $adult
     * @param array<string> $also_known_as
     * @param string $biography
     * @param string $birthday
     * @param string $deathday
     * @param int $gender
     * @param string $homepage
     * @param int $id
     * @param string $imdb_id
     * @param string $known_for_department
     * @param string $name
     * @param string $place_of_birth
     * @param float $popularity
     * @param string $profile_path
     * @return self
     */
    public function __construct(
        public bool $adult,
        public ?array $also_known_as = null,
        public string $biography,
        public string $birthday,
        public ?string $deathday = null,
        public int $gender,
        public string $homepage,
        public int $id,
        public string $imdb_id,
        public string $known_for_department,
        public string $name,
        public string $place_of_birth,
        public float $popularity,
        public string $profile_path
    ) {
        $this->birthday = Carbon::parse($birthday);
        $this->deathday = isset($deathday) ? Carbon::parse($deathday) : null;
        $this->profile_path = "https://image.tmdb.org/t/p/w500{$profile_path}";
    }
}
