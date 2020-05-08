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

trait InquiryManagement
{
    public function inquiriesCount($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_INQUIRIES_COUNT, $params, false);
    }

    public function inquiriesGet($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_INQUIRIES_GET, $params, false);
    }

    public function inquiryGet($inquiryNumber)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_INQUIRY_GET . $inquiryNumber, [], false);
    }

    public function inquiryReply($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_INQUIRY_REPLY, $params, true);
    }

    public function inquiryAttachment($params)
    {
        $url = $this->dealUrl(ApiDefine::RMS_API_INQUIRY_ATTACHMENT);
        $ret = $this->curl($url, true, $params, ApiDefine::REQUEST_FILE);
        $msg = $this->strToUtf8($ret);
        $data = json_decode($msg, true);
        return $data;
    }

    public function inquiryAttachmentGet($params)
    {
        $url = $this->dealUrl(ApiDefine::RMS_API_INQUIRY_ATTACHMENT_GET);
        return $this->curl($url, false, $params, ApiDefine::REQUEST_ALL);
    }
}
