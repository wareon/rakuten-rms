<?php
/**
 * describe
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/13 10:00
 * @since PM_1.0_eduapi
 */
namespace Wareon\RakutenRms\Tests;

use Wareon\RakutenRms\Facades\RakutenRms;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testGetItem()
    {
        $msg = RakutenRms::getItem('123456');
        echo $msg;
        $this->assertEquals(true, true);
    }
}
