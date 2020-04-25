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
        return $this->queryCurl(ApiDefine::RMS_API_ITEM_SEARCH, $params);
    }

    public function getItem($itemUrl)
    {
        $params['itemUrl'] = $itemUrl;
        return $this->queryCurl(ApiDefine::RMS_API_ITEM_GET, $params);
    }

    public function itemInsert($itemData)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_ITEM_INSERT, $itemData);
    }

    public function itemUpdate($itemData)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_ITEM_UPDATE, $itemData);
    }

    public function itemDelete($itemData)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_ITEM_DELETE, $itemData);
    }

    public function itemsUpdate($itemsData)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_ITEMS_UPDATE, $itemsData);
    }
}
