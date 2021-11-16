<?php

namespace Tcamp\Tmdb\Collections;

use Illuminate\Support\Collection;
use Tcamp\Tmdb\Models\Episode;

/**
 * @method Episode first(callable $callback = null, $default = null)
 * @method Episode offsetGet($key)
 */
class EpisodeCollection extends Collection
{
    /** @var Episode[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new Episode(...$item), $items);
    }
}
