<?php

namespace Codenom\Midtrans;

use Codenom\Midtrans\Libraries\Midtrans;
use Codenom\Midtrans\HTTP\APIMidtrans;

class Veritrans
{
    /**
     * Property Protected
     * 
     * @var \Codenom\Framework\Config\Midtrans;
     */
    protected $config;
    protected $veritrans;

    public function __construct($config = null)
    {
        $this->config = $config;
        $this->veritrans = new Midtrans();
    }

    /**
     * Payment with SNAP Midtrans
     * Data to Decode before sent CURL Request
     * After get response from CURL, then parsing data encode to decode [Object]
     * 
     * @var Type CURL POST = \Codenom\Midtrans\Constant::CURL_TYPE_POST
     * @param array $placeOrder
     * @return object response CURL
     */
    public function getStatus($id)
    {
        return \Codenom\Midtrans\Parse\JSONParse::decodeFromObject(
            APIMidtrans::call(
                \Codenom\Midtrans\Constant::CURL_TYPE_GET,
                $this->veritrans->getBaseUrl() . '/' . $id . '/status',
                $this->config->serverKey
            )
        );
    }
}
