/*
 * @Author: 魔法师 2782226338@qq.com
 * @Date: 2024-03-18 21:26:04
 * @LastEditors: 魔法师 2782226338@qq.com
 * @LastEditTime: 2024-03-18 21:54:12
 * @FilePath: \student-learning\public\shcode\js\task.js
 * @Description:
 *
 * Copyright (c) 2024 by 山海云端/魔法师, All Rights Reserved.
 */
document.addEventListener("DOMContentLoaded", function () {
    const debounce = (func, deplay) => {
        let timer;
        return function (...args) {
            clearTimeout(timer);
            timer = setTimeout(() => {
                func.apply(this, args);
            }, deplay);
        };
    };

    document.querySelector(".form-control").addEventListener(
        "mouseleave",
        debounce((e) => {
            console.log(e.target.value);
            localStorage.setItem('time', e.target.value);
        }, 1000)
    );

    let week = new Date().getDay()

    
    function run(){
        // 获取当前时间
    const now = new Date();
    // 计算到中午的时间（假设中午是12:00）
    const noon = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 12, 0, 0);
    const delay = now > noon ? 24 * 60 * 60 * 1000 - (now - noon) : noon - now;

    // 设置定时器，在中午运行代码
    setTimeout(function() {
        // 这里是你想要在中午运行的代码
        fetch('')
        
    }, delay);

    run()
    }

    });
