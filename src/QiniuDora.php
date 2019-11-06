<?php

namespace Minz\Laravel\Qiniu\Dora;

class QiniuDora
{
    public function exec()
    {
        echo "qiniu exec";
    }

    public function config()
    {
        var_dump(config("qiniuDora"));
    }
}