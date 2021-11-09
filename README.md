# The Movie Database Laravel API Client

> Still Work in Progress

This package is a wrapper for [The Movie Database](https://www.themoviedb.org/documentation/api) API.

## Installation

This version supports PHP 8.0. You can install the package via composer:

```bash
composer require tcamp/tmdb
```

## Usage
// TODO:

## Laravel
This package contains a facade and a config file for Laravel applications.

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Tcamp\Tmdb\FathomServiceProvider" --tag="tmdb-config"
```

This is the contents of the published config file:

```php
return [
    'token' => env('TMDB_TOKEN'),
];

```

Update the config file directly, or set the environment variable `TMDB_TOKEN` to your API key (*preferred*).


## Testing

```bash
composer test
```

## Credits

- [Tanner Campbell](https://github.com/tcampbPPU)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
