<?php

namespace App\Http\Controllers;
use App\Services\MpesaService;
use App\Mpesa\STKPush; 
use App\Models\MpesaSTK; 
use Iankumu\Mpesa\Facades\Mpesa; 
use Illuminate\Http\Request;


class MpesaSTKPUSHController extends Controller
{


    public function transaction()
    {
        return view('transaction');
    }
    public $result_code = 1; 
    public $result_desc = 'An error occured'; 
 
    // Initiate  Stk Push Request 
    public function STKPush(Request $request) 
    { 
 
        $amount = $request->input('amount'); 
        $phoneno = $request->input('phonenumber'); 
        $account_number = $request->input('account_number'); 
 
        $response = Mpesa::stkpush($phoneno, $amount, $account_number); 
         
        /** @var \Illuminate\Http\Client\Response $response */ 
        $result = $response->json();  
 
        MpesaSTK::create([ 
            'merchant_request_id' =>  $result['MerchantRequestID'], 
            'checkout_request_id' =>  $result['CheckoutRequestID'] 
        ]); 
 
        return $result;
    }
     // This function is used to review the response from Safaricom once a transaction 
//is complete 
public function STKConfirm(Request $request) 
{ 
    $stk_push_confirm = (new STKPush())->confirm($request); 

    if ($stk_push_confirm) { 

        $this->result_code = 0; 
        $this->result_desc = 'Success'; 
    } 
    return response()->json([ 
        'ResultCode' => $this->result_code, 
        'ResultDesc' => $this->result_desc 
    ]); 
} 

public function showTransaction($transactionId)
{

    $transaction = [
        'id' => $transactionId,
        'amount' => '1000',
        'status' => 'Completed',
        'date' => now()->toDateString(),
        'receiver' => '1234567890',
        'sender' => '0987654321',
    ];
    $transactionData = $this->mpesaService->getTransactionData($transactionId);
    return view('mpesa.transaction', ['transaction' => $transactionData]);
}



public function queryStkPush($checkoutRequestId)
    {
        // Query the STK push status
        $response = Mpesa::stkquery($checkoutRequestId);

        /** @var \Illuminate\Http\Client\Response $response */
        $responseData = $response->json();

        // Handle the response data as needed
        return view('mpesa.stkquery', ['response' => $responseData]);
    }

} 

