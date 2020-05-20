<template>
    <div class="FarmList">
        <div class="FarmList_head">
            <div class="FarmList_head_text">
                <h2>訂單查詢</h2>
            </div>
        </div>
        <div class="FarmList_bottom">
            <div class="list_1">
                <div class="bottomheader">
                    <table class="orderTab">
                        <thead>
                            <tr>
                                <th>訂單編號</th>
                                <th>成立日期</th>
                                <th>總金額</th>
                                <th>姓名</th>
                                <th>付款狀態</th>
                                <th>訂單狀態</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="bottomcontent">
                    <table class="orderTab">
                        <tbody>
                            <tr>
                                <td>xxxx</td>
                                <td>2020-04-17 13:14</td>
                                <td>$1380</td>
                                <td>某某某</td>
                                <td>已付款</td>
                                <td>完成</td>
                                <td><router-link to="/farm/listupdate">查看詳情</router-link></td>
                                <!-- <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                                        for="switch">Toggle<div class="after"></div></label></p> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="Blogputon">
                    <p class="title">狀態</p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                </div> -->
            </div>


            <div class="pagination_block">
                <ul class="pagination">
                    <li><a href="#">&lt;</a></li>
                    <li><a href="#" class="-on">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a href="#">10</a></li>
                    <li><a href="#">&gt;</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>