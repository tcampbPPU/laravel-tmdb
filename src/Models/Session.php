<?php

namespace Tcamp\Tmdb\Models;

use Carbon\Carbon;

class Session
{
    /**
     * Struct for Session object
     *
     * @param bool $success
     * @param string $expires_at
     * @param string $request_token
     * @return self
     */
    public function __construct(
        public bool $success,
        public ?string $expires_at = null,
        public ?string $request_token = null
    ) {
        $this->expires_at = Carbon::parse($expires_at);
    }
}
