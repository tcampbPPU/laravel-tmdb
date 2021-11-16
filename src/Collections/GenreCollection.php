<?php

namespace Tcamp\Tmdb\Collections;

use Illuminate\Support\Collection;
use Tcamp\Tmdb\Models\Genre;

/**
 * @method Genre first(callable $callback = null, $default = null)
 * @method Genre offsetGet($key)
 */
class GenreCollection extends Collection
{
    /** @var Genre[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new Genre(...$item), $items);
    }
}
