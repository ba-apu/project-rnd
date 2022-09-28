<?php


namespace App\Libraries;


interface InterfaceApiCall
{
    public function callApi(array $data);

    public function setParams(array $data);

    public function callToApi($data, $header = [], $setLocalhost = false);
}