<?php

namespace Tcamp\Tmdb\Collections;

use Tcamp\Tmdb\Models\Movie;
use Illuminate\Support\Collection;

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
