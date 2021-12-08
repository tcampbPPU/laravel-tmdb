<?php

namespace Tcamp\Tmdb\Traits;

use Carbon\Carbon;
use Tcamp\Tmdb\Exceptions\IncorrectValueException;
use Tcamp\Tmdb\Exceptions\InvalidPropertyException;

trait QueryBuilder
{
    /**
     * Set search query
     *
     * @param int $page
     * @return self
     * @throws InvalidPropertyException
     */
    public function page(int $page): self
    {
        if (! property_exists($this, 'page')) {
            throw new InvalidPropertyException('Property page does not exists on' . $this::class);
        }

        $this->page = $page;

        return $this;
    }

    /**
     * Set query field
     *
     * @param string $search
     * @return self
     * @throws InvalidPropertyException
     */
    public function query(string $search): self
    {
        if (! property_exists($this, 'query')) {
            throw new InvalidPropertyException('Property query does not exists on' . $this::class);
        }

        $this->query = $search;

        return $this;
    }

    /**
     * Specify a language to query translatable fields with
     *
     * @param string $lang
     * @return self
     * @throws InvalidPropertyException
     */
    public function language(string $lang = 'em-US'): self
    {
        if (! property_exists($this, 'language')) {
            throw new InvalidPropertyException('Property language does not exists on' . $this::class);
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
      * @throws InvalidPropertyException
      */
    public function region(string $code = 'US'): self
    {
        if (! property_exists($this, 'region')) {
            throw new InvalidPropertyException('Property region does not exists on' . $this::class);
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
     * @throws InvalidPropertyException
     */
    public function includeAdult(bool $val = true): self
    {
        if (! property_exists($this, 'include_adult')) {
            throw new InvalidPropertyException('Property include_adult does not exists on' . $this::class);
        }

        $this->include_adult = $val;

        return $this;
    }

    /**
     * A filter to limit the results to a specific year.
     *
     * @param int $year
     * @return self
     * @throws InvalidPropertyException
     */
    public function year(int $year): self
    {
        if (! property_exists($this, 'year')) {
            throw new InvalidPropertyException('Property year does not exists on' . $this::class);
        }

        $this->year = $year;

        return $this;
    }

    /**
     * A filter to limit the results to a specific primary release year.
     *
     * @param int $year
     * @return self
     * @throws InvalidPropertyException
     */
    public function releaseYear(int $year): self
    {
        if (! property_exists($this, 'primary_release_year')) {
            throw new InvalidPropertyException('Property primary_release_year does not exists on' . $this::class);
        }

        $this->primary_release_year = $year;

        return $this;
    }

    /**
     * A filter to limit the results to a specific first air date year
     *
     * @param int $year
     * @return self
     * @throws InvalidPropertyException
     */
    public function firstAirDate(int $year): self
    {
        if (! property_exists($this, 'first_air_date_year')) {
            throw new InvalidPropertyException('Property first_air_date_year does not exists on' . $this::class);
        }

        $this->first_air_date_year = $year;

        return $this;
    }

    /**
     * Set sort by options.
     *
     * @param string $value
     * @return self
     * @throws InvalidPropertyException
     */
    public function sort(string $value): self
    {
        if (! property_exists($this, 'sort_by')) {
            throw new InvalidPropertyException('Property sort_by does not exists on' . $this::class);
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
     * @throws InvalidPropertyException
     */
    public function certification(string $certification): self
    {
        if (! property_exists($this, 'certification')) {
            throw new InvalidPropertyException('Property certification does not exists on' . $this::class);
        }

        $this->certification = $certification;

        return $this;
    }

    /**
     *
     * @param string $country
     * @return self
     * @throws InvalidPropertyException
     */
    public function certificationCountry(string $country): self
    {
        if (! property_exists($this, 'certification_country')) {
            throw new InvalidPropertyException('Property certification_country does not exists on' . $this::class);
        }

        $this->certification_country = $country;

        return $this;
    }

    /**
     *
     * @param string $country
     * @return self
     * @throws InvalidPropertyException
     */
    public function certificationCountryLte(string $country): self
    {
        if (! property_exists($this, 'certification_lte')) {
            throw new InvalidPropertyException('Property certification_lte does not exists on' . $this::class);
        }

        $this->certification_lte = $country;

        return $this;
    }

    /**
     *
     * @param string $country
     * @return self
     * @throws InvalidPropertyException
     */
    public function certificationCountryGte(string $country): self
    {
        if (! property_exists($this, 'certification_gte')) {
            throw new InvalidPropertyException('Property certification_gte does not exists on' . $this::class);
        }

        $this->certification_gte = $country;

        return $this;
    }

    /**
     * A filter to include or exclude videos
     *
     * @param bool $val
     * @return $this
     * @throws InvalidPropertyException
     */
    public function includeVideo(bool $val = true): self
    {
        if (! property_exists($this, 'include_video')) {
            throw new InvalidPropertyException('Property include_video does not exists on' . $this::class);
        }

        $this->include_video = $val;

        return $this;
    }

    /**
     * Filter and only include movies that have a primary release date that is greater or equal to the specified value.
     *
     * @param string $date
     * @return self
     * @throws InvalidPropertyException
     */
    public function releaseDateGte(string $date): self
    {
        if (! property_exists($this, 'primary_release_date_gte')) {
            throw new InvalidPropertyException('Property primary_release_date_gte does not exists on' . $this::class);
        }

        $this->primary_release_date_gte = Carbon::parse($date)->format('Y-m-d');

        return $this;
    }

    /**
     * A filter to limit the results to a specific primary release year.
     *
     * @param string $date
     * @return self
     * @throws InvalidPropertyException
     */
    public function releaseDateLte(string $date): self
    {
        if (! property_exists($this, 'primary_release_date_lte')) {
            throw new InvalidPropertyException('Property primary_release_date_lte does not exists on' . $this::class);
        }

        $this->primary_release_date_lte = Carbon::parse($date)->format('Y-m-d');

        return $this;
    }
}
