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

class CategroyTest extends TestCase
{
    public $api = null;

    protected function setUp() : void
    {
        parent::setUp();
        $config = config();
        $this->api = new RakutenRms($config);
    }

    /**
     * test get categroies list
     * @group categroy1
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:23
     * @since v1.0
     */
    public function testCategroiesGet()
    {
        $data = $this->api->categroiesGet();
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * test get categroy list
     * @group categroy2
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:23
     * @since v1.0
     */
    public function testCategroyGet()
    {
        $data = $this->api->categroyGet();
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * test get categroy list
     * @group categroy
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:23
     * @since v1.0
     */
    public function testCategorySetsGet()
    {
        $data = $this->api->categorySetsGet();
        print_r($data);
        $this->assertEquals(true, true);
    }

}
