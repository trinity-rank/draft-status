# Draft Status

[![Latest Version on Packagist](https://img.shields.io/packagist/v/trinityrank/draft-status.svg?style=flat-square)](https://packagist.org/packages/trinityrank/draft-status)

[![Total Downloads](https://img.shields.io/packagist/dt/trinityrank/draft-status.svg?style=flat-square)](https://packagist.org/packages/trinityrank/draft-status)

---

## How To Use

1. Update database
    
    ```shell
    Make model columns nullable because draft status dremove field require validations
    ```

    Add 'status' column to model
    
    ```shell
    $table->integer('status');
    ```
    
2. Add DraftComponents to your Nova resource in fields array

    ```shell
    DraftComponents::make(),
    DraftComponents::index(),
    ```

3. Add DraftValidator trait to your Nova resources

    ```shell
    use DraftValidator;
    ```

4. Update database "status" field to "published"

    ```shell
    UPDATE [table_name] SET status = 1 WHERE 1;
    ```

---

## Installation

You can install the package via composer:

```bash
composer require trinityrank/draft-status
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
