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
    public function itemSearch($params, $ver = ApiDefine::VER)
    {
        if($ver == ApiDefine::VER) return $this->queryCurl(ApiDefine::RMS_API_ITEM_SEARCH, $params);
        else return $this->jsonCurl(ApiDefine::RMS_API_ITEM_SEARCH2, $params, false);
    }

    public function getItem($itemUrl, $ver = ApiDefine::VER)
    {
        if($ver == ApiDefine::VER) {
            $params['itemUrl'] = $itemUrl;
            return $this->queryCurl(ApiDefine::RMS_API_ITEM_GET, $params);
        } else {
            return $this->jsonCurl(ApiDefine::RMS_API_ITEM_GET2 . $itemUrl, [], false);
        }
    }

    public function itemInsert($itemData, $ver = ApiDefine::VER)
    {
        if($ver == ApiDefine::VER) {
            return $this->xmlCurl(ApiDefine::RMS_API_ITEM_INSERT, $itemData);
        } else {
            $manageNumber = $itemData['manageNumber'] ?? '';
            unset($itemData['manageNumber']);
            return $this->jsonCustomerCurl(ApiDefine::RMS_API_ITEM_INSERT2 . $manageNumber, $itemData, 'PUT');
        }
    }

    public function itemUpdate($itemData, $ver = ApiDefine::VER)
    {
        if($ver == ApiDefine::VER) {
            return $this->xmlCurl(ApiDefine::RMS_API_ITEM_UPDATE, $itemData);
        } else {
            $manageNumber = $itemData['manageNumber'] ?? '';
            unset($itemData['manageNumber']);
            return $this->jsonCustomerCurl(ApiDefine::RMS_API_ITEM_UPDATE2 . $manageNumber, $itemData, 'PUT');
        }
    }

    public function itemDelete($itemData, $ver = ApiDefine::VER)
    {
        if($ver == ApiDefine::VER) {
            return $this->xmlCurl(ApiDefine::RMS_API_ITEM_DELETE, $itemData);
        } else {
            $manageNumber = $itemData['manageNumber'] ?? '';
            unset($itemData['manageNumber']);
            return $this->jsonCustomerCurl(ApiDefine::RMS_API_ITEM_UPDATE2 . $manageNumber, $itemData, 'DELETE');
        }
    }

    public function itemsUpdate($itemsData, $ver = ApiDefine::VER)
    {
        if($ver == ApiDefine::VER) {
            return $this->xmlCurl(ApiDefine::RMS_API_ITEMS_UPDATE, $itemsData);
        } else {
            $manageNumber = $itemData['manageNumber'] ?? '';
            unset($itemData['manageNumber']);
            return $this->jsonCustomerCurl(ApiDefine::RMS_API_ITEM_UPDATE2 . $manageNumber, $itemData, 'PATCH');
        }
    }
}
