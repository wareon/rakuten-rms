<?php
/**
 * phpunit test order api
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/13 10:00
 * @since PM_1.0_eduapi
 */
namespace Wareon\RakutenRms\Tests;

use Carbon\Carbon;
use Wareon\RakutenRms\RakutenRms;
use Illuminate\Config\Repository;

class OrderTest extends TestCase
{
    public $api = null;

    protected function setUp() : void
    {
        parent::setUp();
        $config = config();
        $this->api = new RakutenRms($config);
    }

    /**
     * test search order
     * @group searchOrder
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:23
     * @since v1.0
     */
    public function testSearchOrder()
    {
        $startDate = date('Y-m-d') . 'T00:00:00+0900';
        $startDate = '2020-04-10T00:00:00+0900';
        $endDate = date('Y-m-d') . 'T23:59:59+0900';
        $endDate = '2020-05-12T23:59:59+0900';
        $params['orderProgressList'] = [100,200,300,400,500,600,700,800,900];
        $params['dateType'] = 1;
        $params['startDatetime'] = $startDate;
        $params['endDatetime'] = $endDate;
        /*$params['PaginationRequestModel'] = [
            'requestRecordsAmount' => 10,
            'requestPage' => 1,
        ];
        $params['settlementMethod'] = 1;*/
        $data = $this->api->searchOrder($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group getOrder
     */
    public function testGetOrder()
    {
        $params['orderNumberList'] = ['x-x-x'];
        $params['version'] = 1;
        $data = $this->api->getOrder($params);
        print_r($data);
        if(isset($data['OrderModelList'])) echo json_encode($data['OrderModelList'], JSON_UNESCAPED_UNICODE);
        $this->assertEquals(true, true);
    }

    /**
     * @group confirmOrder
     */
    public function testConfirmOrder()
    {
        $params['orderNumberList'] = ['x-x-x'];
        $data = $this->api->confirmOrder($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group updateOrderShipping
     */
    public function testUpdateOrderShipping()
    {
        $params['orderNumber'] = 'x-x-x';
        $params['BasketidModelList'] = [
            [
                "basketId" => 10746403,
                "ShippingModelList" => [
                    [
                        "shippingDetailId"=> null,
                        "deliveryCompany"=> "1001",
                        "shippingNumber"=> "SN333333",
                        "shippingDate"=> "2018-02-01"
                    ]
                ]
            ]
        ];
        $data = $this->api->updateOrderShipping($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group updateOrderShippingAsync
     */
    public function testUpdateOrderShippingAsync()
    {
        $order['orderNumber'] = 'x-x-x';
        $order['BasketidModelList'] = [
            [
                "basketId" => 10746403,
                "ShippingModelList" => [
                    [
                        "shippingDetailId"=> null,
                        "deliveryCompany"=> "1001",
                        "shippingNumber"=> "SN333333",
                        "shippingDate"=> "2018-02-01"
                    ]
                ]
            ]
        ];
        $params['OrderShippingModelList'][] = $order;
        $data = $this->api->updateOrderShippingAsync($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group getResultUpdateOrderShippingAsync
     */
    public function testGetResultUpdateOrderShippingAsync()
    {
        $params['requestId'] = 'requestId';
        $data = $this->api->getResultUpdateOrderShippingAsync($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group getSubStatusList
     */
    public function testGetSubStatusList()
    {
        $params = [];
        $data = $this->api->getSubStatusList($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group updateOrderSubStatus
     */
    public function testUpdateOrderSubStatus()
    {
        $params['subStatusId'] = 1001;
        $params['orderNumberList'] = ['x-x-x'];
        $data = $this->api->updateOrderSubStatus($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group updateOrderMemo
     */
    public function testUpdateOrderMemo()
    {
        $params['subStatusId'] = 1001;
        $params['orderNumber'] = 'x-x-x';
        $params['deliveryClass'] = 1;
        $params['deliveryDate'] = '2020-05-13';
        $data = $this->api->updateOrderMemo($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group updateOrderRemarks
     */
    public function testUpdateOrderRemarks()
    {
        $params['orderNumber'] = 'x-x-x';
        $params['giftCheck'] = 1;
        $params['remarks'] = 'test remarks';
        $data = $this->api->updateOrderRemarks($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group updateOrderSender
     */
    public function testUpdateOrderSender()
    {
        $json = '{
            "orderNumber": "x-x-x",
            "WrappingModel1": {
                "title": 2,
                "name": "赤いリボン",
                "price": 150,
                "taxRate": 0.1,
                "includeTaxFlag": 1,
                "deleteWrappingFlag": 0
            },
            "PackageModelList": [
                {
                    "basketId": 10666496,
                    "postagePrice": 100,
                    "postageTaxRate": 0.1,
                    "deliveryPrice": 100,
                    "deliveryTaxRate": 0.1,
                    "noshi": "出産祝い",
                    "packageDeleteFlag": 0,
                    "SenderModel": {
                        "zipCode1": "158",
                        "zipCode2": "0094",
                        "prefecture": "東京都",
                        "city": "世田谷区",
                        "subAddress": "玉川一丁目14番1号",
                        "familyName": "楽天",
                        "firstName": "太郎",
                        "familyNameKana": "ラクテン",
                        "firstNameKana": "タロウ",
                        "phoneNumber1": "03",
                        "phoneNumber2": "1234",
                        "phoneNumber3": "5678"
                    },
                    "ItemModelList": [
                        {
                            "itemDetailId": 10666496,
                            "itemName": "商品名",
                            "itemNumber": "ITEM_NUMBER",
                            "price": 1000,
                            "taxRate": 0.1,
                            "units": 2,
                            "includePostageFlag": 1,
                            "includeTaxFlag": 0,
                            "includeCashOnDeliveryPostageFlag": 1,
                            "selectedChoice": "項目選択肢Ａ: 項目選択肢Ａの１",
                            "restoreInventoryFlag": 0,
                            "deleteItemFlag": 0
                        }
                    ]
                },
                {
                    "basketId": 10666497,
                    "postagePrice": 100,
                    "postageTaxRate": 0.1,
                    "deliveryPrice": 100,
                    "deliveryTaxRate": 0.1,
                    "noshi": "出産祝い",
                    "packageDeleteFlag": 0,
                    "SenderModel": {
                        "zipCode1": "158",
                        "zipCode2": "0094",
                        "prefecture": "東京都",
                        "city": "世田谷区",
                        "subAddress": "玉川一丁目14番2号",
                        "familyName": "楽天",
                        "firstName": "次郎",
                        "familyNameKana": "ラクテン",
                        "firstNameKana": "ジロウ",
                        "phoneNumber1": "03",
                        "phoneNumber2": "1234",
                        "phoneNumber3": "5678"
                    },
                    "ItemModelList": [
                        {
                            "itemDetailId": 10666497,
                            "itemName": "商品名",
                            "itemNumber": "ITEM_NUMBER",
                            "price": 1000,
                            "taxRate": 0.1,
                            "units": 2,
                            "includePostageFlag": 1,
                            "includeTaxFlag": 0,
                            "includeCashOnDeliveryPostageFlag": 1,
                            "selectedChoice": "項目選択肢Ａ: 項目選択肢Ａの１",
                            "restoreInventoryFlag": 0,
                            "deleteItemFlag": 0
                        }
                    ]
                }
            ]
        }';
        $params = json_decode($json);
        $data = $this->api->updateOrderSender($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group updateOrderSenderAfterShipping
     */
    public function testUpdateOrderSenderAfterShipping()
    {
        $json = '{
            "orderNumber": "x-x-x",
            "WrappingModel1": {
                "title": 2,
                "name": "赤いリボン",
                "price": 150,
                "taxRate": 0.1,
                "includeTaxFlag": 1,
                "deleteWrappingFlag": 0
            },
            "PackageModelList": [
                {
                    "basketId": 10666496,
                    "postagePrice": 100,
                    "postageTaxRate": 0.1,
                    "deliveryPrice": 100,
                    "deliveryTaxRate": 0.1,
                    "noshi": "出産祝い",
                    "packageDeleteFlag": 0,
                    "SenderModel": {
                        "zipCode1": "158",
                        "zipCode2": "0094",
                        "prefecture": "東京都",
                        "city": "世田谷区",
                        "subAddress": "玉川一丁目14番1号",
                        "familyName": "楽天",
                        "firstName": "太郎",
                        "familyNameKana": "ラクテン",
                        "firstNameKana": "タロウ",
                        "phoneNumber1": "03",
                        "phoneNumber2": "1234",
                        "phoneNumber3": "5678"
                    },
                    "ItemModelList": [
                        {
                            "itemDetailId": 10666496,
                            "itemName": "商品名",
                            "itemNumber": "ITEM_NUMBER",
                            "price": 1000,
                            "taxRate": 0.1,
                            "units": 2,
                            "includePostageFlag": 1,
                            "includeTaxFlag": 0,
                            "includeCashOnDeliveryPostageFlag": 1,
                            "selectedChoice": "項目選択肢Ａ: 項目選択肢Ａの１",
                            "restoreInventoryFlag": 0,
                            "deleteItemFlag": 0
                        }
                    ]
                },
                {
                    "basketId": 10666497,
                    "postagePrice": 100,
                    "postageTaxRate": 0.1,
                    "deliveryPrice": 100,
                    "deliveryTaxRate": 0.1,
                    "noshi": "出産祝い",
                    "packageDeleteFlag": 0,
                    "SenderModel": {
                        "zipCode1": "158",
                        "zipCode2": "0094",
                        "prefecture": "東京都",
                        "city": "世田谷区",
                        "subAddress": "玉川一丁目14番2号",
                        "familyName": "楽天",
                        "firstName": "次郎",
                        "familyNameKana": "ラクテン",
                        "firstNameKana": "ジロウ",
                        "phoneNumber1": "03",
                        "phoneNumber2": "1234",
                        "phoneNumber3": "5678"
                    },
                    "ItemModelList": [
                        {
                            "itemDetailId": 10666497,
                            "itemName": "商品名",
                            "itemNumber": "ITEM_NUMBER",
                            "price": 1000,
                            "taxRate": 0.1,
                            "units": 2,
                            "includePostageFlag": 1,
                            "includeTaxFlag": 0,
                            "includeCashOnDeliveryPostageFlag": 1,
                            "selectedChoice": "項目選択肢Ａ: 項目選択肢Ａの１",
                            "restoreInventoryFlag": 0,
                            "deleteItemFlag": 0
                        }
                    ]
                }
            ]
        }';
        $params = json_decode($json);
        $data = $this->api->updateOrderSenderAfterShipping($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group cancelOrder
     */
    public function testCancelOrder()
    {
        $params['orderNumber'] = 'x-x-x';
        $params['inventoryRestoreType'] = 0;
        $params['changeReasonDetailApply'] = 1;
        $data = $this->api->cancelOrder($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group cancelOrderAfterShipping
     */
    public function testCancelOrderAfterShipping()
    {
        $params['orderNumber'] = 'x-x-x';
        $params['inventoryRestoreType'] = 0;
        $params['changeReasonDetailApply'] = 1;
        $data = $this->api->cancelOrderAfterShipping($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group updateOrderOrderer
     */
    public function testUpdateOrderOrderer()
    {
        $json = '{
            "orderNumber": "x-x-x",
            "OrdererModel": {
              "zipCode1" : "158",
              "zipCode2" : "0094",
              "prefecture" : "東京都",
              "city" : "世田谷区",
              "subAddress" : "玉川一丁目14番1号",
              "familyName" : "楽天",
              "firstName" : "太郎",
              "familyNameKana" : "ラクテン",
              "firstNameKana" : "タロウ",
              "phoneNumber1" : "03",
              "phoneNumber2" : "1111",
              "phoneNumber3" : "2222",
              "emailAddress" : "taro.rakuten@rakuten.com",
              "sex" : "女",
              "birthYear" : 2000,
              "birthMonth" : 1,
              "birthDay" : 3
          }
        }';
        $params = json_decode($json,true);
        $data = $this->api->updateOrderOrderer($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group updateOrderDelivery
     */
    public function testUpdateOrderDelivery()
    {
        $params['orderNumber'] = 'x-x-x';
        $params['deliveryName'] = '宅配便';
        $data = $this->api->updateOrderDelivery($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group getPayment
     */
    public function testGetPayment()
    {
        $params['orderNumber'] = 'x-x-x';
        $params['version'] = 1;
        $data = $this->api->getPayment($params);
        print_r($data);
        $this->assertEquals(true, true);
    }
}
