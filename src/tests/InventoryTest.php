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
        $item['itemUrl'] = 'test1';
        $item['itemNumber'] = 'test1';
        $item['HChoiceName'] = 'red';
        $item['VChoiceName'] ='';
        $item['inventoryBackFlag'] = 1;
        $item['inventoryCount'] = 100;
        $item['lackDeliveryId'] = 0;
        $item['normalDeliveryId'] = 1000;
        $item['orderFlag'] = 1;
        $item['orderSalesFlag'] = 1;
        $item['inventory'] = 1;
        $item['inventoryType'] = 3;
        $item['inventoryUpdateMode'] = 1;
        $item['lackDeliveryDeleteFlag'] = 1;
        $item['nokoriThreshold'] = 99;
        $item['normalDeliveryDeleteFlag'] = false;
        $item['restTypeFlag'] = 0;
        $params['updateRequestExternalItem'][] = $item;
        $data = $this->api->updateInventory($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group updateSingleInventory
     * @author wareon <wareon@qq.com>
     * @date 2020/05/12 1:05
     * @since v1.0
     */
    public function testUpdateSingleInventory()
    {
        $item['itemUrl'] = 'test2';
        $item['itemNumber'] = 'test2';
        $item['HChoiceName'] = '';
        $item['VChoiceName'] ='';
        $item['inventory'] = 1;
        $item['inventoryBackFlag'] = 1;
        $item['inventoryType'] = 2;
        $item['inventoryUpdateMode'] = 1;
        $item['lackDeliveryDeleteFlag'] = 1;
        $item['inventoryCount'] = 1000;
        $item['lackDeliveryDeleteFlag'] = false;
        $item['lackDeliveryId'] = 0;
        $item['normalDeliveryId'] = 1000;
        $item['nokoriThreshold'] = 0;
        $item['orderFlag'] = 0;
        $item['orderSalesFlag'] = 1;
        $item['normalDeliveryDeleteFlag'] = false;
        $item['restTypeFlag'] = 1;
        $params['updateRequestExternalItem']['UpdateRequestExternalItem'] = $item;
        $data = $this->api->updateSingleInventory($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

}
