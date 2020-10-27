<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

/**
 * Class UserEvaluate
 * 
 * @property string $id
 * @property string $valuer_id
 * @property string $evaluatee_id
 * @property string $comment
 * @property string $evaluate
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models\Base
 */
class UserEvaluate extends Model
{
	protected $table = 'user_evaluates';
	public $incrementing = false;

	public function user()
	{
		return $this->belongsTo(User::class, 'valuer_id');
	}
}
