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

    protected function setUp(): void
    {
        parent::setUp();
        $config = config();
        $this->api = new RakutenRms($config);
    }

    /**
     * test Get Item detail
     * @group getItem
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:25
     * @since v1.0
     */
    public function testGetItem()
    {
        $itemUrl = 'test2';
        $ver = ApiDefine::VER;
        $data = $this->api->getItem($itemUrl, $ver);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * test Item Search
     * @group itemSearch
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:25
     * @since v1.0
     */
    public function testItemSearch()
    {
        $params = [
            'itemType' => 'NORMAL',
            //'title' => '2',
            /*'itemName' => '',
            'catchcopy' => '',
            'catalogId' => '',
            'itemUrl' => '',
            'genreId' => ''*/
        ];
        $ver = ApiDefine::VER;
        $data = $this->api->itemSearch($params, $ver);
        $items = $data['itemSearchResult']['items']['item'] ?? [];
        if(isset($data['itemSearchResult']['numFound'])) echo $data['itemSearchResult']['numFound'];
        print_r($data);
        $this->assertEquals(true, true);
    }

    public function testItemInsert2()
    {
        $json = '{"itemType":"NORMAL","itemNumber":"itemnumber","title":"通常商品の商品名","tagline":"pc and sp catchcopy","productDescription":{"pc":"explanation for PC","sp":"explanation for SP"},"salesDescription":"salesexplanation for PC","images":[{"type":"CABINET","location":"/01003752/dog_07.jpg","alt":"itemname"}],"whiteBgImage":{"type":"GOLD","location":"/vegetable-blue-jp.jpg"},"video":{"type":"HTML","parameters":{"value":"<scriptsrc=\"//stream.cms.rakuten.co.jp/gate/play/?w=320&h=286&mid=1101692986&vid=5792214557001\"type=\"text/javascript\"></script>"}},"genreId":"111111","tags":[7654321,9000000],"hideItem":false,"unlimitedInventoryFlag":false,"customizationOptions":[{"displayName":"ギフト包装","inputType":"SINGLE_SELECTION","required":true,"selections":[{"displayValue":"はい"}]}],"features":{"searchVisibility":"ALWAYS_VISIBLE","shopContact":true,"review":"SHOP_SETTING","displayManufacturerContents":false,"displayNormalCartButton":true,"displaySubscriptionCartButton":false,"inventoryDisplay":"HIDDEN_STOCK","lowStockThreshold":1},"payment":{"taxIncluded":false,"taxRate":"0.1","cashOnDeliveryFeeIncluded":true},"pointCampaign":{"applicablePeriod":{"start":"2018-04-28T07:59:49+09:00","end":"2018-05-28T07:59:49+09:00"},"benefits":{"pointRate":15},"optimization":{"maxPointRate":15}},"itemDisplaySequence":999999999,"layout":{"itemLayoutId":1,"navigationId":10,"layoutSequenceId":20,"smallDescriptionId":30,"largeDescriptionId":40,"showcaseId":50},"variants":{"normal-inventory":{"restockOnCancel":false,"normalDeliveryDateId":1,"backOrderFlag":false}}}';
        $json = json_decode($json, true);
        $json['manageNumber'] = 'pc0001';
        $ver = date('Ymd');
        $data = $this->api->itemInsert($json);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * test Get Item insert
     * @group itemInsert
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:25
     * @since v1.0
     */
    public function testItemInsert()
    {
        $item = array('request' => array(
            'itemInsertRequest' => array(
                'item' => array(
                    'itemUrl' => '',
                    'itemNumber' => '',
                    'itemName' => '送料無料 安心保証1',
                    'itemPrice' => '2480',
                    'genreId' => '502835',
                    'catalogId' =>
                        array(),
                    'catalogIdExemptionReason' => '3',
                    'images' =>
                        array(
                            array(
                                'image' => array(
                                    'imageUrl' => 'https://image.rakuten.co.jp/test/cabinet/06901178/imgrc0074481612.jpg',
                                    'imageAlt' => '1',
                                )
                            ),
                            array(
                                'image' =>
                                    array(
                                        'imageUrl' => 'https://image.rakuten.co.jp/test/cabinet/06901178/imgrc0074604375.jpg',
                                        'imageAlt' => '2',
                                    )
                            )
                        ),
                    'descriptionForPC' => 'test1',
                    'descriptionForSmartPhone' => 'test2',
                    'movieUrl' => 'testmovieurl',
                    'options' =>
                        array(
                            'option' =>
                                array(
                                    'optionName' => '★初期不具合に関しては、レビュー投稿前にショップへご連絡ください',
                                    'optionStyle' => '1',
                                    'isOptionRequired' => 'false',
                                    'optionValues' =>
                                        array(
                                            'optionValue' =>
                                                array(
                                                    'value' => '承諾する',
                                                ),
                                        ),
                                ),
                            'option' =>
                                array(
                                    'optionName' => '★注文確定後のキャンセル・内容変更・配送先変更・住所記載ミスによる再配送達は不可',
                                    'optionStyle' => '1',
                                    'isOptionRequired' => 'false',
                                    'optionValues' =>
                                        array(
                                            'optionValue' =>
                                                array(
                                                    'value' => '承諾する',
                                                ),
                                        ),
                                ),
                        ),
                    'tagIds' =>
                        array(
                            array(
                                'tagId' => '1000877',
                            ),
                            array(
                                'tagId' => '1000878',
                            ),
                        ),
                    'catchCopyForPC' => '送料無料 安心保証 マイク付き  ワイヤレス ヘッドホン 3.5mm ジャック 有線 無線 タイプ  ',
                    'catchCopyForMobile' => '送料無料 安心保証 マイク付き ワイヤレス ヘッドホン',
                    'descriptionBySalesMethod' => 'test3',
                    'isSaleButton' => 'true',
                    'isDocumentButton' => 'false',
                    'isInquiryButton' => 'true',
                    'isStockNoticeButton' => 'false',
                    'displayMakerContents' => 'true',
                    'itemLayout' => '1',
                    'isIncludedTax' => 'false',
                    'isIncludedPostage' => 'true',
                    'isIncludedCashOnDeliveryPostage' => 'false',
                    'orderLimit' => '-1',
                    'postage' => '-1',
                    'isNoshiEnable' => 'false',
                    'isTimeSale' => 'false',
                    'isUnavailableForSearch' => 'false',
                    'isAvailableForMobile' => 'true',
                    'isDepot' => 'false',
                    'detailSellType' => '0',
                    'point' =>
                        array(
                            'pointRate' => 4,
                            'pointRateStart' => '2020-04-20T21:22:22+09:00',
                            'pointRateEnd' => '2020-06-19T20:22:22+09:00',
                        ),
                    'itemInventory' =>
                        array(
                            'inventoryType' => '2',
                            'inventories' =>
                                array(
                                    array(
                                        'inventory' =>
                                            array(
                                                'inventoryCount' => '38',
                                                'childNoHorizontal' => '18BK',
                                                'optionNameHorizontal' => 'ブラック(無線)',
                                                'isBackorderAvailable' => 'false',
                                                'normalDeliveryDateId' => '2',
                                                'isBackorder' => 'false',
                                                'isRestoreInventoryFlag' => 'true',
                                            ),
                                    ),
                                    array(
                                        'inventory' => array(
                                            'inventoryCount' => '0',
                                            'childNoHorizontal' => '18RD',
                                            'optionNameHorizontal' => 'レッド(無線)',
                                            'isBackorderAvailable' => 'false',
                                            'normalDeliveryDateId' => '2',
                                            'isBackorder' => 'false',
                                            'isRestoreInventoryFlag' => 'true',
                                        )
                                    )
                                ),
                            'verticalName' =>
                                array(),
                            'horizontalName' => 'カラー',
                            'inventoryDisplayFlag' => '0',
                        ),

                )
            )
        ));
        $data = $this->api->itemInsert($item);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * test Get Item update
     * @group itemUpdate
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:25
     * @since v1.0
     */
    public function testItemUpdate()
    {
        $item = array(
            'request' => array(
                'itemUpdateRequest' =>
                    array(
                        'item' => array(
                            'itemUrl' => 'testsetstestettestte',
                            'itemPrice' => 102,
                            'images' =>
                                array(
                                    array('image' =>
                                        array(
                                            'imageUrl' => 'https://image.rakuten.co.jp/https://api.rms.rakuten.co.jp/es/1.0/item/insert/cabinet/images/rrrz_01.jpg',
                                            'imageAlt' => '',
                                        )),
                                    array('image' =>
                                        array(
                                            'imageUrl' => 'https://image.rakuten.co.jp/https://api.rms.rakuten.co.jp/es/1.0/item/insert/cabinet/images/rrrz_01.jpg',
                                            'imageAlt' => '',
                                        )),
                                ),
                            'descriptionForPC' => '結構html使える_20200421110417',
                            'descriptionForMobile' => '一部html使用可能_20200421110417',
                            'descriptionForSmartPhone' => '一部html使用可能_20200421110417',
                            'catchCopyForPC' => 'PC用キャッチコピー_20200421110417',
                            'catchCopyForMobile' => 'モバイル用キャッチコピー_20200421110417',
                            'isIncludedPostage' => 0,
                            'isIncludedCashOnDeliveryPostage' => 1,
                            'postage' => 125,
                            'itemInventory' =>
                                array(
                                    'inventoryType' => 1,
                                    'inventories' =>
                                        array(
                                            'inventory' =>
                                                array(
                                                    'inventoryCount' => 16,
                                                    'normalDeliveryDateId' => 1000,
                                                    'backorderDeliveryDateId' => 1000
                                                ),
                                        )
                                ),
                        )
                    )));
        $data = $this->api->itemUpdate($item);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * test Get Item delete
     * @group itemDelete
     * @author wareon <wareon@qq.com>
     * @date 2020/1/14 9:25
     * @since v1.0
     */
    public function testItemDelete()
    {
        $item = array(
            'request' => array(
                'itemDeleteRequest' =>
                    array(
                        'item' => array(
                            'itemUrl' => 'testsetstestettestte',
                        ))));
        $data = $this->api->itemDelete($item);
        print_r($data);
        $this->assertEquals(true, true);
    }
}
