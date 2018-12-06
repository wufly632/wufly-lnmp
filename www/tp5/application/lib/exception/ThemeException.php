<?php
/**
 * Created by shmilyelva
 * Date: 2018-09-20
 * Time: 9:55
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '请求的类目不存在，请检查参数';
    public $errorCode = 50000;
}

