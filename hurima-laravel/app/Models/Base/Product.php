<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Order;
use App\Models\ProductComment;
use App\Models\User;
use Carbon\Carbon;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Product
 * 
 * @property string $id
 * @property string $user_id
 * @property string $product_name
 * @property string $product_price
 * @property string $send_time
 * @property string $category
 * @property string $product_explanation
 * @property string $region_shipping
 * @property string $sales_status
 * @property string $product_file
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Order $order
 * @property Collection|ProductComment[] $product_comments
 *
 * @package App\Models\Base
 */
class Product extends Model
{
	protected $table = 'products';
	public $incrementing = false;

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function order()
	{
		return $this->hasOne(Order::class);
	}

	public function product_comments()
	{
		return $this->hasMany(ProductComment::class);
	}
}
