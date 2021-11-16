<?php

namespace Tcamp\Tmdb\Models;

class Account
{
    /**
     * Struct for Account object
     *
     * @param int $id
     * @param string $iso_639_1
     * @param string $iso_3166_1
     * @param string $name
     * @param bool $include_adult
     * @param string $username
     * @param array $avatar
     * @param string $avatar_url
     * @return self
     */
    public function __construct(
        public int $id,
        public string $iso_639_1,
        public string $iso_3166_1,
        public string $name,
        public bool $include_adult,
        public string $username,
        public ?array $avatar = null,
        public ?string $avatar_url = null,
    ) {
        $gravatarHash = null;
        if (! is_null($avatar) && isset($avatar['gravatar']) && $avatar['gravatar']['hash']) {
            $gravatarHash = $avatar['gravatar']['hash'];
        }
        $this->avatar_url = ! is_null($gravatarHash) ? "https://www.gravatar.com/avatar/{$gravatarHash}" : null;
    }
}
