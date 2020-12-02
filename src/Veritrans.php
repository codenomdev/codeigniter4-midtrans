<?php

/**
 * @see       https://github.com/codenomdev/codeigniter4-midtrans for the canonical source repository
 *
 * @copyright 2020 - Codenom Dev (https://codenom.com).
 * @license   https://github.com/codenomdev/codeigniter4-midtrans/blob/main/LICENSE MIT License
 */

namespace Codenom\Midtrans;

use Codenom\Midtrans\HTTP\APIMidtrans;
use Codenom\Midtrans\Libraries\Midtrans;

class Veritrans
{
    /**
     * Property Protected.
     *
     * @var \Codenom\Midtrans\Config\Midtrans;
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
     * After get response from CURL, then parsing data encode to decode [Object].
     *
     * @var Type CURL POST = \Codenom\Midtrans\Constant::CURL_TYPE_POST
     *
     * @param string $id
     *
     * @return object response CURL
     */
    public function getStatus($id)
    {
        return \Codenom\Midtrans\Parse\JSONParse::decodeToObject(
            APIMidtrans::call(
                \Codenom\Midtrans\Constant::CURL_TYPE_GET,
                $this->veritrans->getBaseUrl() . '/' . $id . '/status',
                $this->config->serverKey
            )
        );
    }

    /**
     * Payment VT Web Checkout Payments
     * Data to Decode before sent CURL Request
     * After get response from CURL, then parsing data encode to decode [Object].
     *
     * @var Type CURL POST = \Codenom\Midtrans\Constant::CURL_TYPE_POST
     *
     * @param array $payload
     *
     * @return string Redirect URL
     */
    public function vtWebCharge($payload)
    {
        return \Codenom\Midtrans\Parse\JSONParse::decodeToObject(
            APIMidtrans::call(
                \Codenom\Midtrans\Constant::CURL_TYPE_POST,
                $this->veritrans->getBaseUrl() . '/charge',
                $this->config->serverKey,
                $payload
            )
        )->redirect_url;
    }

    /**
     * Payment VT Web Direct Checkout Payments
     * Data to Decode before sent CURL Request
     * After get response from CURL, then parsing data encode to decode [Object].
     *
     * @var Type CURL POST = \Codenom\Midtrans\Constant::CURL_TYPE_POST
     *
     * @param array $payload
     *
     * @return object response CURL
     */
    public function vtWebDirectCharge($payload)
    {
        return \Codenom\Midtrans\Parse\JSONParse::decodeToObject(
            APIMidtrans::call(
                \Codenom\Midtrans\Constant::CURL_TYPE_POST,
                $this->veritrans->getBaseUrl() . '/charge',
                $this->config->serverKey,
                $payload
            )
        );
    }

    /**
     * Appove challenge transaction
     * Data to Decode before sent CURL Request
     * After get response from CURL, then parsing data encode to decode [Object].
     *
     * @var Type CURL POST = \Codenom\Midtrans\Constant::CURL_TYPE_POST
     *
     * @param string $id Order ID or transaction ID
     *
     * @return object
     */
    public function approve($id)
    {
        return \Codenom\Midtrans\Parse\JSONParse::decodeToObject(
            APIMidtrans::call(
                \Codenom\Midtrans\Constant::CURL_TYPE_POST,
                $this->veritrans->getBaseUrl() . '/' . $id . '/approve',
                $this->config->serverKey
            )
        );
    }

    /**
     * Cancel transaction before it's setteled
     * Data to Decode before sent CURL Request
     * After get response from CURL, then parsing data encode to decode [Object].
     *
     * @var Type CURL POST = \Codenom\Midtrans\Constant::CURL_TYPE_POST
     *
     * @param string $id Order ID or transaction ID
     *
     * @return object
     */
    public function cancel($id)
    {
        return \Codenom\Midtrans\Parse\JSONParse::decodeToObject(
            APIMidtrans::call(
                \Codenom\Midtrans\Constant::CURL_TYPE_POST,
                $this->veritrans->getBaseUrl() . '/' . $id . '/cancel',
                $this->config->serverKey
            )
        );
    }

    /**
     * Expire transaction before it's setteled
     * Data to Decode before sent CURL Request
     * After get response from CURL, then parsing data encode to decode [Object].
     *
     * @var Type CURL POST = \Codenom\Midtrans\Constant::CURL_TYPE_POST
     *
     * @param string $id Order ID or transaction ID
     *
     * @return object
     */
    public function expire($id)
    {
        return \Codenom\Midtrans\Parse\JSONParse::decodeToObject(
            APIMidtrans::call(
                \Codenom\Midtrans\Constant::CURL_TYPE_POST,
                $this->veritrans->getBaseUrl() . '/' . $id . '/expire',
                $this->config->serverKey
            )
        );
    }
}
