<template>
  <div>
    <main class="encyEdit">
      <h1 class="manageTitle">
        知識百科 管理中心
        <span class="manageSubTitle">| 百科內容新增</span>
      </h1>

      <table class="encyEditTab" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>
            <label for="fruitTag">標籤</label>
          </th>
          <td>
            <select
              name="fruitTag"
              id="fruitTag"
              data-selected
              v-model="encyEdit.title"
            >
              <option value selected="selected" disabled="disabled"
                >請選擇</option
              >
              <optgroup label="常年">
                <option value="木瓜">木瓜</option>
                <option value="鳳梨">鳳梨</option>
                <option value="蓮霧">蓮霧</option>
                <option value="香蕉">香蕉</option>
                <option value="芭樂">芭樂</option>
              </optgroup>
              <optgroup label="春季">
                <option value="梅子">梅子</option>
                <option value="李子">李子</option>
                <option value="桃子">桃子</option>
                <option value="枇杷">枇杷</option>
              </optgroup>
              <optgroup label="夏季">
                <option value="西瓜">西瓜</option>
                <option value="芒果">芒果</option>
                <option value="火龍果">火龍果</option>
                <option value="荔枝">荔枝</option>
              </optgroup>
              <optgroup label="秋季">
                <option value="柿子">柿子</option>
                <option value="柚子">柚子</option>
                <option value="水梨">水梨</option>
                <option value="百香果">百香果</option>
              </optgroup>
              <optgroup label="冬季">
                <option value="草莓">草莓</option>
                <option value="柳丁">柳丁</option>
                <option value="番茄">番茄</option>
                <option value="棗子">棗子</option>
              </optgroup>
            </select>
          </td>
        </tr>

        <tr>
          <th>
            <label for="fruitSeason">產季</label>
          </th>
          <td>
            <select
              name="fruitSeason"
              id="fruitSeason"
              data-selected
              v-model="encyEdit.type"
            >
              <option value selected="selected" disabled="disabled"
                >請選擇</option
              >
              <option value="0">常年</option>
              <option value="1">春季</option>
              <option value="2">夏季</option>
              <option value="3">秋季</option>
              <option value="4">冬季</option>
            </select>
          </td>
        </tr>

        <tr>
          <th>
            <label for="encyIntro">介紹</label>
          </th>
          <td>
            <textarea
              name="encyIntro"
              id="encyIntro"
              v-model="encyEdit.content"
            ></textarea>
          </td>
        </tr>
        <tr>
          <th>
            <label for="encyQ">農知識問題</label>
          </th>
          <td>
            <textarea
              name="encyQ"
              id="encyQ"
              v-model="encyEdit.question"
            ></textarea>
          </td>
        </tr>
        <tr>
          <th>
            <label for="encyA">農知識答案</label>
          </th>
          <td>
            <textarea
              name="encyA"
              id="encyA"
              v-model="encyEdit.answer"
            ></textarea>
          </td>
        </tr>

        <tr>
          <th>圖片</th>

          <td>
            <label for="encyPic01">
             請傳3-5張圖：
              <input type="file" id="encyPic01" @change="fileSelect" multiple />
            </label>

            <img
              class="encyImg"
              src=""
              style="max-width: 200px;max-height: 200px;"
            />
            <img
              class="encyImg"
              src=""
              style="max-width: 200px;max-height: 200px;"
            />
            <img
              class="encyImg"
              src=""
              style="max-width: 200px;max-height: 200px;"
            />
            <img
              class="encyImg"
              src=""
              style="max-width: 200px;max-height: 200px;"
            />
            <img
              class="encyImg"
              src=""
              style="max-width: 200px;max-height: 200px;"
            />

            <!--
                  <img id:"encyImg" :src="encyEdit.titleImg" style="max-width: 200px;max-height: 200px;" />
                  -->
            <br />
          </td>
        </tr>
        <tr>
          <th>
            <label for="videoLink">影片</label>
          </th>
          <td>
            <input type="text" id="videoLink" v-model="encyEdit.video" />
          </td>
        </tr>

        <tr>
          <th></th>
          <td>
            <div class="encyEditBtnSec">
              <input
                id="encyEditCancel"
                type="button"
                onclick="javascript:history.back(1)"
                value="取消"
              />
              <input
                id="ecnyEditSubmit"
                type="submit"
                value="送出"
                @click="editEncyI"
              />
            </div>
          </td>
        </tr>
      </table>
    </main>
  </div>
</template>

<script>
import $ from "jquery";
export default {
  data() {
    return {
      formData: new FormData(),
      encyEdit: {
        no: "",
        title: "", // 水果名，當標籤用
        type: "", // 產季
        content: "", // 介紹
        question: "", // 農知識問題
        answer: "", // 農知識答案
        titleImg: "",
        video: "",
      },
    };
  },
  methods: {
    // title 資料
    // type 資料

    // content 資料
    setContent(e) {
      this.content = e.target.value;
    },
    // question 資料
    setQusetion(e) {
      this.question = e.target.value;
    },
    // answer 資料
    setAnswer(e) {
      this.answer = e.target.value;
    },

    // titleImg資料，取得圖片訊息
    fileSelect(e) {
      const titleImg = e.target;
      if (titleImg.files.length > 5) {
        window.alert("最多上傳五張");
        return;
      } else if (titleImg.files.length < 3) {
        window.alert("最少上傳三張");
        return;
      } else {
        for (let i = 0; i < titleImg.files.length; i++) {
          let readFile = new FileReader();
          readFile.onload = function(e) {
            document.getElementsByClassName("encyImg")[i].src = e.target.result;
          };
          readFile.readAsDataURL(titleImg.files[i]);
        }
      }

      // this.formData.append("file", titleImg.files[0]);

    },

    // video資料
    setVideo(e) {
      this.video = e.target.value;
    },

    // 資料撈完後傳到php

    editEncyI: function() {
      for (
        let i = 0;
        i < document.getElementById("encyPic01").files.length;
        i++
      ) {
        this.formData.append(
          "encyPic01[]",
          document.getElementById("encyPic01").files[i]
        );
      }

      if (document.getElementById("encyPic01").files == 0) {
        alert("請上傳圖片");
        return;
      } else {
        this.$http
          .post("/api/api_adminEncyUpload.php", this.formData)
          .then((res) => {
            this.encyEdit.titleImg = res.data.toString();

            const api = "/api/api_adminEncyEdit.php";

            this.$http
              .post(api, JSON.stringify(this.encyEdit))
              // $http.post(url,data)
              // 用post把從encyEdit來的js物件資料轉為json字串，傳給api背後的那支php
              .then((res) => {
                this.data = res.data;
                alert(" 資料新增完成 ٩(･ิᴗ･ิ๑)۶ ");
                this.$router.go(-1);
              });
          });
      }
    },
  },
};
</script>
