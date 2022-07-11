<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// squatモデル
class SquatResult extends Model
{
    use HasFactory;

    // テーブル名
    protected $table = 'squat_results';

    // 可変項目
    protected $fillable = ['user_id', 'squat_result'];
}
