<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Base{
/**
 * Class FailedJob
 *
 * @property int $id
 * @property string $connection
 * @property string $queue
 * @property string $payload
 * @property string $exception
 * @property Carbon $failed_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereConnection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereFailedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereQueue($value)
 */
	class FailedJob extends \Eloquent {}
}

namespace App\Models\Base{
/**
 * Class Order
 *
 * @property string $id
 * @property string $buyer_id
 * @property string $buyer_name
 * @property string $buyer_address
 * @property string $buyer_postal_code
 * @property string $buyer_phone_number
 * @property string|null $buyer_comment
 * @property string|null $buyer_evaluate
 * @property string $seller_id
 * @property string $seller_name
 * @property string $seller_address
 * @property string $seller_postal_code
 * @property string $seller_phone_number
 * @property string|null $seller_comment
 * @property string|null $seller_evaluate
 * @property string $product_id
 * @property string $product_name
 * @property string $product_price
 * @property string $trade_status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property User $user
 * @property Product $product
 * @property Collection|OrderComment[] $order_comments
 * @property PaymentPaypay $payment_paypay
 * @package App\Models\Base
 * @property-read int|null $order_comments_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerEvaluate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerPostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerEvaluate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerPostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTradeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models\Base{
/**
 * Class OrderComment
 *
 * @property string $id
 * @property string $order_id
 * @property string $user_id
 * @property string $order_comment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Order $order
 * @property User $user
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereOrderComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereUserId($value)
 */
	class OrderComment extends \Eloquent {}
}

namespace App\Models\Base{
/**
 * Class PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property Carbon|null $created_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereToken($value)
 */
	class PasswordReset extends \Eloquent {}
}

namespace App\Models\Base{
/**
 * Class PaymentPaypay
 *
 * @property string $id
 * @property string $code_id
 * @property string $qr_url
 * @property string $payment_id
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Order $order
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereQrUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereUpdatedAt($value)
 */
	class PaymentPaypay extends \Eloquent {}
}

namespace App\Models\Base{
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
 * @property User $user
 * @property Order $order
 * @property Collection|ProductComment[] $product_comments
 * @package App\Models\Base
 * @property-read int|null $product_comments_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductExplanation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRegionShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSalesStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserId($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models\Base{
/**
 * Class ProductComment
 *
 * @property string $id
 * @property string $product_id
 * @property string $user_id
 * @property string $product_comment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Product $product
 * @property User $user
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereProductComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereUserId($value)
 */
	class ProductComment extends \Eloquent {}
}

namespace App\Models\Base{
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
 * @property Collection|OrderComment[] $order_comments
 * @property Collection|Order[] $orders
 * @property Collection|ProductComment[] $product_comments
 * @property Collection|Product[] $products
 * @property Collection|UserEvaluate[] $user_evaluates
 * @package App\Models\Base
 * @property-read int|null $order_comments_count
 * @property-read int|null $orders_count
 * @property-read int|null $product_comments_count
 * @property-read int|null $products_count
 * @property-read int|null $user_evaluates_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRealName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models\Base{
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
 * @property User $user
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereEvaluate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereEvaluateeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereValuerId($value)
 */
	class UserEvaluate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FailedJob
 *
 * @property int $id
 * @property string $connection
 * @property string $queue
 * @property string $payload
 * @property string $exception
 * @property \Illuminate\Support\Carbon $failed_at
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereConnection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereFailedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereQueue($value)
 */
	class FailedJob extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property string $id
 * @property string $buyer_id
 * @property string $buyer_name
 * @property string $buyer_address
 * @property string $buyer_postal_code
 * @property string $buyer_phone_number
 * @property string|null $buyer_comment
 * @property string|null $buyer_evaluate
 * @property string $seller_id
 * @property string $seller_name
 * @property string $seller_address
 * @property string $seller_postal_code
 * @property string $seller_phone_number
 * @property string|null $seller_comment
 * @property string|null $seller_evaluate
 * @property string $product_id
 * @property string $product_name
 * @property int $product_price
 * @property float $trade_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderComment[] $order_comments
 * @property-read int|null $order_comments_count
 * @property-read \App\Models\PaymentPaypay|null $payment_paypay
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @property-read \App\Models\User $user_buy
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerEvaluate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBuyerPostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerEvaluate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSellerPostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTradeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderComment
 *
 * @property string $id
 * @property string $order_id
 * @property string $user_id
 * @property string $order_comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereOrderComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderComment whereUserId($value)
 */
	class OrderComment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereToken($value)
 */
	class PasswordReset extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentPaypay
 *
 * @property string $id
 * @property string $code_id
 * @property string $qr_url
 * @property string $payment_id
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereQrUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPaypay whereUpdatedAt($value)
 */
	class PaymentPaypay extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property string $id
 * @property string $user_id
 * @property string $product_name
 * @property int $product_price
 * @property string $send_time
 * @property string $category
 * @property string $product_explanation
 * @property string $region_shipping
 * @property float $sales_status
 * @property string $product_file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order|null $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductComment[] $product_comments
 * @property-read int|null $product_comments_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductExplanation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRegionShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSalesStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserId($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductComment
 *
 * @property string $id
 * @property string $product_id
 * @property string $user_id
 * @property string $product_comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereProductComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductComment whereUserId($value)
 */
	class ProductComment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $real_name
 * @property string|null $address
 * @property string|null $postal_code
 * @property string|null $phone_number
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderComment[] $order_comments
 * @property-read int|null $order_comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders_buy
 * @property-read int|null $orders_buy_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductComment[] $product_comments
 * @property-read int|null $product_comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserEvaluate[] $user_evaluates
 * @property-read int|null $user_evaluates_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserEvaluate[] $user_valuers
 * @property-read int|null $user_valuers_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRealName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Tymon\JWTAuth\Contracts\JWTSubject, \Illuminate\Contracts\Auth\Authenticatable, \Illuminate\Contracts\Auth\Access\Authorizable, \Illuminate\Contracts\Auth\CanResetPassword, \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * App\Models\UserEvaluate
 *
 * @property string $id
 * @property string $valuer_id
 * @property string $evaluatee_id
 * @property string|null $comment
 * @property string $evaluate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $eva_user
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereEvaluate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereEvaluateeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEvaluate whereValuerId($value)
 */
	class UserEvaluate extends \Eloquent {}
}

