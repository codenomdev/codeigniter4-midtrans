<?php

namespace Codenom\Midtrans\Config;

use CodeIgniter\Config\BaseConfig;

class Midtrans extends BaseConfig
{
    /**
     * Your merchant's server key
     *
     */
    public $serverKey = 'SB-Mid-server-5V_fYHfYcH-L23CgXMQ_8HIW';
    /**
     * Your merchant's client key
     *
     */
    public $clientKey = 'SB-Mid-client-NulOpyFTJmoQIv7p';
    /**
     * True for production
     * false for sandbox mode
     *
     */
    public $isProduction = false;
    /**
     * Set it true to enable 3D Secure by default
     *
     */
    public $is3ds = false;
    /**
     *  Set Append URL notification
     *
     */
    public $appendNotifUrl = '';
    /**
     *  Set Override URL notification
     *
     */
    public $overrideNotifUrl = '';
    /**
     * Enable request params sanitizer (validate and modify charge request params).
     * See Midtrans_Sanitizer for more details
     *
     */
    public $isSanitized = false;
    /**
     * Default options for every request
     * 
     */
    public $curlOptions = array();
}
