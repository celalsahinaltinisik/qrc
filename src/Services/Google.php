<?php

namespace celalsahinaltinisik\qrc\Services;

use Exception;
use GuzzleHttp\Client;

class Google implements UIGoogle
{
    private int $status = 200;
    /**
     * @param string $string
     * @param bool $iSBase64
     * @param bool $imageSize
     * @return mixed
    */
    public function crateQRCode(string $string = null, bool $iSBase64 = true, string $imageSize = "300x300")
    {
        try {
            $client = new Client(['base_uri' => 'https://chart.googleapis.com']);
            $response = $client->request('GET', 'chart?cht=qr&chs=' . $imageSize . '&chl=' . $string, ['stream' => true]);
            if ($status = $response->getStatusCode() != $this->status) {
                throw new Exception('google request not success. Status code: ' . $status);
            }
            $body = $response->getBody()->getContents();
            $base64 = base64_encode($body);
            $mime = "image/jpeg";
            $img = ('data:' . $mime . ';base64,' . $base64);
            if ($iSBase64) {
                return $img;
            }
            return "<img src=$img alt='ok'>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
