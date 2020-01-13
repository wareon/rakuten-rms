<?php
/**
 * rakuten rm item apis
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/13 17:10
 * @since dev
 */

namespace Wareon\RakutenRms\Func;

use Illuminate\Contracts\Console\Kernel;
use Wareon\RakutenRms\ApiDefine;

trait Item
{
    public function itemSearch($params)
    {
        $url = $this->dealUrl(ApiDefine::RMS_API_ITEM_SEARCH);
        $ret = $this->curl($url, false, $params);
        return $ret;
    }

    public function getItem($itemUrl)
    {
        $params['itemUrl'] = $itemUrl;
        $url = $this->dealUrl(ApiDefine::RMS_API_ITEM_GET);
        $ret = $this->curl($url, false, $params);
        return $ret;
    }
}
