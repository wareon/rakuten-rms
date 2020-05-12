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
        //$params['orderProgressList'] = [100,200,300,400,500,600,700,800,900];
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
        //print_r($data);
        if(isset($data['OrderModelList'])) echo json_encode($data['OrderModelList'], JSON_UNESCAPED_UNICODE);
        $this->assertEquals(true, true);
    }

    /**
     * @group confirmOrder
     */
    public function testConfirmOrder()
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
        $data = $this->api->confirmOrder($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

}
