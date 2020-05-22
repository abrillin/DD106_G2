<template>
    <div class="Order">
        <div class="Order_head">
            <div class="Order_head_text">
                <h2>訂單管理</h2>
            </div>
        </div>
        <div class="Order_bottom">
            <div class="Orderlist">
                <div class="list_1">
                    <div class="listnum">
                        <p>訂單編號: xxxxx</p>
                    </div>
                    <div class="memberorder">
                        <div class="orderheader">
                            <table class="orderTab">
                                <thead>
                                    <tr>
                                        <th>成立時間</th>
                                        <th>總金額</th>
                                        <th>付款狀態</th>
                                        <th>訂單狀態</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="ordercontent">
                            <table class="orderTab">
                                <thead>
                                    <tbody>
                                        <tr>
                                            <td>2020-04-17</td>
                                            <td>$1380</td>
                                            <td>已付款</td>
                                            <td>完成</td>
                                        </tr>
                                    </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="list_slide">
                        <img id="ploygon" class="plogon" src="@/assets/Polygon 2.svg" alt="">
                        <span id="ploygon">訂單明細</span>
                    </div>
                    <div class="slide display">
                        <div class="OrderDetail">
                            <div class="detailheader">
                                <table class="orderTab">
                                    <thead>
                                        <tr>
                                            <th>商品編號</th>
                                            <th>名稱</th>
                                            <th>價格</th>
                                            <th>數量</th>
                                            <th>小計</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="detailcontent">
                                <table class="orderTab">
                                    <tbody>
                                        <tr>
                                            <td>xxxxx</td>
                                            <td>台南麻豆文旦</td>
                                            <td>$50</td>
                                            <td>10</td>
                                            <td>$500</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="total">
                        <p>商品金額 $130</p>
                        <p>運費 $80</p>
                        <p>總金額 $1380</p>
                    </div>
                    <div class="address">
                        <div class="address_left">
                            <p>收件人:</p>
                            <p>連絡電話:</p>
                            <p>收件地址:</p>
                            <p>運送方式:</p>
                        </div>
                        <div class="address_right">
                            <p>資策會DD106</p>
                            <p>0912-345678</p>
                            <p>桃園市中壢區中大路300-1號</p>
                            <p>宅配到府<span>(運送編號:28800118667)</span></p>
                        </div>
                    </div>
                    <div class="Evaluation">
                        <div class="Evaluation_top">
                            <p>訂單已完成，可以給評價囉!</p>
                        </div>
                        <div class="star">
                            <div class="starimg">
                                <img src="@/assets/memberstar.svg" alt="">
                            </div>
                            <div class="starimg">
                                <img src="@/assets/memberstar.svg" alt="">
                            </div>
                            <div class="starimg">
                                <img src="@/assets/memberstar.svg" alt="">
                            </div>
                            <div class="starimg">
                                <img src="@/assets/memberstar.svg" alt="">
                            </div>
                            <div class="Evaluation_submit">
                                <a href="#">
                                    <p>不想給了</p>
                                </a>
                                <a href="">
                                    <p>送出</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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

<script>
    import $ from "jquery";
    export default {
        mounted() {
            var i = 0;
            $(".list_slide").click(function () {
                if (i == 0) {
                    $("#ploygon").css("transform", "rotateX(180deg)");
                    i = 1;
                } else {
                    $("#ploygon").css("transform", "rotateX(0deg)");
                    i = 0;
                }

                $(".slide").toggleClass("display");
            });
        }
    };
</script>