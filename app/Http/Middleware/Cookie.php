<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;
class Cookie extends BaseEncrypter
{
    protected $except = [
        'my_cookie'
    ];
}
