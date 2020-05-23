<template>
  <div>
    <main class="encyEdit">
      <h1 class="manageTitle">
        知識百科 管理中心
        <span class="manageSubTitle">| 百科內容修改</span>
      </h1>

      <table class="encyEditTab" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <th>
            <label for="encyNo">編號</label>
          </th>
          <td>{{ encyEdit.no }}</td>
        </tr>

        <tr>
          <th>
            <label for="fruitTag">標籤</label>
          </th>
          <td>
            <select name="fruitTag" id="fruitTag" data-selected v-model="encyEdit.title">
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
            <select name="fruitSeason" id="fruitSeason" data-selected v-model="encyEdit.type">
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
            <textarea name="encyIntro" id="encyIntro" v-model="encyEdit.content"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            <label for="encyQ">農知識問題</label>
          </th>
          <td>
            <textarea name="encyQ" id="encyQ" v-model="encyEdit.question"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            <label for="encyA">農知識答案</label>
          </th>
          <td>
            <textarea name="encyA" id="encyA" v-model="encyEdit.answer"></textarea>
          </td>
        </tr>

        <tr>
          <th>圖片</th>

          <td>
            <label for="encyPic01">
              請傳3-5張圖：
              <input type="file" id="encyPic01" @change="fileSelect" multiple />
            </label>

            <img class="encyImg" src style="max-width: 200px;max-height: 200px;" />
            <img class="encyImg" src style="max-width: 200px;max-height: 200px;" />
            <img class="encyImg" src style="max-width: 200px;max-height: 200px;" />
            <img class="encyImg" src style="max-width: 200px;max-height: 200px;" />
            <img class="encyImg" src style="max-width: 200px;max-height: 200px;" />

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
  created() {
    const api = "/api/adminEncyInfo.php";

    this.$http.post(api).then(res => {
      const data = res.data;

      if (data != "") {
        this.encyEdit = {
          no: data.no,
          title: data.title,
          type: data.type,
          content: data.content,
          question: data.question,
          answer: data.answer,
          titleImg: data.titleImg,
          video: data.video
        };
      }
    });
  },
  methods: {
    update: function() {
      const api = "/api/api_adminEncyInfo.php";

      for (let i in this.encyEdit) {
        if (this.encyEdit[i] == "") {
          alert("有欄位空白，請再檢查一次 ﾚ(ﾟ∀ﾟ;)ﾍ ");
          return;
        }
      }

      this.$http.post(api, JSON.stringify(this.encyEdit)).then(res => {
        const data = res.data;

        if (data == 1) {
          alert(" 修改成功 ᕦ(ò_óˇ)ᕤ ");

          this.$router.go(0);
        }
      });
    }
  }
};
</script>

