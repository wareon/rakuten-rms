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

/**
 * @method static categroiesGet()
 * @method static categroyGet()
 *
 * @method static itemSearch(array $params)
 * @method static getItem(string $itemUrl)
 * @method static itemInsert(array $itemData)
 *
 * @method static getReplaceUrl(string $url)
 *
 * @method static searchOrder(array $params)
 * @method static getOrder(array $params)
 */

class RakutenRms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'RakutenRms';
    }
}
