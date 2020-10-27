<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

/**
 * Class OrderComment
 * 
 * @property string $id
 * @property string $order_id
 * @property string $user_id
 * @property string $order_comment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Order $order
 * @property User $user
 *
 * @package App\Models\Base
 */
class OrderComment extends Model
{
	protected $table = 'order_comments';
	public $incrementing = false;

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
