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
    public function testGetItem()
    {
        $config = config();
        print_r($config->get('rakuten-rms'));
        $RakutenRms = new RakutenRms($config);
        $msg = $RakutenRms->getItem('123456');
        print_r($msg);
        $this->assertEquals(true, true);
    }
}
