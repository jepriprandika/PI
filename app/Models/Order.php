<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'status',
        'order_date',
        'base_total_price',
        'grand_total',
        'note',
        'customer_first_name',
        'customer_last_name',
        'customer_address1',
        'customer_address2',
        'customer_phone',
        'customer_email',
        'approved_by',
        'approved_at',
        'cancelled_by',
        'cancelled_at',
        'cancellation_note',
    ];

    public const CREATED = 'created';
    public const CONFIRMED = 'confirmed';
    public const DELIVERED = 'delivered';
    public const COMPLETED = 'completed';
    public const CANCELLED = 'cancelled';

    public const ORDERCODE = 'INV';

    /**
     * Define relationship with the OrderItem
     *
     * @return void
     */
    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }

    /**
     * Define relationship with the User
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Generate order code
     *
     * @return string
     */

    public static function generateCode()
    {
        $dateCode = self::ORDERCODE . '/' . date('Ymd') . '/' .\General::integerToRoman(date('m')). '/' .\General::integerToRoman(date('d')). '/';

        $lastOrder = self::select([\DB::raw('MAX(orders.code) AS last_code')])
            ->where('code', 'like', $dateCode . '%')
            ->first();

        $lastOrderCode = !empty($lastOrder) ? $lastOrder['last_code'] : null;
        
        $orderCode = $dateCode . '00001';
        if ($lastOrderCode) {
            $lastOrderNumber = str_replace($dateCode, '', $lastOrderCode);
            $nextOrderNumber = sprintf('%05d', (int)$lastOrderNumber + 1);
            
            $orderCode = $dateCode . $nextOrderNumber;
        }

        if (self::_isOrderCodeExists($orderCode)) {
            return generateOrderCode();
        }

        return $orderCode;
    }

    private static function _isOrderCodeExists($orderCode)
    {
        return Order::where('code', '=', $orderCode)->exists();
    }
}
