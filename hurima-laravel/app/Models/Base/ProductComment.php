<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

/**
 * Class ProductComment
 * 
 * @property string $id
 * @property string $product_id
 * @property string $user_id
 * @property string $product_comment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product $product
 * @property User $user
 *
 * @package App\Models\Base
 */
class ProductComment extends Model
{
	protected $table = 'product_comments';
	public $incrementing = false;

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
