<?php

namespace App\Models;

use App\Models\Base\OrderComment as BaseOrderComment;

class OrderComment extends BaseOrderComment
{
	protected $fillable = [
		'order_id',
		'user_id',
		'order_comment'
	];
}
