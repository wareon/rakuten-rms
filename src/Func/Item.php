<?php
/**
 * rakuten rm item apis
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/13 17:10
 * @since dev
 */

namespace Wareon\RakutenRms\Func;

use Wareon\RakutenRms\ApiDefine;

trait Item
{
    public function itemSearch($params)
    {
        $url = $this->dealUrl(ApiDefine::RMS_API_ITEM_SEARCH);
        $ret = $this->curl($url, false, $params);
        $msg = $this->strToUtf8($ret);
        $data = $this->xml2arr($msg);
        return $data;
    }

    public function getItem($itemUrl)
    {
        $params['itemUrl'] = $itemUrl;
        $url = $this->dealUrl(ApiDefine::RMS_API_ITEM_GET);
        $ret = $this->curl($url, false, $params);
        $msg = $this->strToUtf8($ret);
        $data = $this->xml2arr($msg);
        return $data;
    }

    public function itemInsert($itemData)
    {
        $xml = $this->arr2xml($itemData);
        $url = $this->dealUrl(ApiDefine::RMS_API_ITEM_INSERT);
        $ret = $this->curl($url, true, $xml, ApiDefine::REQUEST_XML);
        $msg = $this->strToUtf8($ret);
        $data = $this->xml2arr($msg);
        return $data;
    }
}
