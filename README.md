<h1 align="center">laravel qiniu dora package</h1>

<p align="center">
<a href="https://www.qiniu.com/products/dora">qiniu dora</a> for Laravel based on <a href="https://github.com/qiniu/php-sdk">qiniu/php-sdk</a>.
</p>



## Requirement

-   PHP >= 7.0

## Installing

```shell
$ composer require "minz/laravel-qiniu-dora" -vvv
```

## Configuration

1. After installing the library, add the follow code to your `config/app.php` file:

```php
'providers' => [
    ......
    Minz\Laravel\Qiniu\OSS\QiniuDoraServiceProvider::class,
],

'aliases' => [
    ......
    'Dora' => Minz\Laravel\Qiniu\Dora\QiniuDoraFacade::class,
],
```

> Laravel 5.5+ skip

2. Add .env params to your `.env` config:

```shell
QINIU_ACCESS_KEY=your qiniu access key
QINIU_SECRET_KEY=your qiniu secret key
```

## Usage

## depend

-   [qiniu/php-sdk](https://github.com/qiniu/php-sdk">qiniu/php-sdk)
## License

MIT
