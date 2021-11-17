<?php

namespace Tcamp\Tmdb\Collections;

use Illuminate\Support\Collection;
use Tcamp\Tmdb\Models\Change;

/**
 * @method Change first(callable $callback = null, $default = null)
 * @method Change offsetGet($key)
 */
class ChangeCollection extends Collection
{
    /** @var Change[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new Change(...$item), $items);
    }
}
