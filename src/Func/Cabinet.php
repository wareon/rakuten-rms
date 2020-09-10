<?php
/**
 * describe
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/14 9:12
 * @since v1.0
 */

namespace Wareon\RakutenRms\Func;

use Wareon\RakutenRms\ApiDefine;

trait Cabinet
{
    public function cabinetUsageGet()
    {
        return $this->queryCurl(ApiDefine::RMS_API_RAKUTEN_CABINET_USAGE_GET, []);
    }

    public function cabinetFoldersGet($params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_RAKUTEN_CABINET_FOLDERS_GET, $params);
    }

    public function cabinetFolderFilessGet($params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_RAKUTEN_CABINET_FOLDER_FILES_GET, $params);
    }

    public function cabinetFilesSearch($params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_RAKUTEN_CABINET_FILES_SEARCH, $params);
    }

    public function cabinetFileDelete($params)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_RAKUTEN_CABINET_FILE_DELETE, $params);
    }

    public function cabinetTrashboxFilesGet($params)
    {
        return $this->queryCurl(ApiDefine::RMS_API_RAKUTEN_CABINET_TRASHBOX_FILES_GET, $params);
    }

    public function cabinetTrashboxFileRevert($params)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_RAKUTEN_CABINET_TRASHBOX_FILE_REVERT, $params);
    }

    public function cabinetFileInsert($params, $path)
    {
        $xml = $this->arr2xml($params);
        $req = $this->sortFile($xml, $path);

        $url = $this->dealUrl(ApiDefine::RMS_API_RAKUTEN_CABINET_FILE_INSERT);
        $ret = $this->curl($url, true, $req, ApiDefine::REQUEST_XML_FILE);
        $msg = $this->strToUtf8($ret);
        $data = $this->xml2arr($msg);
        return $data;
    }

    public function cabinetFileUpdate($params, $path)
    {
        $xml = $this->arr2xml($params);
        $req = $this->sortFile($xml, $path);

        $url = $this->dealUrl(ApiDefine::RMS_API_RAKUTEN_CABINET_FILE_UPDATE);
        $ret = $this->curl($url, true, $req, ApiDefine::REQUEST_XML_FILE);
        $msg = $this->strToUtf8($ret);
        $data = $this->xml2arr($msg);
        return $data;
    }

    public function cabinetFolderInsert($params)
    {
        return $this->xmlCurl(ApiDefine::RMS_API_RAKUTEN_CABINET_FOLDER_INSERT, $params);
    }

    private function sortFile($xml, $path)
    {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'gif':
                $fileType = 'image/gif';
                break;
            case 'png':
                $fileType = 'image/png';
                break;
            default:
                $fileType = 'image/jpeg';
        }
        $req['xml'] = $xml;
        $req['file'] = new \CURLFile($path, $fileType, 'file');
        return $req;
    }
}
