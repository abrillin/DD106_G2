<template>
    <div class="product">
        <div class="product_right_head">
            <div class="product_right_head_text">
                <span>商品管理</span>
                <span class="new">商品內容新增/修改</span>
            </div>
        </div>
        <div class="product_right_bottom">
            <div class="bottom_form">
                <div class="person_left">
                    <ul>
                        <li class="p_num">商品編號</li>
                        <li class="p_name">名稱</li>
                        <li class="p_price">價格</li>
                        <li class="p_text">敘述</li>
                        <li class="p_img">圖片</li>
                        <li class="p_tag">標籤</li>
                    </ul>
                </div>
                <div class="person_right">
                    <p>{{member.no}}</p>
                    <input type="text" v-model="member.name">
                    <br>
                    <input type="text" v-model="member.price">
                    <br>
                    <textarea name="" id="" cols="20" rows="6" v-model="member.description"></textarea>
                    <br>
                    <button>選擇檔案</button>
                    <span>未選擇任何檔案</span>
                    <br>
                    <div class="tag">
                        <div class="tap1">xxx</div>
                        <div class="tap2">xxxxx</div>
                        <div class="tap3">xxxxxx</div>
                        <div class="tap4">xxxxxxx</div>
                        <div class="tap5">xxxxxxx</div>
                    </div>
                    <div class="submit_button">
                        <div class="cancel">
                            <p>取消</p>
                        </div>
                        <div class="correct">
                            <p>送出</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    import {log} from "three";
    export default{
        data(){
            return{
                member:{
                    no: "",
                    name: "",
                    price: "",
                    description: "",
                },
            };
        },
        created(){
            const api = "/api/api_farmitem.php";
            this.$http.post(api).then((res) => {
                const data = res.data;
                if(data != ""){
                    this.member = {
                        no: data.no,
                        name: data.name,
                        price: data.price,
                        description: data.description,
                    };
                }
            });
        },
    }
</script>