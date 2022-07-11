<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitupResult extends Model
{
    use HasFactory;

    // テーブル名
    protected $table = 'situp_results';

    // 可変項目
    protected $fillable = [
        'user_id',
        'situp_result'
    ];
}
