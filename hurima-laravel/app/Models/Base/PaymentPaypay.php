<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Order;
use Carbon\Carbon;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

/**
 * Class PaymentPaypay
 * 
 * @property string $id
 * @property string $code_id
 * @property string $qr_url
 * @property string $payment_id
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Order $order
 *
 * @package App\Models\Base
 */
class PaymentPaypay extends Model
{
	protected $table = 'payment_paypays';
	public $incrementing = false;

	public function order()
	{
		return $this->belongsTo(Order::class, 'payment_id');
	}
}
