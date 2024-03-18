/*
 * @Author: 魔法师 2782226338@qq.com
 * @Date: 2024-03-17 23:21:59
 * @LastEditors: 魔法师 2782226338@qq.com
 * @LastEditTime: 2024-03-18 19:59:45
 * @FilePath: \student-learning\public\shcode\js\one.js
 * @Description:
 *
 * Copyright (c) 2024 by 山海云端/魔法师, All Rights Reserved.
 */
document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("form").addEventListener("submit", (e) => {
        e.preventDefault();
        let data = new FormData(e.target);
        data.append("Svip", "sh123");
        fetch("/learning/run", {
            method: "POST",
            body: data,
        })
            .then((Response) => Response.json())
            .then((result) => {
                const wait = (ms) =>
                    new Promise((resolve) => setTimeout(resolve, ms));

                async function renderDataWait(alldata) {
                    for (const adata of alldata) {
                        let elementData = [
                            `<a href="javascript:vaid(0)" class="list-group-item list-group-item-success">${adata.msg}</a>`,
                            `<a href="javascript:vaid(0)" class="list-group-item list-group-item-info">${adata.msg}</a>`,
                            `<a href="javascript:vaid(0)" class="list-group-item list-group-item-warning">${adata.msg}</a>`,
                            `<a href="javascript:vaid(0)" class="list-group-item list-group-item-danger">${adata.msg}</a>`,
                        ];
                        let randomIndex = Math.floor(
                            Math.random() * elementData.length
                        );
                        document.querySelector(".list-group").innerHTML +=
                            elementData[randomIndex];
                        await wait(1000);
                    }
                }

                let alldata = result.data;
                renderDataWait(alldata);
            }).catch(error => {

                document.querySelector(".list-group").innerHTML += error
            });
    });
});
