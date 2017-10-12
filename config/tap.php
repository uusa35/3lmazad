<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 7/15/17
 * Time: 5:56 PM
 */
return [
    "apiKey" => env('TAP_API_KEY'), //Your API Key Provided by Tap
    "merchantId" => env('TAP_MERCHANT_ID'), //Your ID provided by Tap
    "userName" => env('TAP_USERNAME'), //Your Username under TAP.
    "password" => env('TAP_PASSWORD'),
    'currencyCode' => env('TAP_CURRENCY_CODE'), //This is the currency of the invoice you are creating. (Details can be found in "Create a Payment" endpoint)
    "autoReturn" => env('TAP_AUTO_RETURN'),
    "errorUrl" => env('TAP_ERROR_URL'),
    "langCode" => env('TAP_LANG_CODE'),
    "postUrl" => env('TAP_POST_URL'),
    "returnUrl" => env('TAP_RETURN_URL'),
    'gatewayDefault' => "ALL",
    'paymentUrl' => env('TAP_PAYMENT_URL')
];

