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

    protected function setUp() : void
    {
        parent::setUp();
        $config = config();
        $this->api = new RakutenRms($config);
    }

    /**
     * test get categroy list
     * @group categroy
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:23
     * @since v1.0
     */
    public function testCategroyGet()
    {
        $data = $this->api->categroiesGet();
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * test Get Item detail
     * @group item
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:25
     * @since v1.0
     */
    public function testGetItem()
    {
        $data = $this->api->getItem('a001004018');
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * test Item Search
     * @group item
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:25
     * @since v1.0
     */
    public function testItemSearch()
    {
        $params = [
            //'itemName' => 'abc',
            //'catchcopy' => '',
            //'catalogId' => '0000000108',
            //'itemUrl' => 'a001004018',
            'genreId' => '502835'
        ];
        $data = $this->api->itemSearch($params);
        print_r($data);
        $this->assertEquals(true, true);
    }
}
