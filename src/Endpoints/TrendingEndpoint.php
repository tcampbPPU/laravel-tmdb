<?php

namespace Tcamp\Tmdb\Endpoints;

use Tcamp\Tmdb\Api;
use Tcamp\Tmdb\Collections\MovieCollection;
use Tcamp\Tmdb\Enums\Duration;
use Tcamp\Tmdb\Enums\Type;
use Tcamp\Tmdb\Exceptions\IncorrectValueException;

class TrendingEndpoint
{
    public function __construct(
        protected Api $api
    ) {
    }

    /**
     * Get Trending Movies by type and duration values
     *
     * @param string $type all|movie|tv|person
     * @param string $duration day|week
     * @return MovieCollection
     */
    public function get(string $type = Type::MOVIE, string $duration = Duration::WEEK): MovieCollection
    {
        // Normalize
        $type = strtolower($type);
        $duration = strtolower($duration);

        // Validate
        if (! in_array($type, Type::values())) {
            throw new IncorrectValueException('Incorrect type option specified');
        }

        if (! in_array($duration, Duration::values())) {
            throw new IncorrectValueException('Incorrect duration option specified');
        }

        // Request
        $data = $this->api->get("trending/{$type}/{$duration}")->json('results');

        // Format to Collection
        $collection = new MovieCollection($data);

        return $collection;
    }
}
