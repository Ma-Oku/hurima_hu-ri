<?php

namespace App\Models;

use App\Models\Base\ProductComment as BaseProductComment;

class ProductComment extends BaseProductComment
{
	protected $fillable = [
		'product_id',
		'user_id',
		'product_comment'
	];

}
