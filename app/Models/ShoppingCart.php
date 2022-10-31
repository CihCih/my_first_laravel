<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $qty
 */
class ShoppingCart extends Model
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
    protected $fillable = ['created_at', 'updated_at', 'product_id', 'user_id', 'qty'];

    // 對商品關聯
    public function product (){
        return $this->hasOne(Product::class,'id','product_id');
    }
    // 對使用者關聯
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
