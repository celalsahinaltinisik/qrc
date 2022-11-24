<?php

namespace celalsahinaltinisik\qrc\Services;

interface UIGoogle
{
    /**
     * @param string $string
     * @param bool $iSBASE64
     * @return mixed
    */
    public function crateQRCode(string $string = null, bool $iSBASE64 = true, string $imagesize = "300x300");
}
