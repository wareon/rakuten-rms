<?php
/**
 * order api
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/14 9:12
 * @since v1.0
 */
namespace Wareon\RakutenRms\Func;

use Wareon\RakutenRms\ApiDefine;

trait Order
{
    public function getOrder($params)
    {
        $url = $this->dealUrl(ApiDefine::RMS_API_RAKUTEN_PAY_GET_ORDER);
        $ret = $this->curl($url, true, $params, ApiDefine::REQUEST_JSON);
        $msg = $this->strToUtf8($ret);
        $data = json_decode($msg, true);
        return $data;
    }

    public function searchOrder($params)
    {
        $url = $this->dealUrl(ApiDefine::RMS_API_RAKUTEN_PAY_SEARCH_ORDER);
        $ret = $this->curl($url, true, $params, ApiDefine::REQUEST_JSON);
        $msg = $this->strToUtf8($ret);
        $data = json_decode($msg, true);
        return $data;
    }
}
