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
          <form id="sendform" @submit="blogUpdate">
            <p>{{ blog.sellerno }}</p>
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
            <select id="blogTags" v-model="blog.selected">
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
              <input type="submit" value="送出" id="blogSubmit" />
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
      member: {
        mainpic: "",
      },
      productTags: [],
      blog: {
        no: "",
        content1: "",
        content2: "",
        title: "",
        date: "",
        img: "",
        sellerno: "",
        selected: 0,
      },
    };
  },
  created() {
    const api = "/api/api_farmBlogUpdateBlogno.php";

    this.$http.post(api).then((res) => {
      const data = res.data;

      this.blog.sellerno = parseInt(data[0].no) + 1;
      this.productTags = data[1];
      console.log(this.productTags);
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
    blogUpdate: function(e) {
      console.log();
    },
  },
};
</script>
