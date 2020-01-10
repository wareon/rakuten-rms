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

class RakutenRms
{
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
        $this->config = $config;
    }
    /**
     * @param string $msg
     * @return string
     */
    public function success($msg = ''){
        $config_arr = $this->config->get('rakuten-rms.options');
        $msg .= json_encode($config_arr);
        return $msg.' <strong>from your custom develop package!</strong>>';
    }
}
