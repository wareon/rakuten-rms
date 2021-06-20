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
    public function topDisplay()
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_TOPDISPLAY, []);
    }

    public function topDisplayEdit($data)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_SHOP_TOPDISPLAY, $data);
    }

    public function shopLayoutImage()
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_SHOPLAYOUTIMAGE, []);
    }

    public function shopLayoutImageEdit($data)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_SHOP_SHOPLAYOUTIMAGE,$data);
    }

    public function shopLayoutCommon()
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_SHOPLAYOUTCOMMON, []);
    }

    public function shopLayoutCommonEdit($data)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_SHOP_SHOPLAYOUTCOMMON,$data);
    }

    public function naviButtonInfo($naviId)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_NAVIBUTTONINFO, ['naviId' => $naviId]);
    }

    public function naviButtonInfoEdit($data)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_SHOP_NAVIBUTTONINFO,$data);
    }

    public function naviButton()
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_NAVIBUTTON, []);
    }

    public function naviButtonEdit($data)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_SHOP_NAVIBUTTON,$data);
    }

    public function shopMaster()
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_MASTER, []);
    }

    public function shopMasterEdit($data)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_SHOP_MASTER,$data);
    }

    public function layoutTextSmall($textSmallId)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_LAYOUTTEXTSMALL, ['textSmallId' => $textSmallId]);
    }

    public function layoutLossLeader($lossLeaderId)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_LAYOUTLOSSLEADER, ['lossLeaderId' => $lossLeaderId]);
    }

    public function layoutItemMap($itemMapId)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_LAYOUTITEMMAP, ['itemMapId' => $itemMapId]);
    }

    public function layoutCategoryMap($categoryMapId)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_LAYOUTCATEGORYMAP, ['categoryMapId' => $categoryMapId]);
    }
    public function shopCalendar($params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_SHOPCALENDAR, $params);
    }

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

    public function shopAreaSoryo($patternId)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_SHOPAREASORYO, ['patternId' => $patternId]);
    }

    public function shopAreaSoryoEdit($data)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_SHOP_SHOPAREASORYO,$data);
    }

    public function delvAreaMaster($delvAreaId)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_DELVAREAMASTER, ['delvAreaId' => $delvAreaId]);
    }

    public function layoutTextLarge($textLargeId)
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_LAYOUTTEXTLARGE, ['textLargeId' => $textLargeId]);
    }

    public function layoutTextLargeEdit($data)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_SHOP_LAYOUTTEXTLARGE,$data);
    }

    public function goldTop()
    {
        return $this->queryCurl(ApiDefine::RMS_API_SHOP_GOLDTOP, []);
    }

    public function goldTopEdit($data)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_SHOP_GOLDTOP,$data);
    }

}
