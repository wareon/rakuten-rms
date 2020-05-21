<?php
/**
 * phpunit test shop api
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/5/19 10:00
 * @since 1.0
 */
namespace Wareon\RakutenRms\Tests;

use Wareon\RakutenRms\RakutenRms;
use Illuminate\Config\Repository;

class ShopTest extends TestCase
{
    public $api = null;

    protected function setUp() : void
    {
        parent::setUp();
        $config = config();
        $this->api = new RakutenRms($config);
    }

    /**
     * @group delvdateMaster
     */
    public function testDelvdateMaster()
    {
        //$params['id'] = 1;
        $params['delvdateNumber'] = 1;
        $params = [];
        $data = $this->api->delvdateMaster($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group deliverySetInfo
     * @author wareon <wareon@qq.com>
     * @date 2020/5/19 10:00
     * @since v1.0
     */
    public function testDeliverySetInfo()
    {
        $params['deliverySetId'] = 100;
        $params = [];
        $data = $this->api->deliverySetInfo($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group soryoKbn
     */
    public function testSoryoKbn()
    {
        //$params['id'] = 1;
        //$params['kbnId'] = 2;
        $params = [];
        $data = $this->api->soryoKbn($params);
        print_r($data);
        $this->assertEquals(true, true);
    }
}
