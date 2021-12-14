<?php

namespace Tcamp\Tmdb\Collections;

use Illuminate\Support\Collection;
use Tcamp\Tmdb\Models\KnownFor;

/**
 * @method KnownFor first(callable $callback = null, $default = null)
 * @method KnownFor offsetGet($key)
 */
class KnownForCollection extends Collection
{
    /** @var KnownFor[] */
    protected $results = [];

    public function __construct(array $results)
    {
        $this->results = array_map(fn ($result) => new KnownFor(...$result), $results);
    }
}
