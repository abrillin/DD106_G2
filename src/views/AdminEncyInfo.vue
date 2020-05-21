<template>
  <div>
    <main class="encyEdit">
      <h1 class="manageTitle">
        知識百科 管理中心
        <span class="manageSubTitle">| 百科內容新增/修改</span>
      </h1>

      <table class="encyEditTab" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>
            <label for="fruitTag">標籤</label>
          </th>
          <td>
            <select name="fruitTag" id="fruitTag" data-selected :="encyEdit.title">
              <option value selected="selected" disabled="disabled">請選擇</option>
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
            <select name="fruitSeason" id="fruitSeason" data-selected :="encyEdit.type">
              <option value selected="selected" disabled="disabled">請選擇</option>
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
            <textarea name="encyIntro" id="encyIntro" :="encyEdit.content"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            <label for="encyQ">農知識問題</label>
          </th>
          <td>
            <textarea name="encyQ" id="encyQ" :="encyEdit.question"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            <label for="encyA">農知識答案</label>
          </th>
          <td>
            <textarea name="encyA" id="encyA" :="encyEdit.answer"></textarea>
          </td>
        </tr>

        <tr>
          <th>圖片</th>

          <td>
            <label for="encyPic01">
              圖01：
              <input type="file" id="encyPic01" name="upFile[]" :="fileSelect" />
            </label>
            <img src style="max-width: 400px;max-height: 400px;" />
            <br />

            <label for="encyPic02">
              圖02：
              <input type="file" id="encyPic02" name="upFile[]" :="fileSelect" />
            </label>
            <br />
            <label for="encyPic03">
              圖03：
              <input type="file" id="encyPic03" name="upFile[]" :="fileSelect" />
            </label>
            <br />

            <label for="encyPic04">
              圖04：
              <input type="file" id="encyPic04" name="upFile[]" :="fileSelect" />
            </label>
            <br />

            <label for="encyPic05">
              圖05：
              <input type="file" id="encyPic05" name="upFile[]" :="fileSelect" />
            </label>
            <br />
          </td>
        </tr>
        <tr>
          <th>
            <label for="videoLink">影片</label>
          </th>
          <td>
            <input type="text" id="videoLink" :="encyEdit.video" />
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
              <input id="ecnyEditSubmit" type="submit" value="送出" @click="editEncyI" />
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
      encyEdit: {
        no: "",
        title: "", // 水果名，當標籤用
        type: "", // 產季
        content: "", // 介紹
        question: "", // 農知識問題
        answer: "", // 農知識答案
        titleImg: "",
        video: ""
      }
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
      let file = e.target.files.item(0);
      let readFile = new FileReader();
      readFile.readAsDataURL(file);
      readFile.addEventListener("load", this.loadImage);
    },
    loadImage(e) {
      this.titleImg = e.target.result;
    },

    // video資料
     setVideo(e) {
      this.video = e.target.value;
    },

    // 資料撈完後傳到php

    editEncyI: function() {
      const api = "/api/api_adminEncyEdit.php";

      this.$http
        .post(api, JSON.stringify(this.encyEdit))
        // $http.post(url,data)
        // 用post把從encyEdit來的js物件資料轉為json字串，傳給api背後的那支php
        .then(res => {
          this.data = res.data;
          alert(" 資料修改完成 ٩(･ิᴗ･ิ๑)۶ ");
          this.$router.go(-1);
        });
    }
  }
};
</script>

