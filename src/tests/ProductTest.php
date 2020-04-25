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

class ProductTest extends TestCase
{
    public $api = null;

    protected function setUp() : void
    {
        parent::setUp();
        $config = config();
        $this->api = new RakutenRms($config);
    }

    /**
     * @group productSearch
     * @author wareon <wareon@qq.com>
     * @date 2020/4/21 9:23
     * @since v1.0
     */
    public function testProductSearch()
    {
        $params['keyword'] = 'a';
        //$params['releaseDateFrom'] = '2020-03-21T00:00:00+09:00';
        //$params['releaseDateTo'] = '2020-04-21T00:00:00+09:00';
        $data = $this->api->productSearch($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

}
