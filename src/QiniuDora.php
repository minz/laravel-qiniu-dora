<?php

namespace Minz\Laravel\Qiniu\Dora;

use Qiniu\Auth;
use Qiniu\Processing\PersistentFop;

class QiniuDora
{
    protected $auth;
    protected $persistentFop;
    protected $accessKey;
    protected $accessSecret;
    protected $bucket;


    public function __construct()
    {
        $this->accessKey = config('qiniuDora.access_key');
        $this->accessSecret = config('qiniuDora.access_secret');
        $this->bucket = config('qiniuDora.bucket');
        if (!$this->accessKey || !$this->accessSecret || !$this->bucket) {
            throw new QiniuDoraException("please config your qiniuDora");
        }

        $this->auth = new Auth($this->accessKey, $this->accessSecret);
        $this->persistentFop = new PersistentFop($this->auth);
    }

    /**
     * 对资源文件进行异步持久化处理
     *
     * @param string $fileKey 存储于bucket中的资源key
     * @param $fops string|array  待处理的pfop操作，多个pfop操作以array的形式传入。
     *                    eg. avthumb/mp3/ab/192k, vframe/jpg/offset/7/w/480/h/360
     * @param string|null $pipeline
     * @param string|null $notifyUrl
     * @param bool $force
     * @return array (返回持久化处理的persistentId, 返回的错误)
     */
    public function execute(string $fileKey, $fops, string $pipeline = null, string $notifyUrl = null, bool $force = false)
    {
        return $this->persistentFop->execute($this->bucket, $fileKey, $fops, $pipeline, $notifyUrl, $force);
    }
}