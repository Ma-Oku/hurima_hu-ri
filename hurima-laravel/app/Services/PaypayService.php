<?php
namespace App\Services;

use App\Models\Order;
use App\Models\PaymentPaypay;

use PayPay\OpenPaymentAPI\Client;
use PayPay\OpenPaymentAPI\Models\CreateQrCodePayload;
use PayPay\OpenPaymentAPI\Models\OrderItem;

class PaypayService {

    public $client;

    public function __construct() {
        $this->client = new Client([
            'API_KEY' => config('app.paypay_api'),
            'API_SECRET'=>config('app.paypay_secret'),
            // It is required for Merchants having multiple Merchant ID's
            'MERCHANT_ID'=>config('app.paypay_merchant')
        ],false);
    }

    public function create($order_id)
    {

        $CQCPayload = new CreateQrCodePayload();

        $MerchantPaymentId = $order_id;
        $CQCPayload->setMerchantPaymentId($MerchantPaymentId);

        $CQCPayload->setRequestedAt();

        $CQCPayload->setCodeType("ORDER_QR");

        $CQCPayload->setorderDescription('フーリへの支払い');

        $order = Order::find($order_id);
        $OrderItems = [];
        $OrderItems[] = (new OrderItem())
            ->setName($order->product_name)
            ->setQuantity(1)
            ->setUnitPrice(['amount' => $order->product_price, 'currency' => 'JPY']);
        $CQCPayload->setOrderItems($OrderItems);

        $amount = [
            "amount" => $order->product_price,
            "currency" => "JPY"
        ];

        $CQCPayload->setAmount($amount);

        $CQCPayload->setRedirectType('WEB_LINK');
        $CQCPayload->setRedirectUrl("http://localhost:8080/order/$order_id");

        $response = $this->client->code->createQRCode($CQCPayload);

        logger($response);

        $data = $response['data'];

        $paymentpaypay = new PaymentPaypay;
        $paymentpaypay->code_id = $data['codeId'];
        $paymentpaypay->qr_url = $data['url'];
        $paymentpaypay->payment_id = $data['merchantPaymentId'];
        $paymentpaypay->save();

        return $paymentpaypay;
    }

    public function getdetails($order_id)
    {
        $response = $this->client->code->getPaymentDetails($order_id);
        return $response['data'];
    }

    public function delete($codeid)
    {
        $response =  $this->client->code->deleteQRCode($codeid);
        return $response['resultInfo']['code'];
    }

    public function recreate($id)
    {
        $detail = $this->getdetails($id);
        if ($detail['status'] != 'COMPLETED'){
            $codeid  = Paymentpaypay::where('payment_id', $id)->first();
            $this->delete($codeid->code_id);
            $codeid->delete();

            return $this->create($id);
        } else {
            return $detail;
        }
    }
}
