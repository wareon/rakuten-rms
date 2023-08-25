<?php

/**
 * Rabuten Rms class
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/10 12:27
 * @since rakuten rms 1.0
 */

namespace Wareon\RakutenRms;

use Illuminate\Config\Repository;
use Wareon\RakutenRms\Func\Cabinet as FuncCabinet;
use Wareon\RakutenRms\Func\Categroy as FuncCategroy;
use Wareon\RakutenRms\Func\Item as FuncItem;
use Wareon\RakutenRms\Func\Product as FuncProduct;
use Wareon\RakutenRms\Func\Navigation as FuncNavigation;
use Wareon\RakutenRms\Func\Order as FuncOrder;
use Wareon\RakutenRms\Func\InquiryManagement as FuncInquiryManagement;
use Wareon\RakutenRms\Func\Inventory as FuncInventory;
use Wareon\RakutenRms\Func\Shop as FuncShop;
use Wareon\RakutenRms\Func\Coupon as FuncCoupon;


class RakutenRms
{
    use FuncItem;
    use FuncProduct;
    use FuncNavigation;
    use FuncCabinet;
    use FuncCategroy;
    use FuncOrder;
    use FuncInquiryManagement;
    use FuncInventory;
    use FuncShop;
    use FuncCoupon;

    public $replaceApi = '';

    public $serviceSecret = "";
    public $licenseKey = "";
    public $settlementUserName = "";
    public $settlementShopUrl = "";
    public $settlementAuth = "";
    public $testMailAddress = "";

    public $logFile = ''; //output log file

    public $proxy = false;
    public $curloptProxy = '';
    public $curloptProxyPort = '';
    public $curloptProxyUserpwd = '';

    public $replaceUrls = [];

    /**
     * @var Repository
     */
    protected $config;

    /**
     * Packagetest constructor.
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config->get('rakuten-rms');
        $this->replaceApi = $this->config['replace_api'];
        $this->serviceSecret = $this->config['service_secret'];
        $this->licenseKey = $this->config['license_key'];
        $this->settlementUserName = $this->config['settlement_user_name'];
        $this->settlementShopUrl = $this->config['settlement_shop_url'];
        $this->settlementAuth = $this->config['settlement_auth'];
        $this->testMailAddress = $this->config['test_mail_address'];
        $this->logFile = $this->config['log_file'];
        $this->proxy = $this->config['proxy'];
        $this->curloptProxy = $this->config['curlopt_proxy'];
        $this->curloptProxyPort = $this->config['curlopt_proxy_port'];
        $this->curloptProxyUserpwd = $this->config['curlopt_proxy_userpwd'];
        $this->replaceUrls = $this->config['replace_urls'];
        $this->orderDebug = $this->config['order_debug'];
        $this->soapUrl = $this->config['soap_url'];
    }

    /**
     * Dynamic switch configuration
     * @param $config
     */
    public function changeConfig($config)
    {
        if (isset($config['replace_api'])) $this->replaceApi = $config['replace_api'];
        if (isset($config['service_secret'])) $this->serviceSecret = $config['service_secret'];
        if (isset($config['license_key'])) $this->licenseKey = $config['license_key'];
        if (isset($config['settlement_user_name'])) $this->settlementUserName = $config['settlement_user_name'];
        if (isset($config['settlement_shop_url'])) $this->settlementShopUrl = $config['settlement_shop_url'];
        if (isset($config['settlement_auth'])) $this->settlementAuth = $config['settlement_auth'];
        if (isset($config['test_mail_address'])) $this->testMailAddress = $config['test_mail_address'];
        if (isset($config['log_file'])) $this->logFile = $config['log_file'];
        if (isset($config['proxy'])) $this->proxy = $config['proxy'];
        if (isset($config['curlopt_proxy'])) $this->curloptProxy = $config['curlopt_proxy'];
        if (isset($config['curlopt_proxy_port'])) $this->curloptProxyPort = $config['curlopt_proxy_port'];
        if (isset($config['curlopt_proxy_userpwd'])) $this->curloptProxyUserpwd = $config['curlopt_proxy_userpwd'];
        if (isset($config['replace_urls'])) $this->replaceUrls = $config['replace_urls'];
        if (isset($config['order_debug'])) $this->orderDebug = $config['order_debug'];
        if (isset($config['soap_url'])) $this->soapUrl = $config['soap_url'];
    }

    public function getReplaceUrl($url)
    {
        $query['uri'] = '';
        $query['url'] = 0;
        foreach ($this->replaceUrls as $i => $replaceUrl) {
            if (strpos($url, $replaceUrl) === 0) {
                $query['uri'] = substr($url, strlen($replaceUrl));
                $query['url'] = $i;
                break;
            }
        }
        $newUrl = $this->replaceApi . '?' . http_build_query($query);
        return $newUrl;
    }

    public function dealUrl($uri)
    {
        $query['uri'] = urlencode($uri);
        if (!empty($this->replaceApi)) {
            if (strpos($this->replaceApi, '?') !== false)
                $a = '&';
            else $a = '?';
            return $this->replaceApi . $a . http_build_query($query);
        } else {
            return ApiDefine::HOST . $uri;
        }
    }

    public function xml2arr($xmlStr)
    {
        $xml = simplexml_load_string($xmlStr);
        $jsonStr = json_encode($xml);
        return json_decode($jsonStr, true);
    }

    function object2array($object)
    {
        $json = json_encode($object);
        return json_decode($json, true);
    }

    public function arr2xml($arr)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= $this->arrToXml($arr);
        return $xml;
    }

    private function arrToXml($arr)
    {
        $xml = '';
        foreach ($arr as $key => $val) {
            if (!is_numeric($key)) {
                if(strpos($key, 'shopbiz:') !== false) {
                    $key1 = $key . ' xmlns:shopbiz="http://rakuten.co.jp/rms/mall/shop/biz/api/model/resource"';
                    $key2 = $key;
                } else {
                    $key1 = $key2 = $key;
                }
                if (is_array($val)) {
                    $xml .= '<' . $key1 . '>' . $this->arrToXml($val) . '</' . $key2 . '>';
                } else {
                    $xml .= '<' . $key1 . '>' . htmlspecialchars($val) . '</' . $key2 . '>';
                }
            } else {
                if (is_array($val)) {
                    $xml .= $this->arrToXml($val);
                } else {
                    $xml .= htmlspecialchars($val);
                }
            }
        }
        return $xml;
    }

    public function strToUtf8($str)
    {
        $encode = mb_detect_encoding($str, array("ASCII", 'UTF-8', "GB2312", "GBK", 'BIG5', 'EUC-JP'));
        if ($encode == 'UTF-8') {
            return $str;
        } else {
            return mb_convert_encoding($str, 'UTF-8', $encode);
        }
    }

    public function utf8ToEuc_jp($str)
    {
        return mb_convert_encoding($str, 'EUC-JP', 'UTF-8');
    }

    public function authHeader()
    {
        $cryptStr = 'ESA ' . base64_encode($this->serviceSecret . ':' . $this->licenseKey);
        return $cryptStr;
    }

    private function queryCurl($url, $params, $isPost = false)
    {
        $url = $this->dealUrl($url);
        $ret = $this->curl($url, $isPost, $params);
        $msg = $this->strToUtf8($ret);
        $data = $this->xml2arr($msg);
        return $data;
    }

    private function xmlCurl($url, $arr)
    {
        $xml = $this->arr2xml($arr);
        $url = $this->dealUrl($url);
        $ret = $this->curl($url, true, $xml, ApiDefine::REQUEST_XML);
        $msg = $this->strToUtf8($ret);
        $data = $this->xml2arr($msg);
        return $data;
    }

    private function jsonCustomerCurl($url, $params, $requestType = null)
    {
        $url = $this->dealUrl($url);
        $ret = $this->curl($url, true, $params, ApiDefine::REQUEST_JSON, $requestType);
        $msg = $this->strToUtf8($ret);
        $data = json_decode($msg, true);
        return $data;
    }

    private function jsonCurl($url, $params, $isPost = true, $requestType = null)
    {
        $url = $this->dealUrl($url);
        $ret = $this->curl($url, $isPost, $params, ApiDefine::REQUEST_JSON);
        $msg = $this->strToUtf8($ret);
        $data = json_decode($msg, true);
        return $data;
    }

    public function curl($url, $post = false, $params = [], $type = ApiDefine::REQUEST_XML, $requestType = null)
    {
        if ($type == ApiDefine::REQUEST_XML) {
            $headerArray = array(
                "Content-type: application/xml; charset=utf-8",
                "Accept: application/xml"
            );
        } else if ($type == ApiDefine::REQUEST_JSON) {
            $headerArray = array(
                "Content-type: application/json; charset=utf-8",
                "Accept: application/json"
            );
        } else if ($type == ApiDefine::REQUEST_FILE) {
            $headerArray = array(
                "Content-type: multipart/form-data;",
                "Accept: application/json"
            );
        } else {
            $headerArray = array(
                "Accept: */*"
            );
        }

        $headerArray[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36";
        $headerArray[] = 'Authorization: ' . $this->authHeader();
        $headerArray[] = 'Accept-encoding: gzip, deflate, identity';
        $ch = curl_init();
        if(empty($requestType)) {
            curl_setopt($ch, CURLOPT_POST, $post);
        } else {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $requestType);
        }
        if ($post === false) {
            if (!empty($params)) {
                if (strpos($url, '?') === false) {
                    $url .= '?' . http_build_query($params);
                } else {
                    $url .= '&' . http_build_query($params);
                }
            }
        } else {
            if ($type == ApiDefine::REQUEST_JSON && !empty($params)) {
                $fields = json_encode($params, JSON_UNESCAPED_UNICODE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            } else if ($type == ApiDefine::REQUEST_XML && !empty($params)) {
                if (is_array($params)) $fields = http_build_query($params);
                else if (is_string($params)) $fields = $params;
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            } else if ($type == ApiDefine::REQUEST_XML_FILE && !empty($params)) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            }
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
        curl_setopt($ch, CURLOPT_ENCODING, '');

        if ($this->proxy) {
            curl_setopt($ch, CURLOPT_PROXY, $this->curloptProxy);
            curl_setopt($ch, CURLOPT_PROXYPORT, $this->curloptProxyPort);
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->curloptProxyUserpwd);
        }
        $output = curl_exec($ch);
        $error = curl_error($ch);

        if (!empty($this->logFile)) {
            $date = '[' . date('Y-m-d H:i:s') . "]: \n";
            $br = "\n\n";
            $log = '';
            if (!empty($error)) $log .= $error . $br;
            if ($errno = curl_errno($ch)) {
                $error_message = curl_strerror($errno);
                $log .= "cURL error ({$errno}): {$error_message}" . $br;
            }
            $this->log($date . $log . $output . $br, $this->logFile);
        }
        curl_close($ch);
        return $output;
    }

    public function log($output, $file = 'output.log')
    {
        try {
            file_put_contents(storage_path($file), $output, FILE_APPEND);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
