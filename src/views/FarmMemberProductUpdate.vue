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
          <form>
            <p>{{ item.no }}</p>
            <input
              type="text"
              id="productName"
              maxlength="10"
              placeholder="最大字數限制10"
              v-model="item.name"
            />
            <input type="text" id="productPrice" v-model="item.price" />元

            <label for="productMainPic" @change="changeMainPic">
              <span>上傳主要圖片</span>
              <input type="file" id="productMainPic" accept="image/*" />
              <div>
                <img src="" id="mainPic" />
              </div>
            </label>
            <label for="productOtherPic" @change="changeOtherPic">
              <span>上傳其它圖片</span>
              <input
                type="file"
                id="productOtherPic"
                accept="image/*"
                multiple
              />
              <div>
                <img class="otherPic" src="" />
                <img class="otherPic" src="" />
                <img class="otherPic" src="" />
                <img class="otherPic" src="" />
              </div>
            </label>
            <select id="productTags" v-model="tags.selected">
              <option value="0">請選擇</option>
              <option v-for="i in itemTags" :value="i.no" :key="i.no">{{
                i.name
              }}</option>
            </select>

            <textarea
              id="productContent"
              maxlength="100"
              placeholder="最大字數限制100"
              v-model="item.description"
            ></textarea>
            <div class="submit_button">
              <input type="button" value="取消" id="productCancel" />
              <input
                type="submit"
                value="送出"
                id="productSubmit"
                @click="itemUpdate"
              />
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
      tags: {
        selected: 0,
        no: 0,
      },
      itemTags: [],
      item: {
        no: 1,
        name: "",
        price: "",
        description: "",
        sellerno: "",
        date: "",
      },
    };
  },
  created() {
    const api = "/api/api_farmitem.php";
    this.$http.post(api).then((res) => {
      const data = res.data;
      this.item.no = parseInt(data[0].no) + 1;
      this.itemTags = data[1];
    });
    const api2 = "/api/api_farmStatus.php";
    this.$http.post(api2).then((res) => {
      const data = res.data;
      this.item.sellerno = data.no;
    });
  },
  methods: {
    changeMainPic: function(e) {
      let reader = new FileReader();
      const img = e.target;

      reader.onload = function(e) {
        document.getElementById("mainPic").src = e.target.result;
      };
      reader.readAsDataURL(img.files[0]);
    },
    changeOtherPic: function(e) {
      const img = e.target;
      if (img.files.length > 4) {
        window.alert("最多上傳四張");
        return;
      } else {
        for (let i = 0; i < img.files.length; i++) {
          let reader = new FileReader();

          reader.onload = function(e) {
            document.getElementsByClassName("otherPic")[i].src =
              e.target.result;
          };
          reader.readAsDataURL(img.files[i]);
        }
      }
    },
    itemUpdate: function() {
      let month = new Date().getMonth() + 1;
      if (month < 10) {
        month = "0" + month;
      }
      this.blog.date =
        new Date().getFullYear().toString() +
        month.toString() +
        new Date().getDate().toString();

      this.formData.append(
        "mainImg",
        document.getElementById("blogMainImg").files[0]
      );

      for (
        let i = 0;
        i < document.getElementById("blogOtherImg").files.length;
        i++
      ) {
        this.formData.append(
          "otherImg[]",
          document.getElementById("blogOtherImg").files[i]
        );
      }
      if (
        (document.getElementById("blogMainImg").files.length == 0) |
        (document.getElementById("blogOtherImg").files.length == 0)
      ) {
        alert("請上傳圖片");
        return;
      } else {
        this.$http
          .post("/api/api_uploadBlogFiles.php", this.formData)
          .then((res) => {
            this.blog.img = res.data.toString();
            for (let i in this.blog) {
              if (this.blog[i] == "") {
                alert("請檢查是否所有欄位都有輸入資料");
                return;
              }
            }
            this.$http
              .post("/api/api_farmBlogUpdate.php", JSON.stringify(this.blog))
              .then((res) => {
                const data = res.data;
                if (data == 0) {
                  alert("上傳失敗！");
                  this.$router.go(0);
                } else if (data == 1) {
                  alert("上傳成功！");
                  this.$router.go(-1);
                }
              });
          });
      }
    },
  },
};
</script>
