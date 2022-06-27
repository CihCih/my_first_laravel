<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $img_path
 * @property integer $product_id
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class Product_img extends Model
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
    protected $fillable = ['img_path', 'product_id', 'created_at', 'updated_at'];



    public function product(){
        //  hasOne / hasMany 格式 (對照的Mdel::class,'對方的欄位','自己的欄位')
        // $this->hasOne(Product::class,'id','Product_id');

        //  belongsTo / belongsToMany 格式 (對照的Mdel::class,'自己的欄位','對方的欄位')
        $this->belongsTo(Product::class,'Product_id','id');

    }
}
