<?php
/**
 * Navigation api
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/4/21 9:12
 * @since v1.0
 */
namespace Wareon\RakutenRms\Func;

use Wareon\RakutenRms\ApiDefine;

trait Navigation
{
    public function navigationGenreGet($params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_NAVIGATION_GENRE, $params);
    }
}
