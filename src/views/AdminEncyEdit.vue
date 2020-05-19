<template>
  <div>
    <main class="encyEdit">
      <h1 class="manageTitle">
        知識百科 管理中心
        <span class="manageSubTitle">| 百科內容新增/修改</span>
      </h1>

      <table class="encyEditTab" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>標籤</th>
          <td>
            <select name="名字" id="fruit" v-model="encyEdit.title">
              <option value="AllSeason" selected>梅子</option>
              <option value="Spring">李子</option>
              <option value="Summer">桃子</option>
              <option value="Fall">琵琶</option>
              <option value="Winter">西瓜</option>
              <option value="AllSeason">梅子</option>
              <option value="Spring">李子</option>
              <option value="Summer">桃子</option>
              <option value="Fall">琵琶</option>
              <option value="Winter">西瓜</option>
              <option value="AllSeason">梅子</option>
              <option value="Spring">李子</option>
              <option value="Summer">桃子</option>
              <option value="Fall">琵琶</option>
              <option value="Winter">西瓜</option>
              <option value="AllSeason">梅子</option>
              <option value="Spring">李子</option>
              <option value="Summer">桃子</option>
              <option value="Fall">琵琶</option>
              <option value="Winter">西瓜</option>
            </select>
          </td>
        </tr>

        <tr>
          <th>
            <label for="fruitSeason">產季</label>
          </th>
          <td>
            <select id="fruitSeason" v-model="encyEdit.type">
              <option value="AllSeason" selected>常年</option>
              <option value="Spring">春季</option>
              <option value="Summer">夏季</option>
              <option value="Fall">秋季</option>
              <option value="Winter">冬季</option>
            </select>
          </td>
        </tr>

        <tr>
          <th>
            <label for="encyIntro">介紹</label>
          </th>
          <td>
            <textarea name="encyIntro" id="encyIntro" v-model="intro"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            <label for="encyQ">農知識問題</label>
          </th>
          <td>
            <textarea name="encyQ" id="encyQ" v-model="question"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            <label for="encyA">農知識答案</label>
          </th>
          <td>
            <textarea name="encyA" id="encyA" v-model="answer"></textarea>
          </td>
        </tr>

        <tr>
          <th>圖片</th>

          <td>
            <label for="encyPic01">
              圖01：
              <input type="file" id="encyPic01" name="upFile[]" @change="fileSelect" />
            </label>
            <img src style="max-width: 400px;max-height: 400px;" />
            <br />

            <label for="encyPic02">
              圖02：
              <input type="file" id="encyPic02" name="upFile[]" @change="fileSelect" />
            </label>
            <br />
            <label for="encyPic03">
              圖03：
              <input type="file" id="encyPic03" name="upFile[]" @change="fileSelect" />
            </label>
            <br />

            <label for="encyPic04">
              圖04：
              <input type="file" id="encyPic04" name="upFile[]" @change="fileSelect" />
            </label>
            <br />

            <label for="encyPic05">
              圖05：
              <input type="file" id="encyPic05" name="upFile[]" @change="fileSelect" />
            </label>
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
        title: "",
        content: "",
        titleImg: "",
        video: "",
        tag: "",
        type: ""
      },
      intro: "",
      question: "",
      answer: ""
    };
  },
  methods: {
    editEncyI: function() {
      const api = "/api/api_adminEncyEdit.php";

      this.encyEdit.content = this.answer + this.intro + this.question;

      this.$http
        .post(api, JSON.stringify(this.encyEdit))
        // $http.post(url,data)
        // 用post把從encyEdit來的js物件資料轉為json字串，傳給api背後的那支php
        .then(res => {
          this.data = res.data;
          alert(" 資料新增完成 ٩(･ิᴗ･ิ๑)۶ ");
          this.$router.go(-1);
        })
        .catch(err => console.log(err));
    },
    fileSelect(e) {
      let file = e.target.files.item(0);
      let readFile = new FileReader();
      readFile.readAsDataURL(file);
      readFile.addEventListener("load", this.loadImage);
    },
    loadImage(e) {
      this.titleImg = e.target.result;
    },
    changeColor: function() {
      $("#encyTag").toggleClass("#encyTagChange");
    }
  }
};
</script>

