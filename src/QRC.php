<?php

namespace celalsahinaltinisik\qrc;

use celalsahinaltinisik\qrc\Services\UIGoogle;

class QRC
{
    const GOOGLE = 'google';
    private $google = false;

    public function __construct(UIGoogle $googl)
    {
        $this->google = $googl;
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
