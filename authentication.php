<?php
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;
$url = 'http://localhost/wordpress'; //$_POST['url'];
$ck = 'ck_6f5281c168e54f5896fb70f7323df29ee57bc6a1'; //$_POST['ck'];
$cs = 'cs_019ce666405ad7f47ff024616393adc5e0c35dbb'; //$_POST['cs'];
$woocommerce = new Client($url,$ck,$cs,
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true
    ]
);