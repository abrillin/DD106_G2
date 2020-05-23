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
                                        <table class="listTab">
                                                <thead>
                                                        <tr>
                                                                <th>訂單編號</th>
                                                                <th>成立日期</th>
                                                                <th>總金額</th>
                                                                <th>姓名</th>
                                                                <th>付款狀態</th>
                                                                <th>訂單狀態</th>
                                                                <th>功能</th>
                                                        </tr>
                                                        <tr v-for="item in member" :key="item.no">
                                                                <td>{{item.no}}</td>
                                                                <td id="target">{{item.date}}</td>
                                                                <td>{{item.total}}</td>
                                                                <td>{{item.name}}</td>
                                                                <td v-if="item.payment == 0">未付款</td>
                                                                <td v-if="item.payment == 1">已付款</td>
                                                                <td v-if="item.payment == 2">未完成</td>
                                                                <td v-if="item.payment == 3">已完成</td>
                                                                <td>{{item.status}}</td>
                                                                <td>
                                                                        <router-link to="/farm/listupdate">查看詳情
                                                                        </router-link>
                                                                </td>

                                                                <!-- <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                                        for="switch">Toggle<div class="after"></div></label></p> -->
                                                        </tr>
                                                </thead>
                                        </table>
                                </div>


                        </div>


                </div>
        </div>
</template>
<script>
        export default {
                data() {
                        return {
                                member: {
                                        no: "",
                                        total: "",
                                        date: "",
                                        name: "",
                                        payment: "",
                                        status: "",
                                },
                        };
                },
                created() {
                        const api = "/api/api_farmlist.php";
                        this.$http.post(api).then((res) => {
                                const data = res.data;
                                if (data != "") {
                                        this.member = data;
                                };


                        });
                },
        };
</script>