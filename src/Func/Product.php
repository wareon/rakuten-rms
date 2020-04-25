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

trait Product
{
    public function productSearch($params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_PRODUCT_SEARCH, $params);
    }
}
