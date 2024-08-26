<?php

namespace App\Services;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class MpesaService
{
    protected $apiUrl;
    protected $credentials;

    public function __construct()
    {
        $this->apiUrl = env('MPESA_API_URL'); // Store API URL in .env
        $this->credentials = [
            'username' => env('MPESA_USERNAME'),
            'password' => env('MPESA_PASSWORD'),
        ];
    }

    public function initiatePaymentPlan($amount, $phoneNumber, $callbackUrl)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getAccessToken(),
        ])->post("{$this->apiUrl}/paymentplan", [
            'amount' => $amount,
            'phone_number' => $phoneNumber,
            'callback_url' => $callbackUrl,
        ]);

        return $response->json();
    }

    public function getAccessToken()
    {
        $response = Http::post("{$this->apiUrl}/oauth/token", [
            'grant_type' => 'client_credentials',
            'client_id' => $this->credentials['username'],
            'client_secret' => $this->credentials['password'],
        ]);

        return $response->json();
    }

    // Add methods for other functionalities if needed
}
