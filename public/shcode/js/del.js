/*
 * @Author: 魔法师 2782226338@qq.com
 * @Date: 2024-03-17 22:32:42
 * @LastEditors: 魔法师 2782226338@qq.com
 * @LastEditTime: 2024-03-18 17:38:36
 * @FilePath: \student-learning\public\shcode\js\del.js
 * @Description: 
 * 
 * Copyright (c) 2024 by 山海云端/魔法师, All Rights Reserved. 
 */
document.addEventListener("DOMContentLoaded",()=>{

    document.querySelector('table').addEventListener("click",e=>{
        if(e.target.classList.contains('btn'))
        {
            let tr  = e.target.closest('tr')

            let allData = tr.querySelectorAll('td')

            let formdata = new FormData();

            formdata.append('_token',document.querySelector('input[name="_token"]').value)
            formdata.append('student',allData[0].textContent)
            formdata.append('name',allData[1].textContent)
            formdata.append('number',allData[2].textContent)

                updateStudent('/student/del',formdata,(err,data)=>{
                if(err)
                {
                    alert(err.message)
                }
                else
                {
                    tr.remove()
                }
            })
        }


    })

    /**
     * @description: 异步发送请求
     * @param string url 请求URL
     * @param formdata formdata 请求参数
     * @param callback function 回调函数
     * @return {*}
     */    
    async function updateStudent(url,formdata,callback)
    {
        try {
           let res = await fetch(url,{
            method:'post',
            body:formdata
        })
        
        let jsonData = await res.json() 

        callback(null,true)
        } catch (error) {
          
            throw new Error(error.message)
        }
        
    }
    
})