<?php

namespace Bagus\SiCepat;

use Requests;

class Pickup
{
	private $api_key;
	private $url;

	public function __construct($api_key, $url)
	{
		$this->api_key = $api_key;
		$this->url = $url;
		return $this;
	}

	public function request($data = [])
	{
		$url = $this->url . '/api/partner/requestpickuppackage';
        $data['auth_key'] = $this->api_key;
		$response = Requests::post($url, [], $data);

		if (isset($response->body)) {
			return json_decode($response->body);
		}
	}

	public function cancel($receipt_number = '')
	{
		$url = $this->url . '/api/partner/cancelpickup';
        $data['auth_key'] = $this->api_key;
		$response = Requests::post($url, [], $data);
		
		if (isset($response->body)) {
			return json_decode($response->body);
		}
	}
}
