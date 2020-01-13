<?php
/**
 * phpunit test item api
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/13 10:00
 * @since PM_1.0_eduapi
 */
namespace Wareon\RakutenRms\Tests;

use Wareon\RakutenRms\RakutenRms;
use Illuminate\Config\Repository;

class ItemTest extends TestCase
{
    public $api = null;

    public function init()
    {
        $config = config();
        $this->api = new RakutenRms($config);
    }

    public function testGetItem()
    {
        $this->init();
        $msg = $this->api->getItem('abc');
        //echo $msg;
        $msg = $this->api->strToUtf8($msg);
        $data = $this->api->xml2arr($msg);
        print_r($data);
        $this->assertEquals(true, true);
    }

    public function testItemSearch()
    {
        $this->init();
        $params = [
            'itemName' => 'abc'
        ];
        $msg = $this->api->itemSearch($params);
        //echo $msg;
        $msg = $this->api->strToUtf8($msg);
        $data = $this->api->xml2arr($msg);
        print_r($data);
        $this->assertEquals(true, true);
    }
}
