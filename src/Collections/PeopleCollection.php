<?php

namespace Tcamp\Tmdb\Collections;

use Illuminate\Support\Collection;
use Tcamp\Tmdb\Models\Person;

/**
 * @method Person first(callable $callback = null, $default = null)
 * @method Person offsetGet($key)
 */
class PeopleCollection extends Collection
{
    /** @var Person[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new Person(...$item), $items);
    }
}
