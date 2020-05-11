<?php
/**
 * config file
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/10 12:25
 * @since rakuten rms 1.0
 */

return [
    'order_debug' => env('ORDER_DEBUG', false),
    'replace_api' => env('REPLACE_API', ''),
    'soap_url' => env('SOAP_URL', ''),
    'service_secret' => env('RMS_SERVICE_SECRET', ''),
    'license_key' => env('RMS_LICENSE_KEY', ''),

    'settlement_user_name' => env('RMS_SETTLEMENT_USER_NAME', ''),
    'settlement_shop_url' => env('RMS_SETTLEMENT_SHOP_URL', ''),
    'settlement_auth' => env('RMS_SETTLEMENT_AUTH', ''),
    'test_mail_address' => env('RMS_TEST_MAIL_ADDRESS', ''),

    'log_file' => 'output.log',

    'proxy' => false,
    'curlopt_proxy' => '',
    'curlopt_proxy_port' => '',
    'curlopt_proxy_userpwd' => '',

    'replace_urls' => [
        'https://api.rms.rakuten.co.jp',
        'https://image.rakuten.co.jp',
        'https://inventoryapi.rms.rakuten.co.jp',
        'https://orderapi.rms.rakuten.co.jp',
        'http://thumbnail.image.rakuten.co.jp',
        'https://item.rakuten.co.jp',
        'https://www.rakuten.ne.jp'
    ]
];
