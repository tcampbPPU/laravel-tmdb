<?php

namespace Tcamp\Tmdb\Collections;

use Illuminate\Support\Collection;
use Tcamp\Tmdb\Models\Selection;

/**
 * @method Selection first(callable $callback = null, $default = null)
 * @method Selection offsetGet($key)
 */
class SelectionCollection extends Collection
{
    /** @var Selection[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new Selection(...$item), $items);
    }
}
