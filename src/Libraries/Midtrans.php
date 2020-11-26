<?php

namespace Codenom\Midtrans\Libraries;

class Midtrans
{
    /**
     * Property Protected
     * 
     * @var \Codenom\Midtrans\Config\Midtrans;
     */
    protected $config;

    public function __construct()
    {
        $this->config = config('Midtrans');
    }

    /**
     * Get baseUrl
     * 
     * @return string Midtrans API URL, depends on public $isProduction
     */
    public function getBaseUrl()
    {
        return $this->config->isProduction ?
            \Codenom\Midtrans\Constant::PRODUCTION_BASE_URL : \Codenom\Midtrans\Constant::SANDBOX_BASE_URL;
    }

    /**
     * Get snapBaseUrl
     * 
     * @return string Snap API URL, depends on public $isProduction
     */
    public function getSnapBaseUrl()
    {
        return $this->config->isProduction ?
            \Codenom\Midtrans\Constant::SNAP_PRODUCTION_BASE_URL : \Codenom\Midtrans\Constant::SNAP_SANDBOX_BASE_URL;
    }
}
