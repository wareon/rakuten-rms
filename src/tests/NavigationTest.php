<?php
/**
 * phpunit test Navigation api
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/4/21 10:00
 * @since 1.0
 */
namespace Wareon\RakutenRms\Tests;

use Wareon\RakutenRms\RakutenRms;
use Illuminate\Config\Repository;

class NavigationTest extends TestCase
{
    public $api = null;

    protected function setUp() : void
    {
        parent::setUp();
        $config = config();
        $this->api = new RakutenRms($config);
    }

    /**
     * @group navigationGenreGet
     * @author wareon <wareon@qq.com>
     * @date 2020/4/21 9:23
     * @since v1.0
     */
    public function testNavigationGenreGet()
    {
        $useGenreIds = ['0000'];
        foreach ($useGenreIds as $useGenreId){
            $params['genreId'] = $useGenreId;
            $data = $this->api->navigationGenreGet($params);
            //print_r($data);
            $genreIds = $data['navigationGenreGetResult']['genre'] ?? [];
            if(isset($genreIds['itemRegisterFlg']['auction']) && $genreIds['itemRegisterFlg']['auction']==1){
                //print_r($genreIds);
                echo $genreIds['genreId'] . $genreIds['genreName'] . "\n";
            }
            sleep(1);
        }

        $this->assertEquals(true, true);
    }
}
