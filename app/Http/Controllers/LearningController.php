<?php
/*
 * @Author: 魔法师 2782226338@qq.com
 * @Date: 2024-03-17 23:10:07
 * @LastEditors: 魔法师 2782226338@qq.com
 * @LastEditTime: 2024-03-18 22:04:05
 * @FilePath: \student-learning\app\Http\Controllers\LearningController.php
 * @Description: 
 * 
 * Copyright (c) 2024 by 山海云端/魔法师, All Rights Reserved. 
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\ststus;
use App\Http\Controllers\StudyController;

class LearningController extends StudyController
{
    //
    public function index()
    {
        return view('Learning.bond');
    }

    public function run_bond()
    {
        $allData =  Students::all()->toArray();

        $returnData = array(
            'code' => 200,
            'version' => 1.1,
            'data' => [],
            'email' => '2782226338@qq.com',
            'warn' => '本接口不保留任何个人隐私，只是连接官方接口的一个桥梁；如泄露隐私，则与本人无关！！'
        );
        foreach ($allData as $data) {
            $userName = $data['name'];
            $number = $data['number'];
            $cookies = $this->getCookieByLogin($userName, $number);

            $html = $this->get_infor($cookies);
            libxml_use_internal_errors(true);
            $dom = new \DOMDocument();

            $dom->loadHTML($html);

            $srcipt_data = $dom->getElementsByTagName('script');
            $learning_data = [];
            foreach ($srcipt_data as $srcipt) {
                $text_data = $srcipt->textContent;

                if (strpos($text_data, 'learnData') !== false) {
                    $pattern = '/var learnData = (.*?);/';
                    preg_match($pattern, $text_data, $matches);
                    $learning_data = json_decode($matches[1], true);
                    break;
                }
            }
            $id = $learning_data['learnContent']['id'];
            $title = $learning_data['learnContent']['title'];
            $titleSub = $learning_data['learnContent']['titleSub'];
            $isLearned = $learning_data['isLearned'];

            if (!$isLearned) {
                $this->to_study($id, $cookies);
            }
            
            ststus::create([
                'name' => $userName,
                'number' => $number,
                'status'=>1
            ]);
            $returnData['data'][] = ['msg' => "$userName 《$title - $titleSub 》完成学习!!"];
        }

        return response()->json($returnData);
    }
    public function tasks()
    {
        return view('Learning.tasks');
    }
}
