<?php

namespace App\Services;

class DashboardService
{
  protected $client;

  public function __construct()
  {
    $this->client = \Config\Services::curlrequest([
      'timeout' => 5,
    ]);
  }

  public function getBalance($token)
  {
    try {
      $response = $this->client->get('https://take-home-test-api.nutech-integrasi.com/balance', [
        'headers' => [
          'Authorization' => 'Bearer ' . $token,
        ],
        'http_errors' => false,
      ]);

      return json_decode($response->getBody(), true);
    } catch (\Exception $e) {
      return [
        'status' => 500,
        'message' => 'Get balance API error: ' . $e->getMessage(),
        'data' => null,
      ];
    }
  }

  public function topUp($token, $amount)
  {
    try {
      $response = $this->client->get('https://take-home-test-api.nutech-integrasi.com/balance', [
        'headers' => [
          'Authorization' => 'Bearer ' . $token,
        ],
        'form_params' => [
          'top_up_amount' => $amount,
        ],
        'http_errors' => false,
      ]);

      return json_decode($response->getBody(), true);
    } catch (\Exception $e) {
      return [
        'status' => 500,
        'message' => 'Get balance API error: ' . $e->getMessage(),
        'data' => null,
      ];
    }
  }

  public function getService($token)
  {
    try {
      $response = $this->client->get('https://take-home-test-api.nutech-integrasi.com/services', [
        'headers' => [
          'Authorization' => 'Bearer ' . $token,
        ],
        'http_errors' => false,
      ]);

      return json_decode($response->getBody(), true);
    } catch (\Exception $e) {
      return [
        'status' => 500,
        'message' => 'Get balance API error: ' . $e->getMessage(),
        'data' => null,
      ];
    }
  }

  public function getBanner($token)
  {
    try {
      $response = $this->client->get('https://take-home-test-api.nutech-integrasi.com/banner', [
        'headers' => [
          'Authorization' => 'Bearer ' . $token,
        ],
        'http_errors' => false,
      ]);

      return json_decode($response->getBody(), true);
    } catch (\Exception $e) {
      return [
        'status' => 500,
        'message' => 'Get balance API error: ' . $e->getMessage(),
        'data' => null,
      ];
    }
  }
}
