<?php
/**
 * product api
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/4/21 9:12
 * @since v1.0
 */

namespace Wareon\RakutenRms\Func;

use Wareon\RakutenRms\ApiDefine;
use Wareon\RakutenRms\wsdl\ExternalUserAuthModel;

trait Inventory
{
    public $soapUrl = '';

    public function getInventory($params)
    {
        $datas['params'] = [
            'externalUserAuthModel' => $this->soapUserAuth(),
            'getRequestExternalModel' => $params
        ];
        $datas['method'] = 'getInventoryExternal';
        return $this->soapCurl($datas);
    }

    public function updateInventory($params)
    {
        $datas['params'] = [
            'externalUserAuthModel' => $this->soapUserAuth(),
            'updateRequestExternalModel' => $params
        ];
        $datas['method'] = 'updateInventoryExternal';
        return $this->soapCurl($datas);
    }

    public function updateSingleInventory($params)
    {
        $datas['params'] = [
            'externalUserAuthModel' => $this->soapUserAuth(),
            'updateRequestExternalModel' => $params
        ];
        $datas['method'] = 'updateSingleInventoryExternal';
        return $this->soapCurl($datas);
    }

    private function soapUserAuth()
    {
        return [
            'authKey' => $this->authHeader(),
            'shopUrl' => $this->settlementShopUrl,
            'userName' => $this->settlementUserName
        ];
    }

    private function soapCurl($datas)
    {
        if (empty($this->soapUrl)) {
            return $this->soap($datas);
        } else {
            $ret = $this->curl($this->soapUrl, true, json_encode($datas));
            return json_decode($ret, true);
        }
    }

    private function soap($json)
    {
        $params = $json['params'] ?? [];
        $method = $json['method'] ?? 'default';
        try {
            $client = new \SoapClient(__DIR__ . "/../wsdl/inventoryapi.wsdl", ['trace' => 1]);
            $ret = $client->{$method}($params);
            $json = json_encode($ret);
            $json = json_decode($json, true);
            return json_encode($json);
        } catch (Exception $e) {
            $error['errCode'] = 'soap-error';
            $error['errMessage'] = $e->getMessage();
            $ret['result'] = $error;
            return json_encode($ret);
        }
    }

}
