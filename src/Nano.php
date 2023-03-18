<?php
/*
Nano HTTPClient
*/

namespace HTTPClient;

class Nano
{
    private $base_url;

    public function __construct($base_url)
    {
        $this->base_url = $base_url;
    }

    public function get($endpoint, $params = [])
    {
        $query_params = http_build_query($params);
        $url = "{$this->base_url}/{$endpoint}?{$query_params}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new \Exception(curl_error($ch));
        }

        curl_close($ch);

        return $response;
    }

    public function post($endpoint, $data = [])
    {
        $url = "{$this->base_url}/{$endpoint}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new \Exception(curl_error($ch));
        }

        curl_close($ch);

        return $response;
    }
}