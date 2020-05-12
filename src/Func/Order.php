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
    public $orderDebug = false;

    public function getOrder($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_GET_ORDER;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_GET_ORDER;
        return $this->jsonCurl($url, $params);
    }

    public function searchOrder($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_SEARCH_ORDER;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_SEARCH_ORDER;
        $ret = $this->jsonCurl($url, $params);
        if ($this->orderDebug)
            return $this->debugOrderList($params, $ret);
        else return $ret;
    }

    private function debugOrderList($params, $ret)
    {
        if(isset($ret['orderNumberList']) && count($ret['orderNumberList'])>0){
            $page = 1;
            $limit = 10;
            if(isset($params['PaginationRequestModel'])){
                $page = $params['PaginationRequestModel']['requestPage'] ?? 1;
                $limit = $params['PaginationRequestModel']['requestRecordsAmount'] ?? 10;
            }
            $max = 145;
            $total = $max + 6;
            $orderCodePrefix = substr($ret['orderNumberList'][0], 0, 16);
            $tempOrderList = $ret['orderNumberList'];
            $fixedOrderCodes = ['02000001', '03000001', '04000001'];
            foreach ($fixedOrderCodes as $fixedOrderCode){
                $tempOrderList[] = $orderCodePrefix . $fixedOrderCode;
            }
            for($i=1; $i <= $max; $i++){
                $tempOrderList[] = $orderCodePrefix . '01' . str_pad($i, 6, '0', STR_PAD_LEFT);
            }
            $offset = ($page - 1) * $limit;
            $ret['orderNumberList'] = array_slice($tempOrderList, $offset, $limit);
            $ret['PaginationResponseModel']['totalRecordsAmount'] = $total;
            $ret['PaginationResponseModel']['totalPages'] = ceil($total/$limit);
            $ret['PaginationResponseModel']['requestPage'] = $page;
        }
        return $ret;
    }

    public function confirmOrder($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_CONFIRM_ORDER;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_CONFIRM_ORDER;
        return $this->jsonCurl($url, $params);
    }

    public function updateOrderShipping($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_SHIPPING;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SHIPPING;
        return $this->jsonCurl($url, $params);
    }

    public function updateOrderShippingAsync($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_SHIPPING_ASYNC;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SHIPPING_ASYNC;
        return $this->jsonCurl($url, $params);
    }

    public function getResultUpdateOrderShippingAsync($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_GET_RESULT_UPDATE_ORDER_SHIPPING_ASYNC;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_GET_RESULT_UPDATE_ORDER_SHIPPING_ASYNC;
        return $this->jsonCurl($url, $params);
    }

    public function getSubStatusList($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_GET_SUB_STATUS_LIST;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_GET_SUB_STATUS_LIST;
        return $this->jsonCurl($url, $params);
    }

    public function updateOrderSubStatus($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_SUB_STATUS;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SUB_STATUS;
        return $this->jsonCurl($url, $params);
    }

    public function updateOrderMemo($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_MEMO;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_MEMO;
        return $this->jsonCurl($url, $params);
    }

    public function updateOrderRemarks($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_REMARKS;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_REMARKS;
        return $this->jsonCurl($url, $params);
    }

    public function updateOrderSender($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_SENDER;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SENDER;
        return $this->jsonCurl($url, $params);
    }

    public function updateOrderSenderAfterShipping($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_SENDER_AFTER_SHIPPING;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SENDER_AFTER_SHIPPING;
        return $this->jsonCurl($url, $params);
    }

    public function cancelOrder($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_CANCEL_ORDER;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_CANCEL_ORDER;
        return $this->jsonCurl($url, $params);
    }

    public function cancelOrderAfterShipping($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_CANCEL_ORDER_AFTER_SHIPPING;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_CANCEL_ORDER_AFTER_SHIPPING;
        return $this->jsonCurl($url, $params);
    }

    public function updateOrderOrderer($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_ORDERER;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_ORDERER;
        return $this->jsonCurl($url, $params);
    }

    public function updateOrderDelivery($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_DELIVERY;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_UPDATE_ORDER_DELIVERY;
        return $this->jsonCurl($url, $params);
    }

    public function getPayment($params)
    {
        if ($this->orderDebug) $url = ApiDefine::RMS_API_RAKUTEN_PAY_SAMPLE_GET_PAYMENT;
        else $url = ApiDefine::RMS_API_RAKUTEN_PAY_GET_PAYMENT;
        return $this->jsonCurl($url, $params);
    }
}
