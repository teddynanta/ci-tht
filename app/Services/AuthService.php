<?php

namespace App\Services;

class AuthService
{
  protected $client;

  public function __construct()
  {
    $this->client = \Config\Services::curlrequest([
      'timeout' => 5,
    ]);
  }

  public function apiRegister($email, $first_name, $last_name, $password)
  {
    try {
      $response = $this->client->post('https://take-home-test-api.nutech-integrasi.com/registration', [
        'form_params' => [
          'email' => $email,
          'first_name' => $first_name,
          'last_name' => $last_name,
          'password' => $password
        ],
        'http_errors' => false,
      ]);

      return json_decode($response->getBody(), true);
    } catch (\Exception $e) {
      return [
        'status' => 500,
        'message' => 'Login API error: ' . $e->getMessage(),
        'data' => null,
      ];
    }
  }

  public function apiLogin($email, $password)
  {
    try {
      $response = $this->client->post('https://take-home-test-api.nutech-integrasi.com/login', [
        'form_params' => [
          'email' => $email,
          'password' => $password
        ],
        'http_errors' => false,
      ]);
      return json_decode($response->getBody(), true);
    } catch (\Exception $e) {
      return [
        'status' => 500,
        'message' => 'Login API error: ' . $e->getMessage(),
        'data' => null,
      ];
    }
  }

  public function getProfile($token)
  {
    try {
      $response = $this->client->get('https://take-home-test-api.nutech-integrasi.com/profile', [
        'headers' => [
          'Authorization' => 'Bearer ' . $token,
        ]
      ]);

      return json_decode($response->getBody(), true);
    } catch (\Exception $e) {
      return [
        'status' => 500,
        'message' => 'Login API error: ' . $e->getMessage(),
        'data' => null,
      ];
    }
  }
}
