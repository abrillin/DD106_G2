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
            <input
              type="text"
              id="productPrice"
              v-model="item.price"
              @change="changePrice"
            />元

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
export default {
  data() {
    return {
      formData: new FormData(),
      tags: {
        selected: 0,
        no: 0,
      },
      itemTags: [],
      item: {
        no: 1,
        name: "",
        price: 1,
        description: "",
        sellerno: "",
        date: "",
        img: "",
      },
    };
  },
  created() {
    const api = "/api/api_farmitem.php";
    this.$http.post(api).then((res) => {
      const data = res.data;
      if (data[0].no != null) {
        this.item.no = parseInt(data[0].no) + 1;
      } else {
        this.item.no = 1;
      }

      this.itemTags = data[1];
    });
    const api2 = "/api/api_farmStatus.php";
    this.$http.post(api2).then((res) => {
      const data = res.data;
      this.item.sellerno = data.no;
    });
  },
  methods: {
    changePrice: function() {
      let r = /^[0-9]*[1-9][0-9]*$/;
      if (isNaN(this.item.price)) {
        alert("輸入必須為數字");
        this.item.price = 1;
      } else {
        if (r.test(this.item.price)) {
        } else {
          alert("輸入必須為正整數");
          this.item.price = 1;
        }
      }
    },
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
      this.item.date =
        new Date().getFullYear().toString() +
        month.toString() +
        new Date().getDate().toString();

      this.formData.append(
        "mainImg",
        document.getElementById("productMainPic").files[0]
      );

      for (
        let i = 0;
        i < document.getElementById("productOtherPic").files.length;
        i++
      ) {
        this.formData.append(
          "otherImg[]",
          document.getElementById("productOtherPic").files[i]
        );
      }
      if (
        (document.getElementById("productMainPic").files.length == 0) |
        (document.getElementById("productOtherPic").files.length == 0)
      ) {
        alert("請上傳圖片");
        return;
      } else {
        this.$http
          .post("/api/api_uploadProductFiles.php", this.formData)
          .then((res) => {
            this.item.img = res.data.toString();
            for (let i in this.item) {
              if (this.item[i] == "") {
                alert("請檢查是否所有欄位都有輸入資料");
                return;
              }
            }
            this.$http
              .post("/api/api_farmProductUpdate.php", JSON.stringify(this.item))
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
