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

- 1.After installing the library, add the follow code to your `config/app.php` file:

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

- 2.publish config file `config/qiniuDora.php`
```shell
php artisan vendor:publish --provider="Minz\Laravel\Qiniu\Dora\QiniuDoraServiceProvider"
```

- 3.Add .env params to your `.env` file

```shell
QINIU_ACCESS_KEY=your qiniu access key
QINIU_SECRET_KEY=your qiniu secret key
QINIU_BUCKET=your qiniu bucket name
```

## Usage
<p align="center">
<a href="https://developer.qiniu.com/dora/api/1291/persistent-data-processing-pfop">qiniu dira</a> 七牛智能多媒体服务开发者文档 <br>
<a href="https://github.com/qiniu/php-sdk">qiniu/php-sdk</a> 七牛PHP SDK
</p>

* Api document
```php
/**
     * 对资源文件进行异步持久化处理
     *
     * @param string $fileKey 存储于bucket中的资源key
     * @param $fops string|array  待处理的pfop操作，多个pfop操作以array的形式传入。
     *                    eg. avthumb/mp3/ab/192k, vframe/jpg/offset/7/w/480/h/360
     * @param string|null $pipeline 多媒体队列名称
     * @param string|null $notifyUrl 回调服务器地址
     * @param bool $force 如果key相同是否强制覆盖object 默认为false
     * @return array (返回持久化处理的persistentId, 返回的错误)
     */
    public function execute(string $fileKey, $fops, string $pipeline = null, string $notifyUrl = null, bool $force = false)
```

* use
```php
    #打水印图片公共读地址
    $imgUrl = "http:yourPictireUrl";
    #七牛kodo资源名称
    $fileKey = "demo.wmv";
    #打水印后视频另存为地址 必须为 bucket:saveKey base64Encode
    $videoSaveKey = config('qiniuDora.bucket') . ":" . "yourVideoSaveKey";
    #截取视频某个帧另存为图片 必须为 bucket:saveKey base64Encode
    $pictureSaveKey = config('qiniuDora.bucket') . ":" . "yourPictureSaveKey";
    //格式请参考七牛dora api 文档
    $fops = [
        "avthumb/mp4/r/15/vb/256k/vcodec/libx264/ab/64k/acodec/libfaac/wmImage/" . base64_encode($imgUrl) . "|saveas/" . base64_encode($videoSaveKey),
        "vframe/jpg/offset/5|saveas/" . base64_encode($pictureSaveKey)
    ];
    list($id, $err) = Dora::execute($fileKey, $fops, "samaebook-test");    
```


## depend

-   [qiniu/php-sdk](https://github.com/qiniu/php-sdk">qiniu/php-sdk)
## License

MIT
