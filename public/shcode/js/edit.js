/*
 * @Author: 魔法师 2782226338@qq.com
 * @Date: 2024-03-17 20:40:32
 * @LastEditors: 魔法师 2782226338@qq.com
 * @LastEditTime: 2024-03-18 17:33:15
 * @FilePath: \student-learning\public\shcode\js\edit.js
 * @Description: 实现编辑的功能
 * 
 * Copyright (c) 2024 by 山海云端/魔法师, All Rights Reserved. 
 */
document.addEventListener("DOMContentLoaded",()=>{

    document.querySelector('table').addEventListener("click",e=>{
        let tr = e.target.closest('tr');
        let form = new FormData();
        let allData = tr.querySelectorAll('td')
        let th = tr.querySelector('th').textContent
        localStorage.setItem('oldstudents', allData[0])
        if(e.target.classList.contains('btn') && e.target.textContent == '修改')
        {
            tr.innerHTML =`<tr>
            <th scope="row">${th}</th>
            <td><input value="${allData[0].textContent}" class="form-control"></td>
            <td><input value="${allData[1].textContent}" class="form-control"></td>
            <td><input value="${allData[2].textContent}" class="form-control"></td>
            <input type="hidden" name="old_students" value="${allData[0].textContent}">
          <input type="hidden" name="old_numbers" value="${allData[2].textContent}">
            <td><button class="btn btn-w-md btn-round btn-info">完成</button></td>
          </tr>`
          console.log(allData);

        }else if( e.target.textContent == '完成'){
            
            let all_value = tr.querySelectorAll('td>input')
            // console.log(all_value[0].value);
            form.append('old_student',document.querySelector('input[name="old_students"]').value)
            form.append('old_number',document.querySelector('input[name="old_numbers"]').value)
            form.append('student',all_value[0].value)
            form.append('number',all_value[2].value)
            form.append('name',all_value[1].value)
            form.append('_token',document.querySelector('input[name="_token"]').value)
            // console.log();
            let modifyed_tr = e.target.closest('tr')
            let th = modifyed_tr.querySelector('th').textContent
            // console.log(modifyed_tr.querySelectorAll('td>input')[0].value);
            
            
            updateStudent('/student/update',form,(error,data)=>{
             if(data)
             {
                modifyed_tr.innerHTML =`<tr>
            <th scope="row">${th}</th>
            <td>${modifyed_tr.querySelectorAll('td>input')[0].value}</td>
            <td>${modifyed_tr.querySelectorAll('td>input')[1].value}</td>
            <td>${modifyed_tr.querySelectorAll('td>input')[2].value}</td>
            <td><button class="btn btn-w-md btn-round btn-warning">修改</button></td></tr>`
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