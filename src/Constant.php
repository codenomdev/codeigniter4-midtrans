<?php

/**
 * @see       https://github.com/codenomdev/codeigniter4-midtrans for the canonical source repository
 *
 * @copyright 2020 - Codenom Dev (https://codenom.com).
 * @license   https://github.com/codenomdev/codeigniter4-midtrans/blob/main/LICENSE MIT License
 */

namespace Codenom\Midtrans;

class Constant
{
    /**
     * Constant value Base Veritrans.
     *
     * @return Sandbox Base URL Veritrans
     *
     * @version 2.0
     */
    const SANDBOX_BASE_URL = 'https://api.sandbox.veritrans.co.id/v2';
    /**
     * Constant value Base Veritrans.
     *
     * @return production Base URL Veritrans
     *
     * @version 2.0
     */
    const PRODUCTION_BASE_URL = 'https://api.veritrans.co.id/v2';
    /**
     * Constant value Base Midtrans.
     *
     * @return Sandbox Base URL Midtrans
     *
     * @version 1.0
     */
    const SNAP_SANDBOX_BASE_URL = 'https://app.sandbox.midtrans.com/snap/v1';
    /**
     * Constant value Base Midtrans.
     *
     * @return Production Base URL Midtrans
     *
     * @version 1.0
     */
    const SNAP_PRODUCTION_BASE_URL = 'https://app.midtrans.com/snap/v1';
    /**
     * CURL type POST.
     *
     * @return string
     */
    const CURL_TYPE_POST = 'POST';
    /**
     * CURL type GET.
     *
     * @return string
     */
    const CURL_TYPE_GET = 'GET';
    /**
     * Content Type Header request.
     *
     * @return string
     */
    const CONTENT_TYPE = 'application/json';
    /**
     * Accpet Header request.
     *
     * @return string
     */
    const ACCEPT = 'application/json';
}
