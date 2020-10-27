<?php

namespace App\Models;

use App\Models\Base\PaymentPaypay as BasePaymentPaypay;

class PaymentPaypay extends BasePaymentPaypay
{
	protected $fillable = [
		'id',
		'code_id',
		'qr_url',
		'payment_id',
		'status'
	];
}
