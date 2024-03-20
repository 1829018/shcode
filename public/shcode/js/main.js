/*
 * @Author: 魔法师 2782226338@qq.com
 * @Date: 2024-03-20 15:24:50
 * @LastEditors: 魔法师 2782226338@qq.com
 * @LastEditTime: 2024-03-20 16:39:13
 * @FilePath: \student-learning\public\shcode\js\main.js
 * @Description:
 *
 * Copyright (c) 2024 by 山海云端/魔法师, All Rights Reserved.
 */
document.addEventListener("DOMContentLoaded", () => {
    let now_url = location.pathname;
    let aElement = document
        .querySelectorAll("nav.sidebar-main ul a")
        .forEach((a) => {
            let path = a.getAttribute("href");
            if (now_url == path) {
                a.closest("li")
                    .closest("ul")
                    .closest("li")
                    .classList.add("open");
                a.closest("li").classList.add("active");
            }
        });

    
});
