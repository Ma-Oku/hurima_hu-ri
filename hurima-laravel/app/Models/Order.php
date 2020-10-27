<?php

namespace App\Models;

use App\Models\Base\Order as BaseOrder;

class Order extends BaseOrder
{
	protected $fillable = [
		'buyer_id',
		'buyer_name',
		'buyer_address',
		'buyer_postal_code',
		'buyer_phone_number',
		'buyer_comment',
		'buyer_evaluate',
		'seller_id',
		'seller_name',
		'seller_address',
		'seller_postal_code',
		'seller_phone_number',
		'seller_comment',
		'seller_evaluate',
		'product_id',
		'product_name',
		'product_price',
		'trade_status'
	];

	public function user_buy()
	{
		return $this->belongsTo(User::class, 'buyer_id');
	}
}
