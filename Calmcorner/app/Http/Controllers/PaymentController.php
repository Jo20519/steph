<?php

namespace App\Http\Controllers;
use App\Services\MpesaService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   

    protected $mpesa;

    public function __construct(MpesaService $mpesa)
    {
        $this->mpesa = $mpesa;
    }

    public function showPaymentForm()
    {
        return view('mpesa.paymentform'); // Ensure this view file exists
    }

    public function initiatePaymentPlan(Request $request)
    {
        $amount = $request->input('amount');
        $phoneNumber = $request->input('phone_number');
        $callbackUrl = url('/mpesa/callback');

        $response = $this->mpesa->initiatePaymentPlan($amount, $phoneNumber, $callbackUrl);

       
        return view('mpesa.payment_response');
    }



    
    public function handlePaymentResponse()
{
    // Define and populate the variable
    $responseData = [
        'transaction_id' => '123456789',
        'amount' => '200',
        'status' => 'Success',
    ];

    // Log the variable to check its content
    \Log::info('Response Data:', $responseData);

    // Pass the variable to the view
    return view('mpesa.payment_response');
}

    public function handleCallback(Request $request)
    {
        // Handle the M-Pesa callback
        $data = $request->all();
        // Process the callback data

        return response()->json(['status' => 'success']);
    }

   


    public function getAccessToken()
    {
        try {
            $response = $this->makeApiRequest();
            
            // Debugging the response object
            dd($response->json()); // Inspect the response JSON
    
            if ($response->successful()) {
                $data = $response->json();
    
                // Check if data is not null and is an array
                if (is_array($data) && isset($data['access_token'])) {
                    return $data['access_token'];
                } else {
                    return 'Access token not found in response or response is null.';
                }
            } else {
                return 'API request failed with status code: ' . $response->status();
            }
        } catch (\Exception $e) {
            return 'An error occurred: ' . $e->getMessage();
        }
    }
        
 
 
}
