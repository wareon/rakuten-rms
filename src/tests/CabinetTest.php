<?php

namespace Wareon\RakutenRms\Tests;

use Wareon\RakutenRms\RakutenRms;
use Illuminate\Config\Repository;

class CabinetTest extends TestCase
{
    public $api = null;

    protected function setUp(): void
    {
        parent::setUp();
        $config = config();
        $this->api = new RakutenRms($config);
    }

    /**
     * @group cabinetUsageGet
     */
    public function testCabinetUsageGet()
    {
        $data = $this->api->cabinetUsageGet();
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group cabinetFoldersGet
     */
    public function testCabinetFoldersGet()
    {
        $params['offset'] = 1;
        $params['limit'] = 10;
        $data = $this->api->cabinetFoldersGet($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group cabinetFolderFilessGet
     */
    public function testCabinetFolderFilessGet()
    {
        $params['folderId'] = 0;
        $params['offset'] = 1;
        $params['limit'] = 10;
        $data = $this->api->cabinetFolderFilessGet($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group cabinetFilesSearch
     */
    public function testCabinetFilesSearch()
    {
        $params['fileId'] = 11111111;
        $params['filePath'] = '';
        $params['fileName'] = '';
        $params['folderId'] = 0;
        $params['folderPath'] = '';
        $params['offset'] = 1;
        $params['limit'] = 10;
        $data = $this->api->cabinetFilesSearch($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group cabinetFileDelete
     */
    public function testCabinetFileDelete()
    {
        $params = [
            'fileDeleteRequest' => [
                'file' => [
                    'fileId' => 11111111
                ]
            ]
        ];
        $data = $this->api->cabinetFileDelete($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group cabinetTrashboxFilesGet
     */
    public function testCabinetTrashboxFilesGet()
    {
        $params['offset'] = 1;
        $params['limit'] = 10;
        $data = $this->api->cabinetTrashboxFilesGet($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group cabinetTrashboxFileRevert
     */
    public function testCabinetTrashboxFileRevert()
    {
        $params = [
            'fileRevertRequest' => [
                'file' => [
                    'fileId' => 11111111,
                    'folderId' => 11111111
                ]
            ]
        ];
        $data = $this->api->cabinetTrashboxFileRevert($params);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group cabinetFileInsert
     */
    public function testCabinetFileInsert()
    {
        // 7421063-7421064
        $params = [
            'request'=>[
                'fileInsertRequest' => [
                    'file' => [
                        'fileName' => 'default',
                        'folderId' => 7421064,
                        'filePath' => 'default.jpg',
                        'overWrite' => 'true',
                    ]
                ]
            ]
        ];
        $path = public_path('default_user.jpg');
        $data = $this->api->cabinetFileInsert($params, $path);
        print_r($data);
        $this->assertEquals(true, true);
    }

    /**
     * @group cabinetFileUpdate
     */
    public function testCabinetFileUpdate()
    {
        // 7421063-7421064
        $params = [
            'request'=>[
                'fileUpdateRequest' => [
                    'file' => [
                        'fileId' => 75397696,
                        'fileName' => 'test',
                        'folderId' => 7421064,
                        'filePath' => 'test.jpg'
                    ]
                ]
            ]
        ];
        $path = public_path('default_user.jpg');
        $data = $this->api->cabinetFileUpdate($params, $path);
        print_r($data);
        $this->assertEquals(true, true);
    }


    /**
     * @group cabinetFolderInsert
     */
    public function testCabinetFolderInsert()
    {
        // 7421063-7421064
        $params = [
            'request'=>[
                'folderInsertRequest' => [
                    'folder' => [
                        'folderName' => 'test_xxx2',
                        'directoryName' => 'test_xxx2',
                        //'upperFolderId' => 0
                    ]
                ]
            ]
        ];
        $data = $this->api->cabinetFolderInsert($params);
        print_r($data);
        $this->assertEquals(true, true);
    }


}
