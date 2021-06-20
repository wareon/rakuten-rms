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

    protected function setUp(): void
    {
        parent::setUp();
        $config = config();
        $this->api = new RakutenRms($config);
    }

    /**
     * @group shopMaster
     */
    public function testTopDisplay()
    {
        $data = $this->api->topDisplay();
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testTopDisplayEdit()
    {
        $params = [
            'shopbiz:topDisplayBizModel' => ['updateModel' => [
                'displayFlag' => '1',
                'layoutCommonId' => '231776',
                'textSmallId' => '105188',
                'lossLeaderId' => '162133',
                'lossLeadingCategoryId' => '92106',
                'textLargeId' => '161675',
            ]]
        ];
        $data = $this->api->topDisplayEdit($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testShopLayoutImage()
    {
        $data = $this->api->shopLayoutImage();
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testShopLayoutImageEdit()
    {
        $params = [
            'shopbiz:shopLayoutImageBizModel' => ['insertModel' => [
                'signboardPath' => 'https://image.rakuten.co.jp/_shopurl/cabinet/signboard.jpg',
            ]]
        ];
        $data = $this->api->shopLayoutImageEdit($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testShopLayoutCommon()
    {
        $data = $this->api->shopLayoutCommon();
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testShopLayoutCommonEdit()
    {
        $params = [
            'shopbiz:shopLayoutCommonBizModel' => [
                'insertList' => [
                    [
                        'shopLayoutCommon' => [
                            'name' => 'TEST',
                            'captionHeader' => 'caption header html',
                            'captionFooter' => 'caption footer html',
                            'captionLeft' => 'caption left html',
                        ]
                    ]
                ]
            ]
        ];
        $data = $this->api->shopLayoutCommonEdit($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testNaviButtonInfo()
    {
        $naviId = 1;
        $data = $this->api->naviButtonInfo($naviId);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testNaviButton()
    {
        $data = $this->api->naviButton();
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testLayoutTextSmall()
    {
        $textSmallId = 1;
        $data = $this->api->layoutTextSmall($textSmallId);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testLayoutLossLeader()
    {
        $lossLeaderId = 1;
        $data = $this->api->layoutLossLeader($lossLeaderId);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testLayoutItemMap()
    {
        $itemMapId = 1;
        $data = $this->api->layoutItemMap($itemMapId);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testLayoutCategoryMap()
    {
        $categoryMapId = 1;
        $data = $this->api->layoutCategoryMap($categoryMapId);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testShopCalendar()
    {
        $params = [
            'fromDate' => date('Y-m-d'),
            'period' => '90',
        ];
        $data = $this->api->shopCalendar($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testShopMaster()
    {
        $data = $this->api->shopMaster();
        print_r($data);
        $this->assertEquals(true, true);
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

    /**
     * @group shopMaster
     */
    public function testShopAreaSoryo()
    {
        $patternId = 1;
        $data = $this->api->shopAreaSoryo($patternId);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testLayoutTextLarge()
    {
        $textLargeId = 1;
        $data = $this->api->layoutTextLarge($textLargeId);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group shopMaster
     */
    public function testGoldTop()
    {
        $data = $this->api->goldTop();
        print_r($data);
        $this->assertEquals(true, true);
    }


}
