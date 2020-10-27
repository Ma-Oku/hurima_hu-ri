<?php

namespace App\Models;

use App\Models\Base\UserEvaluate as BaseUserEvaluate;

class UserEvaluate extends BaseUserEvaluate
{
	protected $fillable = [
		'valuer_id',
		'evaluatee_id',
		'comment',
		'evaluate'
	];

	public function eva_user()
    {
        return $this->belongsTo(User::class, 'evaluatee_id');

    }

}
