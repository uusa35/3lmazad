<?php
namespace Usama\Tap;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Deal;
use App\Models\Plan;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 7/15/17
 * Time: 6:04 PM
 */
class TapPaymentController extends Controller implements TapContract
{
    public function getGateWay()
    {
        return ["Name" => config('tap.gatewayDefault')];
    }

    public function getMerchant()
    {
        return [
            "AutoReturn" => config('tap.autoReturn'),
            "ErrorURL" => config('tap.errorUrl'),
            "HashString" => $this->getHashString(),
            "LangCode" => config('tap.langCode'),
            "MerchantID" => config('tap.merchantId'),
            "Password" => config('tap.password'),
            "PostURL" => config('tap.postUrl'),
            "ReferenceID" => session()->get('reference_id'),
            "ReturnURL" => config('tap.returnUrl'),
            "UserName" => config('tap.userName')
        ];
    }

    public function setHashString()
    {
        return $toBeHashedString = 'X_MerchantID' . config('tap.merchantId') .
            'X_UserName' . config('tap.userName') .
            'X_ReferenceID' . '45870225000' .
            'X_Mobile' . '1234567' .
            'X_CurrencyCode' . config('tap.currencyCode') .
            'X_Total' . session()->get('totalPrice') . '';
    }

    public function getHashString()
    {
        return hash_hmac('sha256', $this->setHashString(), config('tap.apiKey'));
    }

    public function makePayment($dealId)
    {
        $finalArray = [
            'CustomerDC' => session()->get('customer'),
            'lstProductDC' => session()->get('cart')->toArray(),
            'lstGateWayDC' => [$this->getGateWay()],
            'MerMastDC' => $this->getMerchant(),
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => config('tap.paymentUrl'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($finalArray, JSON_UNESCAPED_SLASHES),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = (\GuzzleHttp\json_decode($response));
            $invoice = new TapInvoice($response, $dealId);
            /*
             * response how it looks
             * {#966 ▼
                  +"PaymentURL": "http://live.gotapnow.com/webpay.aspx?ref=210092017100407130&sess=kEh3R7REOFWP0b3BFM6Kkm2O7AQck8Jg"
                  +"ReferenceID": "210092017100407130"
                  +"ResponseCode": "0"
                  +"ResponseMessage": "Success"
                  +"TapPayURL": "http://live.gotapnow.com/webpay.aspx"
                }
             * if the response is success mean the payment is successfully done so update the plan_id , duration , enddate of ad's deal
             * redirect to the payment url
             * hit their api to get the order status
             * */
            $invoice->storePayment();
            return redirect()->to($response->PaymentURL);
        }
    }

    public function result(Request $request)
    {
        $deal = Deal::withoutGlobalScopes()->where(['reference_id' => $request->ref])->first()->update(['valid' => true]);
        return redirect()->home()->with('success', trans('message.payment_success'));
    }

    public function error(Request $request)
    {
        $deal = Deal::withoutGlobalScopes()->where(['reference_id' => $request->ref])->first()->delete();
        return redirect()->home()->with('error', trans('message.payment_failure'));
    }
}

