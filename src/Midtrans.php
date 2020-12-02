<?php

/**
 * @see       https://github.com/codenomdev/codeigniter4-midtrans for the canonical source repository
 *
 * @copyright 2020 - Codenom Dev (https://codenom.com).
 * @license   https://github.com/codenomdev/codeigniter4-midtrans/blob/main/LICENSE MIT License
 */

namespace Codenom\Midtrans;

use Codenom\Midtrans\HTTP\APIMidtrans;
use Codenom\Midtrans\Libraries\Midtrans as LibrariesMidtrans;

class Midtrans
{
    /**
     * @var \Codenom\Midtrans\Config\Midtrans
     */
    protected $config;

    /**
     * @var \Codenom\Midtrans\Libraries\Midtrans;
     */
    protected $midtrans;

    /**
     * Construct builder class.
     *
     * @param $config \Codenom\Midtrans\Config\Midtrans
     *
     * @var \Codenom\Midtrans\Libraries\Midtrans
     */
    public function __construct($config = null)
    {
        $this->config = $config;
        $this->midtrans = new LibrariesMidtrans();
    }

    /**
     * Payment with SNAP Midtrans
     * Data to Decode before sent CURL Request
     * After get response from CURL, then parsing data encode to decode [Object].
     *
     * @var Type CURL POST = \Codenom\Midtrans\Constant::CURL_TYPE_POST
     *
     * @param array $placeOrder
     *
     * @return object response CURL
     */
    public function getSnapToken(array $placeOrder = [])
    {
        return \Codenom\Midtrans\Parse\JSONParse::decodeToObject(
            APIMidtrans::call(
                \Codenom\Midtrans\Constant::CURL_TYPE_POST,
                $this->midtrans->getSnapBaseUrl() . '/transactions',
                $this->config->serverKey,
                $placeOrder
            )
        );
    }
}
