<?php

namespace App\Models;

use App\Models\Base\Product as BaseProduct;

class Product extends BaseProduct
{
	protected $fillable = [
		'user_id',
		'product_name',
		'product_price',
		'send_time',
		'category',
		'product_explanation',
		'region_shipping',
		'sales_status',
		'product_file'
	];

}
