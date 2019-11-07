<?php


namespace Minz\Laravel\Qiniu\Dora;


use Throwable;
use Exception;

class QiniuDoraException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}