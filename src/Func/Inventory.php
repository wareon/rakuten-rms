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
            'externalUserAuthModel' => [
                'authKey' => $this->authHeader(),
                'shopUrl' => $this->settlementShopUrl,
                'userName' => $this->settlementUserName
            ],
            'getRequestExternalModel' => $params
        ];
        $datas['method'] = 'getInventoryExternal';
        $ret = $this->curl($this->soapUrl, true, json_encode($datas));
        return json_decode($ret, true);
    }

    public function updateInventory($params)
    {
        $datas['params'] = [
            'externalUserAuthModel' => [
                'authKey' => $this->authHeader(),
                'shopUrl' => $this->settlementShopUrl,
                'userName' => $this->settlementUserName
            ],
            'updateRequestExternalModel' =>
                [
                    ['updateRequestExternalItem'=>$params]
                ]
        ];
        $datas['method'] = 'updateInventoryExternal';
        $ret = $this->curl($this->soapUrl, true, json_encode($datas));
        return json_decode($ret, true);
    }

}
