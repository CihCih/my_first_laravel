<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property string $img_path
 * @property string $product_name
 * @property string $introduce
 * @property integer $price
 * @property integer $quantity
 */
class Product extends Model
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
    protected $fillable = ['created_at', 'updated_at', 'img_path', 'product_name', 'introduce', 'price', 'quantity'];


    public function imgs(){
        //  hasOne / hasMany 格式 (對照的Mdel::class,'對方的欄位','自己的欄位')
        return $this->hasMany(Product_img::class,'Product_id','id');  // 因為是hasMany，所以使用的時候會輸出陣列
    }
}
