<?php

namespace Tcamp\Tmdb\Collections;

use Illuminate\Support\Collection;
use Tcamp\Tmdb\Models\Provider;

/**
 * @method Provider first(callable $callback = null, $default = null)
 * @method Provider offsetGet($key)
 */
class ProviderCollection extends Collection
{
    /** @var Provider[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new Provider(...$item), $items);
    }
}
