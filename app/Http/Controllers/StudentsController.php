<?php
/*
 * @Author: 魔法师 2782226338@qq.com
 * @Date: 2024-03-17 15:19:57
 * @LastEditors: 魔法师 2782226338@qq.com
 * @LastEditTime: 2024-03-18 20:30:49
 * @FilePath: \student-learning\app\Http\Controllers\StudentsController.php
 * @Description: 
 * 
 * Copyright (c) 2024 by ${git_name_email}, All Rights Reserved. 
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\ststus;

class StudentsController extends StudyController
{
    public function index()
    {
        return view('index', ['counts' => Students::count(), 'study_num' => ststus::where('status', 1)->count()]);
    }


    /**
     * @description: 返回查看学生的视图
     * @return mixed 
     */
    public function views()
    {
        // dump($this->get_students());
        return view('Students.views', ['data' => $this->get_students()]);
    }
    /**
     * @description: 返回添加学生的视图
     * @return {*}
     */
    public function add()
    {
        return view('Students.add');
    }
    /**
     * @description: 返回修改学生的视图
     * @return {*}
     */
    public function edit()
    {
        return view('Students.modify', ['data' => $this->get_students()]);
    }
    /**
     * @description: 返回删除学生的视图
     * @return {*}
     */
    public function delete()
    {
        return view('Students.del', ['data' => $this->get_students()]);
    }

    //  ----------------------------------------------------------------
    /**
     * @description: 添加学生的接口
     * @param {Request} $request
     * @return {*}
     */
    public function new(Request $request)
    {

        $ce = Students::create([
            'student' => $request->input('example-hf-student'),
            'number' => $request->input('example-hf-number'),
            'name' => $request->input('example-hf-name'),
        ]);
        if ($ce) {
            return response(['code' => 200, 'msg' => '添加成功！', 'data' => ['student' => $request->input('example-hf-student')]]);
        } else {
            return response(['code' => 204, 'msg' => '添加失败']);
        }
    }
    /**
     * @description: 实现对学生数据的修改
     * @param Request $request
     * @return *
     */
    public function update(Request $request)
    {
        $up = Students::where('student', $request->input('old_student'))
            ->where('number', $request->input('old_number'))->update([
                'name' => $request->input('name'),
                'number' => $request->input('number'),
                'student' => $request->input('student'),
            ]);

        if ($up) {
            return response(['code' => 200, 'msg' => '修改成功！']);
        } else {
            return response(['code' => 204, 'msg' => '修改失败', 'error' => $up]);
        }
    }
    public function del(Request $request)
    {
        $del = Students::where('student', $request->input('student'))
            ->where('number', $request->input('number'))
            ->where('name', $request->input('name'))
            ->delete();
        if ($del) {
            return response(['code' => 200, 'msg' => '删除成功！']);
        } else {
            return response(['code' => 204, 'msg' => '删除失败', 'error' => $del]);
        }
    }
    /**
     * @description: 返回所有的学生数据
     * @return Array
     */
    protected function get_students()
    {
        return Students::all()->toArray();
    }
}
