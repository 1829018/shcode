/*
 * @Author: 魔法师 2782226338@qq.com
 * @Date: 2024-03-17 17:56:10
 * @LastEditors: 魔法师 2782226338@qq.com
 * @LastEditTime: 2024-03-17 20:13:59
 * @FilePath: \student-learning\public\shcode\js\add.js
 * @Description: 
 * 
 * Copyright (c) 2024 by 山海云端/魔法师, All Rights Reserved. 
 */
document.addEventListener("DOMContentLoaded",()=>{

    document.getElementById("add-student").addEventListener("submit",e=>{
        e.preventDefault();
        let formdata = new FormData(document.getElementById("add-student"));
        fetchPostFormData('/student/add', formdata);
        
    });
    /**
     * @description: 使用异步函数发送fetch请求
     * @param string url 
     * @param Array data
     * @return mixed
     */    
    async function fetchPostFormData(url,data){
        try{

        const response = await fetch(url,{
            method:"POST",
            body:data
        })

        if(!response.ok){
            throw new Error('Failed to')
        }
        const json = await response.json();
        
        // const students = JSON.parse(json)
      document.querySelector('.card').insertAdjacentHTML('beforebegin', `<div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <strong>Notice</strong> ${json.data.student}添加成功！
  </div>`)

        } catch (e){
            throw new Error('请求出现异常：'+e)
        }



    }
})