<template>
  <div class="BlogUpdate">
    <div class="BlogUpdate_right_head">
      <div class="BlogUpdate_right_head_text">
        <span>日誌管理</span>
        <span class="new">日誌內容新增/修改</span>
      </div>
    </div>
    <div class="BlogUpdate_right_bottom">
      <div class="bottom_form">
        <div class="person_left">
          <ul>
            <li>日誌編號</li>
            <li>標題</li>
            <li>主圖片</li>
            <li>其他圖片</li>
            <li>標籤</li>
            <li>內容1</li>
            <li>內容2</li>
          </ul>
        </div>
        <div class="person_right">
          <form id="sendform">
            <p>{{ blog.no }}</p>
            <input
              type="text"
              id="blogTitle"
              maxlength="20"
              placeholder="最大字數限制20"
              v-model="blog.title"
            />
            <label for="blogMainImg" class="blogMainImg" @change="changeMainPic"
              ><span>上傳主要圖片</span>
              <input type="file" id="blogMainImg" accept="image/*" />
              <div>
                <img src="" id="mainPic" />
              </div>
            </label>
            <label
              for="blogOtherImg"
              class="blogOtherImg"
              @change="changeOtherPic"
              ><span>上傳其他圖片</span>
              <input type="file" id="blogOtherImg" accept="image/*" multiple />

              <div id="otherPic">
                <img class="otherPic" src="" />
                <img class="otherPic" src="" />
                <img class="otherPic" src="" />
                <img class="otherPic" src="" />
              </div>
            </label>
            <select id="blogTags" v-model="tags.selected">
              <option value="0">請選擇</option>
              <option v-for="i in productTags" :value="i.no" :key="i.no">{{
                i.name
              }}</option>
            </select>
            <textarea
              id="blogContent1"
              maxlength="500"
              placeholder="最大字數限制500"
              v-model="blog.content1"
            ></textarea>
            <textarea
              id="blogContent2"
              maxlength="500"
              placeholder="最大字數限制500"
              v-model="blog.content2"
            ></textarea>

            <div class="submit_button">
              <input type="button" value="取消" id="blogCancel" />
              <input
                type="button"
                value="送出"
                id="blogSubmit"
                @click="blogUpdate"
              />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import $ from "jquery";
export default {
  data() {
    return {
      formData: new FormData(),
      productTags: [],
      tags: {
        selected: 0,
        no: 0,
      },
      blog: {
        sellerno: 0,
        content1: "",
        content2: "",
        title: "",
        date: "",
        img: "",
        no: "",
      },
    };
  },
  created() {
    const api = this.path + "api_farmBlogUpdateBlogno.php";

    this.$http.post(api).then((res) => {
      const data = res.data;
      if (data[0].no != null) {
        this.blog.no = parseInt(data[0].no) + 1;
        this.tags.no = parseInt(data[0].no) + 1;
      } else {
        this.blog.no = 1;
      }
      this.productTags = data[1];
    });
    const api2 = this.path + "api_farmStatus.php";
    this.$http.post(api2).then((res) => {
      const data = res.data;
      this.blog.sellerno = data.no;
    });
  },
  methods: {
    changeMainPic: function(e) {
      document.getElementById("mainPic").src = "";
      let reader = new FileReader();
      const img = e.target;

      reader.onload = function(e) {
        document.getElementById("mainPic").src = e.target.result;
      };
      reader.readAsDataURL(img.files[0]);
    },
    changeOtherPic: function(e) {
      for (
        let k = 0;
        k < document.getElementsByClassName("otherPic").length;
        k++
      ) {
        document.getElementsByClassName("otherPic")[k].src = "";
      }
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
    blogUpdate: function() {
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
          .post(this.path + "api_uploadBlogFiles.php", this.formData)
          .then((res) => {
            this.blog.img = res.data.toString();
            for (let i in this.blog) {
              if (this.blog[i] == "") {
                alert("請檢查是否所有欄位都有輸入資料");
                return;
              }
            }
            if (this.tags.selected == 0) {
              alert("請選擇標籤");
              return;
            } else {
              this.$http
                .post(this.path + "api_farmBlogUpdate.php", JSON.stringify(this.blog))
                .then((res) => {
                  const data = res.data;
                  if (data == 0) {
                    alert("上傳失敗！");
                    this.$router.go(0);
                  }
                  this.$http
                    .post(
                      this.path + "api_farmBlogtagsUpdate.php",
                      JSON.stringify(this.tags)
                    )
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
          });
      }
    },
  },
};
</script>
