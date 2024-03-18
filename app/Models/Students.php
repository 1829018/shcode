<?php
/*
 * @Author: 魔法师 2782226338@qq.com
 * @Date: 2024-03-17 17:11:59
 * @LastEditors: 魔法师 2782226338@qq.com
 * @LastEditTime: 2024-03-18 17:52:19
 * @FilePath: \student-learning\app\Models\Students.php
 * @Description: 
 * 
 * Copyright (c) 2024 by 山海云端/魔法师, All Rights Reserved. 
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = 'infor';
    protected $fillable = ['student', 'number', 'name'];
}
