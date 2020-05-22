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
            <li class="p_img">主要圖片</li>
            <li class="p_img">其它圖片</li>
            <li class="p_tag">標籤</li>
            <li class="p_text">敘述</li>
          </ul>
        </div>
        <div class="person_right">
          <form action="">
            <p>1</p>
            <input
              type="text"
              id="productName"
              maxlength="10"
              placeholder="最大字數限制10"
            />
            <input type="text" id="productPrice" />元

            <label for="productMainPic">
              <span>上傳主要圖片</span>
              <input type="file" id="productMainPic" accept="image/*" />
              <div>
                <img src="" />
              </div>
            </label>
            <label for="productOtherPi">
              <span>上傳其它圖片</span>
              <input type="file" id="productOtherPic" accept="image/*" />
              <div>
                <img src="" />
                <img src="" />
                <img src="" />
                <img src="" />
              </div>
            </label>
            <select id="productTags">
              <option neme="productTags" value="1">蘋果</option>
              <option neme="productTags" value="2">鳳梨</option>
              <option neme="productTags" value="3">橘子</option>
              <option neme="productTags" value="4">番茄</option>
            </select>

            <textarea
              id="productContent"
              maxlength="100"
              placeholder="最大字數限制100"
            ></textarea>
            <div class="submit_button">
              <input type="button" value="取消" id="productCancel" />
              <input type="submit" value="送出" id="productSubmit" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { log } from "three";
export default {
  data() {
    return {
      member: {
        no: "",
        name: "",
        price: "",
        description: "",
      },
    };
  },
  created() {
    const api = "/api/api_farmitem.php";
    this.$http.post(api).then((res) => {
      const data = res.data;
      if (data != "") {
        this.member = {
          no: data.no,
          name: data.name,
          price: data.price,
          description: data.description,
        };
      }
    });
  },
};
</script>
