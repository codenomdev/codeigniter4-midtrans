<?php

/**
 * @see       https://github.com/codenomdev/codeigniter4-midtrans for the canonical source repository
 *
 * @copyright 2020 - Codenom Dev (https://codenom.com).
 * @license   https://github.com/codenomdev/codeigniter4-midtrans/blob/main/LICENSE MIT License
 */

namespace Codenom\Midtrans\Parse;

class JSONParse
{
    /**
     * Encode data.
     *
     * @var \Laminas\Json\Json
     *
     * @param mixed
     *
     * @return JSON Encode
     */
    public static function encode($param, bool $bool = true)
    {
        return \Laminas\Json\Json::encode($param, $bool);
    }

    /**
     * Decode data to Object return.
     *
     * @var \Laminas\Json\Json
     *
     * @param array
     *
     * @return object
     */
    public static function decodeToObject($param)
    {
        return \Laminas\Json\Json::decode($param, \Laminas\Json\Json::TYPE_OBJECT);
    }

    /**
     * Decode data to Array return.
     *
     * @var \Laminas\Json\Json
     *
     * @param array
     *
     * @return array
     */
    public static function decodeToArray($param)
    {
        return \Laminas\Json\Json::decode($param, \Laminas\Json\Json::TYPE_ARRAY);
    }
}
