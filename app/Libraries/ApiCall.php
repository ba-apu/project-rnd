<?php


namespace App\Libraries;


class ApiCall extends AbstractApiCall
{
    protected $data = [];
    protected $config = [];

    public function __construct()
    {
        $this->config = config('services');
    }

    public function callApi(array $requestData, $url_name = '', $pattern = 'json'){
        if (empty($requestData)) {
            return "Please provide a valid information";
        }

        $header = [];

        $this->setApiUrl($this->config['API'][$url_name]);

        // Set the required/additional params
        $this->setParams($requestData);

        // Now, call the API
        $response = $this->callToApi($this->data, $header, $this->config['API']['connect_from_localhost']);

        $formattedResponse = $this->formatResponse($response, $pattern); // Here we will define the response pattern

        return $formattedResponse;
    }

    public function setParams(array $requestData)
    {
        $this->data = $requestData;
    }

    /**
     * @param $response
     * @param string $type
     * @param string $pattern
     * @return false|mixed|string
     */
    public function formatResponse($response)
    {
        $response_data = json_decode($response, true);

        return $response_data;
    }

}