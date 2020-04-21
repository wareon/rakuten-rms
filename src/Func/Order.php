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

    public function updateOrderShipping($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SHIPPING, $params);
    }

    public function updateOrderShippingAsync($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SHIPPING_ASYNC, $params);
    }

    public function getResultUpdateOrderShippingAsync($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_GET_RESULT_UPDATE_ORDER_SHIPPING_ASYNC, $params);
    }

    public function getSubStatusList($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_GET_SUB_STATUS_LIST, $params);
    }

    public function updateOrderSubStatus($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SUB_STATUS, $params);
    }

    public function updateOrderMemo($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_MEMO, $params);
    }

    public function updateOrderRemarks($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_REMARKS, $params);
    }

    public function updateOrderSender($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SENDER, $params);
    }

    public function updateOrderSenderAfterShipping($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SENDER_AFTER_SHIPPING, $params);
    }

    public function cancelOrder($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_CANCEL_ORDER, $params);
    }

    public function cancelOrderAfterShipping($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_CANCEL_ORDER_AFTER_SHIPPING, $params);
    }

    public function updateOrderOrderer($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_ORDERER, $params);
    }

    public function updateOrderDelivery($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_DELIVERY, $params);
    }

    public function getPayment($params)
    {
        return $this->jsonCurl(ApiDefine::RMS_API_RAKUTEN_PAY_GET_PAYMENT, $params);
    }
}
