<?php
/**
 * describe
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/14 9:12
 * @since v1.0
 */
namespace Wareon\RakutenRms\Func;

use Wareon\RakutenRms\ApiDefine;

trait Categroy
{
    public function categorySetsGet()
    {
        return $this->queryCurl(ApiDefine::RMS_API_CATEGORY_SETS_GET, []);
    }

    public function categroiesGet()
    {
        return $this->queryCurl(ApiDefine::RMS_API_CATEGORIES_GET, []);
    }

    public function categroyGet()
    {
        return $this->queryCurl(ApiDefine::RMS_API_CATEGORY_GET, []);
    }
}
