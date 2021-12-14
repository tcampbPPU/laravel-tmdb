<?php

namespace Tcamp\Tmdb\Collections;

use Illuminate\Support\Collection;
use Tcamp\Tmdb\Models\SearchEntity;

/**
 * @method SearchEntity first(callable $callback = null, $default = null)
 * @method SearchEntity offsetGet($key)
 */
class SearchEntityCollection extends Collection
{
    /** @var SearchEntity[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new SearchEntity(...$item), $items);
    }
}
