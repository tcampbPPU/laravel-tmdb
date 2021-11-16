<?php

namespace Tcamp\Tmdb\Collections;

use Illuminate\Support\Collection;
use Tcamp\Tmdb\Models\AccountList;

/**
 * @method AccountList first(callable $callback = null, $default = null)
 * @method AccountList offsetGet($key)
 */
class AccountListCollection extends Collection
{
    /** @var AccountList[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new AccountList(...$item), $items);
    }
}
