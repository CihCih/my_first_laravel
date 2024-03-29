<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_id
 * @property integer $qty
 * @property integer $price
 * @property integer $order_id
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class OrderDetail extends Model
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
    protected $fillable = ['product_id', 'qty', 'price', 'order_id', 'created_at', 'updated_at'];

    public function order(){

        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function product(){

        return $this->hasOne(Product::class,'id','product_id');
    }
}
