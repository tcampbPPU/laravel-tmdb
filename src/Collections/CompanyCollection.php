<?php

namespace Tcamp\Tmdb\Collections;

use Illuminate\Support\Collection;
use Tcamp\Tmdb\Models\Company;

/**
 * @method Company first(callable $callback = null, $default = null)
 * @method Company offsetGet($key)
 */
class CompanyCollection extends Collection
{
    /** @var Company[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new Company(...$item), $items);
    }
}
