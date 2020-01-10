<?php
/**
 * RakutenRms Facade
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/10 12:30
 * @since rakuten rms 1.0
 */

namespace Wareon\RakutenRms\Facades;
use Illuminate\Support\Facades\Facade;
class RakutenRms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'RakutenRms';
    }
}
