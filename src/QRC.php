<?php

namespace celalsahinaltinisik\qrc;

use celalsahinaltinisik\qrc\Services\Google;
use celalsahinaltinisik\qrc\Services\UIGoogle;

final class QRC
{
    const GOOGLE = 'google';
    private $google = false;

    public function __construct()
    {
        $this->google = new Google();
    }
    /**
     * @param string $serviceName
     * @param string $string
     * @param bool $iSBase64
     * @param string $imageSize
     * @return mixed
    */
    public function qrc($serviceName = self::GOOGLE, string $string = null, bool $iSBase64 = true, string $imageSize = "300x300")
    {
        if ($serviceName == self::GOOGLE) {
            return $this->google->crateQRCode($string, $iSBase64 = true, $imageSize);
        }
    }
}
