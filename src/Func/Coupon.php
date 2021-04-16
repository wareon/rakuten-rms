<?php

/**
 * coupon api
 *
 * @author nori6272
 * @date 2020/4/16 10:45
 * @since v1.0
 */

namespace Wareon\RakutenRms\Func;

use Wareon\RakutenRms\ApiDefine;

trait Coupon
{
    // Coupon

    /**
     * getCoupons
     *
     * @param string $code クーポン全取得
     * @return array
     */
    public function couponGetAll()
    {
        return $this->queryCurl(ApiDefine::RMS_API_RAKUTEN_COUPON_SEARCH, []);
    }

    /**
     * getCoupon
     *
     * @param string $code クーポンコード
     * @return array
     */
    public function couponGet(string $code)
    {
        $params['couponCode'] = $code;
        return $this->queryCurl(ApiDefine::RMS_API_RAKUTEN_COUPON_GET, $params);
    }

    /**
     * searchCoupon
     *
     * @param array $params 検索条件
     *
     * @return array
     */
    public function couponSearch(array $params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_RAKUTEN_COUPON_SEARCH, $params);
    }

    /**
     * couponInsert
     *
     * @param array $body クーポン詳細
     *
     * @return array
     */
    public function couponInsert(array $body)
    {
        $data = ['request' => [
            'couponIssueRequest' => [
                'coupon' => $body
            ]
        ]];
        return $this->xmlCurl(ApiDefine::RMS_API_RAKUTEN_COUPON_ISSUE, $data);
    }

    /**
     * couponUpdate
     *
     * @param array $body クーポン詳細
     *
     * @return array
     */
    public function couponUpdate(array $body)
    {
        $data = ['request' => [
            'couponUpdateRequest' => [
                'coupon' => $body
            ]
        ]];

        return $this->xmlCurl(ApiDefine::RMS_API_RAKUTEN_COUPON_UPDATE, $data);
    }

    public function couponDelete(string $code)
    {
        $data = ['request' => [
            'couponDeleteRequest' => ['coupon' => ['couponCode' => $code]]
        ]];

        return $this->xmlCurl(ApiDefine::RMS_API_RAKUTEN_COUPON_DELETE, $data);
    }

    // ThanksCoupon
    public function thanksCouponGetAll()
    {
        return $this->queryCurl(ApiDefine::RMS_API_RAKUTEN_THANKSCOUPON_BASE, []);
    }

    public function thanksCouponGet(int $couponId)
    {
        return $this->queryCurl(ApiDefine::RMS_API_RAKUTEN_THANKSCOUPON_BASE . "/$couponId", []);
    }

    public function thanksCouponSearch(array $params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_RAKUTEN_THANKSCOUPON_BASE, $params);
    }

    public function thanksCouponInsert(array $body)
    {
        $data = ['request' => [
            'thanksCoupon' => $body
        ]];
        return $this->xmlCurl(ApiDefine::RMS_API_RAKUTEN_THANKSCOUPON_BASE, $data);
    }

    public function thanksCouponUpdate(int $couponId, array $body)
    {
        $data = ['request' => [
            'thanksCoupon' => $body
        ]];
        return $this->xmlCurl(ApiDefine::RMS_API_RAKUTEN_THANKSCOUPON_BASE . "/$couponId", $data);
    }

    public function thanksCouponStop(int $couponId)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_RAKUTEN_THANKSCOUPON_BASE . "/$couponId/issuestatus/stop", []);
    }
}
