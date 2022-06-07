<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    //使用的資料表庫表單名稱
    protected $table = 'comments';
    //資料表的主key通常會有索引的角色(不可重複，會自動累加的特性)
    protected $primaryKey = 'id';

    //model可以使用"黑名單"或"白名單"(二選一)去設定可填寫的欄位
    protected $fillable = ['name','title','context','email']; //整張表格只有name可以填寫(白名單)

    // protected $guard = ['created_at','updated_at','id']; //除了左邊三個以外，其他都可以被填寫(黑名單)
}
