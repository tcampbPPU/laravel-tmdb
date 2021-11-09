<?php

namespace Tcamp\Tmdb\Collections;

use Illuminate\Support\Collection;
use Tcamp\Tmdb\Models\Movie;

/**
 * @method Movie first(callable $callback = null, $default = null)
 * @method Movie offsetGet($key)
 */
class MovieCollection extends Collection
{
    /** @var Movie[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new Movie(...$item), $items);
    }
}
