<?php

/**
 * @see       https://github.com/codenomdev/codeigniter4-midtrans for the canonical source repository
 *
 * @copyright 2020 - Codenom Dev (https://codenom.com).
 * @license   https://github.com/codenomdev/codeigniter4-midtrans/blob/main/LICENSE MIT License
 */

namespace Codenom\Midtrans\HTTP;

class APIMidtrans
{
    /**
     * @var =                                                   \Codenom\Midtrans\Constant::CURL_TYPE_GET (default GET)
     * @var \Codenom\Midtrans\Parse\JSONParse::encode($options)
     * @var string                                              URL
     *
     * @param array  $options   = [] //for sent data to API Midtrans
     * @param string $serverKey \Codenom\Midtrans\Config\Midtrans
     *
     * @return object response body
     */
    public static function call($typeCURL = \Codenom\Midtrans\Constant::CURL_TYPE_GET, string $endPoint = '', string $serverKey = '', array $options = [])
    {
        $services = \CodeIgniter\Config\Services::curlrequest();

        return $services->setBody(
            \Codenom\Midtrans\Parse\JSONParse::encode($options)
        )
            ->request(
                $typeCURL,
                $endPoint,
                ['headers' => [
                    'Content-type'  => \Codenom\Midtrans\Constant::CONTENT_TYPE,
                    'Accept'        => \Codenom\Midtrans\Constant::ACCEPT,
                    'Authorization' => 'Basic ' . \base64_encode($serverKey . ':'),
                ]]
            )->getBody();
    }
}
