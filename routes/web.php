<?php
/*
 * @Author: 魔法师 2782226338@qq.com
 * @Date: 2024-03-17 14:42:30
 * @LastEditors: 魔法师 2782226338@qq.com
 * @LastEditTime: 2024-03-18 21:57:17
 * @FilePath: \student-learning\routes\web.php
 * @Description: 
 * 
 * Copyright (c) 2024 by ${git_name_email}, All Rights Reserved. 
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LearningController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// 使用控制器路由：同一个控制器里使用路由
Route::controller(StudentsController::class)->group(function () {
    Route::get('/student/view', 'views');
    Route::get('/student/add', 'add');
    Route::get('/student/modify', 'edit');
    Route::get('/student/del', 'delete');
    Route::get('/','index');
    Route::post('/student/del', 'del');
    Route::post('/student/add', 'new');
    Route::post('/student/update', 'update');
});

Route::controller(LearningController::class)->group(function () {
    Route::get('/learning/bond', 'index');
    Route::post('/learning/run', 'run_bond');
});
