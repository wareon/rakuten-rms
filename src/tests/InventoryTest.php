<?php
/**
 * phpunit test product api
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/4/21 10:00
 * @since 1.0
 */
namespace Wareon\RakutenRms\Tests;

use Wareon\RakutenRms\RakutenRms;
use Illuminate\Config\Repository;

class InventoryTest extends TestCase
{
    public $api = null;

    protected function setUp() : void
    {
        parent::setUp();
        $config = config();
        $this->api = new RakutenRms($config);
    }

    /**
     * @group getInventory
     * @author wareon <wareon@qq.com>
     * @date 2020/05/12 1:05
     * @since v1.0
     */
    public function testGetInventory()
    {
        $params['itemUrl'] = ['test1', 'test2'];
        $data = $this->api->getInventory($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group updateInventory
     * @author wareon <wareon@qq.com>
     * @date 2020/05/12 1:05
     * @since v1.0
     */
    public function testUpdateInventory()
    {
        $params['itemUrl'] = 'test1';
        $params['HChoiceName'] = 'red';
        $params['VChoiceName'] ='';
        $params['inventoryBackFlag'] = 1;
        $params['inventoryCount'] = 100;
        $params['lackDeliveryId'] = 0;
        $params['normalDeliveryId'] = 1000;
        $params['orderFlag'] = 1;
        $params['orderSalesFlag'] = 1;
        $data = $this->api->updateInventory($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

}
