<?php

namespace Tcamp\Tmdb\Traits;

use Carbon\Carbon;
use Tcamp\Tmdb\Exceptions\IncorrectValueException;

trait QueryBuilder
{
    /**
     * Set search query
     *
     * @param int $page
     * @return self
     */
    public function page(int $page): ?self
    {
        if (! property_exists($this, 'page')) {
            return null;
        }

        $this->page = $page;

        return $this;
    }

    /**
     * Set starting page
     *
     * @param string $search
     * @return self
     */
    public function search(string $search): ?self
    {
        if (! property_exists($this, 'query')) {
            return null;
        }

        $this->query = $search;

        return $this;
    }

    /**
     * Specify a language to query translatable fields with
     *
     * @param string $lang
     * @return self
     */
    public function language(string $lang = 'em-US'): ?self
    {
        if (! property_exists($this, 'language')) {
            return null;
        }

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
    public function region(string $code = 'US'): ?self
    {
        if (! property_exists($this, 'region')) {
            return null;
        }

        $matches = (bool) preg_match("/^[A-Z]{2}$/", $code);

        if (! $matches) {
            throw new IncorrectValueException('Pattern must match the following pattern: ([A-Z]{2})');
        }

        $this->region = $code;

        return $this;
    }

    /**
     * A filter and include or exclude adult movie
     *
     * @param bool $val
     * @return self
     */
    public function includeAdult(bool $val = true): ?self
    {
        if (! property_exists($this, 'include_adult')) {
            return null;
        }

        $this->include_adult = $val;

        return $this;
    }

    /**
     * A filter to limit the results to a specific year.
     *
     * @param int $year
     * @return self
     */
    public function year(int $year): ?self
    {
        if (! property_exists($this, 'year')) {
            return null;
        }

        $this->year = $year;

        return $this;
    }

    /**
     * A filter to limit the results to a specific primary release year.
     *
     * @param int $year
     * @return self
     */
    public function releaseYear(int $year): ?self
    {
        if (! property_exists($this, 'primary_release_year')) {
            return null;
        }

        $this->primary_release_year = $year;

        return $this;
    }

    /**
     * A filter to limit the results to a specific first air date year
     *
     * @param int $year
     * @return self
     */
    public function firstAirDate(int $year): ?self
    {
        if (! property_exists($this, 'first_air_date_year')) {
            return null;
        }

        $this->first_air_date_year = $year;

        return $this;
    }

    /**
     * Set sort by options.
     *
     * @param string $value
     * @return self
     */
    public function sort(string $value): ?self
    {
        if (! property_exists($this, 'sort_by')) {
            return null;
        }

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
    public function certification(string $certification): ?self
    {
        if (! property_exists($this, 'certification')) {
            return null;
        }

        $this->certification = $certification;

        return $this;
    }

    /**
     *
     * @param string $country
     * @return self
     */
    public function certificationCountry(string $country): ?self
    {
        if (! property_exists($this, 'certification_country')) {
            return null;
        }

        $this->certification_country = $country;

        return $this;
    }

    /**
     *
     * @param string $country
     * @return self
     */
    public function certificationCountryLte(string $country): ?self
    {
        if (! property_exists($this, 'certification_lte')) {
            return null;
        }

        $this->certification_lte = $country;

        return $this;
    }

    /**
     *
     * @param string $country
     * @return self
     */
    public function certificationCountryGte(string $country): ?self
    {
        if (! property_exists($this, 'certification_gte')) {
            return null;
        }

        $this->certification_gte = $country;

        return $this;
    }

    /**
     * A filter to include or exclude videos
     *
     * @param bool $val
     * @return $this
     */
    public function includeVideo(bool $val = true): ?self
    {
        if (! property_exists($this, 'include_video')) {
            return null;
        }

        $this->include_video = $val;

        return $this;
    }

    /**
     * Filter and only include movies that have a primary release date that is greater or equal to the specified value.
     *
     * @param string $date
     * @return self
     */
    public function releaseDateGte(string $date): ?self
    {
        if (! property_exists($this, 'primary_release_date_gte')) {
            return null;
        }

        $this->primary_release_date_gte = Carbon::parse($date)->format('Y-m-d');

        return $this;
    }

    /**
     * A filter to limit the results to a specific primary release year.
     *
     * @param string $date
     * @return self
     */
    public function releaseDateLte(string $date): ?self
    {
        if (! property_exists($this, 'primary_release_date_lte')) {
            return null;
        }

        $this->primary_release_date_lte = Carbon::parse($date)->format('Y-m-d');

        return $this;
    }
}
