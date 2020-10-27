<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Order;
use App\Models\OrderComment;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\UserEvaluate;
use Carbon\Carbon;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class User
 * 
 * @property string $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $real_name
 * @property string|null $address
 * @property string|null $postal_code
 * @property string|null $phone_number
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|OrderComment[] $order_comments
 * @property Collection|Order[] $orders
 * @property Collection|ProductComment[] $product_comments
 * @property Collection|Product[] $products
 * @property Collection|UserEvaluate[] $user_evaluates
 *
 * @package App\Models\Base
 */
class User extends Model
{
	protected $table = 'users';
	public $incrementing = false;

	protected $dates = [
		'email_verified_at'
	];

	public function order_comments()
	{
		return $this->hasMany(OrderComment::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class, 'seller_id');
	}

	public function product_comments()
	{
		return $this->hasMany(ProductComment::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}

	public function user_evaluates()
	{
		return $this->hasMany(UserEvaluate::class, 'valuer_id');
	}
}
