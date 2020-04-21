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
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_GET_ORDER, $params);
    }

    public function searchOrder($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_SEARCH_ORDER, $params);
    }

    public function confirmOrder($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_CONFIRM_ORDER, $params);
    }
}
