<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $subtotal
 * @property integer $shipping_fee
 * @property integer $total
 * @property integer $product_qty
 * @property integer $pay_way
 * @property integer $shipping_way
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $add
 * @property integer $status
 * @property string $ps
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class Order extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'subtotal', 'shipping_fee', 'total', 'product_qty', 'pay_way', 'shipping_way', 'name', 'phone', 'email', 'add', 'status', 'ps', 'created_at', 'updated_at'];

    public function detail(){

        //  hasOne / hasMany 格式 (對照的Mdel::class,'對方的欄位','自己的欄位')
        return $this->hasMany(OrderDetail::class,'order_id','id');  // 因為是hasMany，所以使用的時候會輸出陣列
    }
    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }
}
