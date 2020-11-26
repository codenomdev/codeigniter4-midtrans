<?php

namespace Codenom\Midtrans\Config;

use CodeIgniter\Config\Services as CoreServices;
use Codenom\Midtrans\Config\Midtrans as MidtransConfig;
use Codenom\Midtrans\Midtrans;
use Codenom\Midtrans\Veritrans;

class Services extends CoreServices
{
    public static function Midtrans(MidtransConfig $midtransConfig = null, bool $getShared = true)
    {
        if ($getShared) {
            return self::getSharedInstance('Midtrans', $midtransConfig);
        }
        $midtransConfig = $midtransConfig ?? config('Midtrans');
        return new Midtrans($midtransConfig);
    }

    public static function Veritrans(MidtransConfig $midtransConfig = null, bool $getShared = true)
    {
        if ($getShared) {
            return self::getSharedInstance('Veritrans', $midtransConfig);
        }
        $midtransConfig = $midtransConfig ?? config('Midtrans');
        return new Veritrans($midtransConfig);
    }
}
