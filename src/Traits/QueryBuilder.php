<?php

namespace Tcamp\Tmdb\Traits;

use Tcamp\Tmdb\Exceptions\IncorrectValueException;

trait QueryBuilder
{
    /**
     * Set search query
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
     * Set starting page
     *
     * @param string $search
     * @return $this
     */
    public function search(string $search): self
    {
        $this->query = $search;

        return $this;
    }

    /**
     * Specify a language to query translatable fields with
     *
     * @param string $lang
     * @return self
     */
    public function language(string $lang = 'em-US'): self
    {
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
    public function region(string $code = 'US'): self
    {
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
     * @return $this
     */
    public function includeAdult(bool $val = true): self
    {
        $this->include_adult = $val;

        return $this;
    }

    /**
     * A filter to limit the results to a specific year.
     *
     * @param int $year
     * @return self
     */
    public function year(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * A filter to limit the results to a specific primary release year.
     *
     * @param int $year
     * @return self
     */
    public function releaseYear(int $year): self
    {
        $this->primary_release_year = $year;

        return $this;
    }

    /**
     * A filter to limit the results to a specific first air date year
     *
     * @param int $year
     * @return self
     */
    public function firstAirDate(int $year): self
    {
        $this->first_air_date_year = $year;

        return $this;
    }

}
