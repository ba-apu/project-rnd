<?php


namespace App\Libraries;


abstract class AbstractApiCall implements InterfaceApiCall
{
    protected $apiUrl;

    protected function setApiUrl($url)
    {
        $this->apiUrl = $url;
    }

    protected function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @param $data
     * @param array $header
     * @param bool $setLocalhost
     * @return bool|string
     */
    public function callToApi($data, $header = [], $setLocalhost = false)
    {
        $curl = curl_init();

        if (!$setLocalhost) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // The default value for this option is 2. It means, it has to have the same name in the certificate as is in the URL you operate against.
        } else {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // When the verify value is 0, the connection succeeds regardless of the names in the certificate.
        }

        curl_setopt($curl, CURLOPT_URL, $this->getApiUrl());
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $curlErrorNo = curl_errno($curl);
        curl_close($curl);

        if ($code == 200 & !($curlErrorNo)) {
            return $response;
        } else {
            return "FAILED TO CONNECT WITH API";
            //return "cURL Error #:" . $err;
        }
    }

}