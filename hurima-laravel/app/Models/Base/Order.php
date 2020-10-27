<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\OrderComment;
use App\Models\PaymentPaypay;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Order
 * 
 * @property string $id
 * @property string $buyer_id
 * @property string $buyer_name
 * @property string $buyer_address
 * @property string $buyer_postal_code
 * @property string $buyer_phone_number
 * @property string|null $buyer_comment
 * @property string|null $buyer_evaluate
 * @property string $seller_id
 * @property string $seller_name
 * @property string $seller_address
 * @property string $seller_postal_code
 * @property string $seller_phone_number
 * @property string|null $seller_comment
 * @property string|null $seller_evaluate
 * @property string $product_id
 * @property string $product_name
 * @property string $product_price
 * @property string $trade_status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Product $product
 * @property Collection|OrderComment[] $order_comments
 * @property PaymentPaypay $payment_paypay
 *
 * @package App\Models\Base
 */
class Order extends Model
{
	protected $table = 'orders';
	public $incrementing = false;

	public function user()
	{
		return $this->belongsTo(User::class, 'seller_id');
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function order_comments()
	{
		return $this->hasMany(OrderComment::class);
	}

	public function payment_paypay()
	{
		return $this->hasOne(PaymentPaypay::class, 'payment_id');
	}
}
