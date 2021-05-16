<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    // 指定資料庫連線名稱
    protected $connection = 'mysql';
    // 資料庫名稱
    protected $table = 'coupon';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 是否自動待時間撮
    public $timestamps = true;

    protected $guarded = [];
}
