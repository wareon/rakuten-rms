<?php
/**
 * product api
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/4/21 9:12
 * @since v1.0
 */
namespace Wareon\RakutenRms\Func;

use Wareon\RakutenRms\ApiDefine;

trait Shop
{
    public function delvdateMaster($params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_DELVDATE_MASTER, $params);
    }
    
    public function deliverySetInfo($params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_DELIVERY_SET_INFO, $params);
    }

    public function soryoKbn($params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_SORYOKBN, $params);
    }

}
