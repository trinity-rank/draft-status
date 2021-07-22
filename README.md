# Draft Status

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nebojsa-trinityrank/laravel-disk-monitor.svg?style=flat-square)](https://packagist.org/packages/nebojsa-trinityrank/laravel-disk-monitor)
[![Total Downloads](https://img.shields.io/packagist/dt/nebojsa-trinityrank/laravel-disk-monitor.svg?style=flat-square)](https://packagist.org/packages/nebojsa-trinityrank/laravel-disk-monitor)

---

## How To Use

1. Update database
    ```shell
    Make model columns nullable
    ```
    ```shell
    Add 'status' column to model
    $table->integer('status');
    ```
2. Add DraftComponents to your Nova resource in fields array
    ```shell
    DraftComponents::make(),
    DraftComponents::index(),
    ```
3. Add DraftValidator to your Nova resource
    ```shell
    use DraftValidator;
    ```

---

## Installation

You can install the package via composer:

```bash
composer require trinity-rank/draft-status
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
