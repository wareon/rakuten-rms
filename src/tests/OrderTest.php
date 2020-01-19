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

    public function testGetOrder()
    {
        $params['shopUrl'] = 'https://www.rakuten.ne.jp/gold/xxx/';
        $data = $this->api->getOrder($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * test search order
     * @group order
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:23
     * @since v1.0
     */
    public function testSearchOrder()
    {
        $startDate = '2020-01-10';
        $endDate = '2020-01-19';
        $params['dateType'] = 1;
        $params['startDatetime'] = Carbon::parse($startDate)->format('Y-m-dTH:i:s+09:00');
        $params['endDatetime'] = Carbon::parse($endDate)->format('Y-m-dTH:i:s+09:00');
        $data = $this->api->searchOrder($params);
        print_r($data);
        $this->assertEquals(true, true);
    }
}
