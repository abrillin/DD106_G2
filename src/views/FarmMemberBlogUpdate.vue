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
          <form action="">
            <p>{{ member.no }}</p>
            <input
              type="text"
              id="blogTitle"
              maxlength="20"
              placeholder="最大字數限制20"
            />
            <label for="blogMainImg" class="blogMainImg" @change="changeMainPic"
              ><span>上傳主圖片</span>
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
              <input type="file" id="blogMainImg" accept="image/*" />
              <div>
                <img src="" />
                <img src="" />
                <img src="" />
                <img src="" />
              </div>
            </label>
            <select id="blogTags">
              <option value="1">蘋果</option>
              <option value="2">橘子</option>
              <option value="3">水梨</option>
              <option value="4">番茄</option>
            </select>
            <textarea id="blogContent1" placeholder="最大字數限制"></textarea>
            <textarea id="blogContent2"></textarea>

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
        no: 0,
        mainpic: "",
      },
    };
  },
  created() {
    const api = "/api/api_farmBlogUpdateBlogno.php";

    this.$http.post(api).then((res) => {
      const data = res.data;
      this.member.no = parseInt(data.no) + 1;
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
    changeOtherPic: function() {},
  },
};
</script>
