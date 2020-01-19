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
        $url = $this->dealUrl(ApiDefine::RMS_API_CATEGORY_SETS_GET);
        $ret = $this->curl($url, false);
        $msg = $this->strToUtf8($ret);
        $data = $this->xml2arr($msg);
        return $data;
    }

    public function categroiesGet()
    {
        $url = $this->dealUrl(ApiDefine::RMS_API_CATEGORIES_GET);
        $ret = $this->curl($url, false);
        $msg = $this->strToUtf8($ret);
        $data = $this->xml2arr($msg);
        return $data;
    }

    public function categroyGet()
    {
        $url = $this->dealUrl(ApiDefine::RMS_API_CATEGORY_GET);
        $ret = $this->curl($url, false);
        $msg = $this->strToUtf8($ret);
        $data = $this->xml2arr($msg);
        return $data;
    }
}
