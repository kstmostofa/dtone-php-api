# Laravel dtone-php-api

A package that provides an interface between [Laravel](https://laravel.com/docs/8.x) and [Dtone API](https://dvs-api-doc.dtone.com/#section/Overview), includes Gifs.

## Installation
- [Dtone on Packagist](https://packagist.org/packages/kstmostofa/dtone-php-api)
- [Dtone on GitHub](https://github.com/kstmostofa/dtone-php-ap)


You can install the package via composer:

```bash
composer require kstmostofa/dtone-php-api
```

now you need to publish the config file with:
```bash
php artisan vendor:publish --provider="Kstmostofa\DtonePhpApi\DtoneServiceProvider" --tag="config"
```