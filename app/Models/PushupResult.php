<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// pushupモデル
class PushupResult extends Model
{    
    use HasFactory;
    
    // テーブル名
    protected $table = 'pushup_results';
    
    // 可変項目
    protected  $fillable = [
        'user_id', 
        'pushup_result'
    ];
    
}
