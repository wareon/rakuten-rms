<?php
/**
 * phpunit test inquiry management api
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/5/8 10:00
 * @since 1.0
 */
namespace Wareon\RakutenRms\Tests;

use Wareon\RakutenRms\RakutenRms;
use Illuminate\Config\Repository;

class InquiryManagementTest extends TestCase
{
    public $api = null;

    protected function setUp() : void
    {
        parent::setUp();
        $config = config();
        $this->api = new RakutenRms($config);
    }

    /**
     * @group inquiriesCount
     * @author wareon <wareon@qq.com>
     * @date 2020/5/8 10:00
     * @since v1.0
     */
    public function testInquiriesCount()
    {
        $params['noMerchantReply'] = 'true';
        $params['fromDate'] = '2020-03-01T00:00:00';
        $params['toDate'] = '2020-04-01T00:00:00';
        $data = $this->api->inquiriesCount($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group inquiriesGet
     * @author wareon <wareon@qq.com>
     * @date 2020/5/8 10:00
     * @since v1.0
     */
    public function testInquiriesGet()
    {
        $params['limit'] = 10;
        $params['page'] = 1;
        $params['noMerchantReply'] = 'true';
        $params['fromDate'] = '2020-03-01T00:00:00';
        $params['toDate'] = '2020-04-01T00:00:00';
        $data = $this->api->inquiriesGet($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group inquiryGet
     * @author wareon <wareon@qq.com>
     * @date 2020/5/8 10:00
     * @since v1.0
     */
    public function testInquiryGet()
    {
        $data = $this->api->inquiryGet('1-20200308-1t');
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group inquiryReply
     * @author wareon <wareon@qq.com>
     * @date 2020/5/8 10:00
     * @since v1.0
     */
    public function testInquiryReply()
    {
        $params['inquiryNumber'] = '1-20200308-1t';
        $params['shopId'] = 1;
        $params['message'] = 'Hello.';
        $params['attachments'] = [
            ['label'=>'test.jpg', 'path'=>'/test.jpg']
        ];
        $data = $this->api->inquiryReply($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

}
