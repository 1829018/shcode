<?php
/*
 * @Author: 魔法师 2782226338@qq.com
 * @Date: 2024-03-18 15:36:52
 * @LastEditors: 魔法师 2782226338@qq.com
 * @LastEditTime: 2024-03-18 16:40:27
 * @FilePath: \student-learning\app\Http\Controllers\StudyController.php
 * @Description: 
 * 
 * Copyright (c) 2024 by 山海云端/魔法师, All Rights Reserved. 
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyController extends Controller
{
    private static $urlList = [
        'login' => 'http://qndxx.bestcood.com/mp/WeixinAuth/LoginByUser2.html',
        'infor' => 'http://qndxx.bestcood.com/nanning/daxuexi',
        'sure' => 'http://qndxx.bestcood.com/mp/gx/DaXueXi/LearnHit.html'
    ];


    /**
     * @description: 登录获取到cookie
     * @param string $userName 学生姓名
     * @param string $userId 学生的编号
     * @return bool|array 返回布尔值或者cookie
     */
    protected function getCookieByLogin(string $userName, string $userId)
    {

        $login_data = array(
            'userName' => urldecode($userName),
            'userId' => $userId
        );

        $res = $this->curl_send_post(self::$urlList['login'], $login_data);
        if ($res === false) {
            return '网络出现异常！';
        }
        preg_match_all('/{"code":.*}/', $res, $data);
        $obj_data = json_decode($data[0][0]);
        if ($obj_data->msg == '登录成功') {
            preg_match_all('/(?<=Set-Cookie: ).*?(?=;)/', $res, $cookiesArray);
            $cookies = array_map(function ($cookiesArray) {
                return explode('=', $cookiesArray, 2);
            }, $cookiesArray[0]);
            return $cookies;
        }
    }
    /**
     * @description: 
     * @param array $cookies
     * @return mixed 返回html代码解析
     */
    protected function get_infor($cookies)
    {
        $url = self::$urlList['infor'];
        return $this->curl_send_get($url, $cookies);
    }
    /**
     * @description: 实现青年大学习
     * @param int $id
     * @param array $cookies
     * @return {*}
     */
    protected function to_study(int $id, array $cookies)
    {
        $url = self::$urlList['sure'];
        $data = array(
            'id' => $id
        );
        return $this->curl_send_post($url, $data, $cookies);
    }
    /**
     * @description: 发送post请求
     * @param string $url 请求链接
     * @param array $form_data 请求参数
     * @param array $cookies 是否携带cookie发送请求
     * @return {*}
     */
    private function curl_send_post(string $url, array $form_data, array $cookies = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($form_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_COOKIE, empty($cookies) ? '' : http_build_query($cookies));

        $res = curl_exec($ch);
        curl_close($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code != 200) {
            return false;
        }
        return $res;
    }

    /**
     * @description: 
     * @param string $url 请求链接
     * @param array $cookies 是否携带cookie发送请求
     * @return {*}
     */
    private function curl_send_get(string $url, array $cookies = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_COOKIE, empty($cookies) ? '' : http_build_query($cookies));

        $res = curl_exec($ch);
        curl_close($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code != 200) {
            return false;
        }
        return $res;
    }
}
