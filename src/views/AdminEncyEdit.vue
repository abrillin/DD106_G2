<template>
  <div>
    <main class="encyEdit">
      <h1 class="manageTitle">
        知識百科 管理中心
        <span class="manageSubTitle">| 百科內容新增/修改</span>
      </h1>

      <table class="encyEditTab" cellpadding="0" cellspacing="0" border="0">
        <!-- <tr>
          <th>編號</th>
          <td>xxxxxx</td>
        </tr>-->

        <tr>
          <th>
            <label for="encyIntro">水果介紹</label>
          </th>
          <td>
            <textarea name="encyIntro" id="encyIntro"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            <label for="encyQ">農知識問題</label>
          </th>
          <td>
            <textarea name="encyQ" id="encyQ"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            <label for="encyA">農知識答案</label>
          </th>
          <td>
            <textarea name="encyA" id="encyA"></textarea>
          </td>
        </tr>

        <tr>
          <th>圖片</th>

          <td>
            <label for="encyPic01" @change="changeMemPic">
              圖01：
              <input type="file" id="encyPic01" name="upFile[]" />
            </label><br />

            <label for="encyPic02" @change="changeMemPic">
              圖02：
              <input type="file" id="encyPic02" name="upFile[]" />
            </label><br />

            <label for="encyPic03" @change="changeMemPic">
              圖03：
              <input type="file" id="encyPic03" name="upFile[]" />
            </label><br />

            <label for="encyPic04" @change="changeMemPic">
              圖04：
              <input type="file" id="encyPic04" name="upFile[]" />
            </label><br />

            <label for="encyPic05" @change="changeMemPic">
              圖05：
              <input type="file" id="encyPic05" name="upFile[]" />
            </label><br />
       
          </td>
        </tr>
        <tr>
          <th>影片</th>
          <td>
            <input type="file" name="upFile[]" />
          </td>
        </tr>
        <tr>
          <th>標籤</th>
          <td>
            <button class="encyTag">+ 春季</button>
            <button class="encyTag">+ 秋季</button>
            <button class="encyTag">+ 夏季</button>
            <button class="encyTag">+ 冬季</button>
            <button class="encyTag">+ 西瓜</button>
            <button class="encyTag">+ 芒果</button>
            <button class="encyTag">+ 蓮霧</button>
            <button class="encyTag">+ 鳳梨</button>
            <button class="encyTag">+ 草莓</button>
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
              <input id="ecnyEditSubmit" type="submit" value="送出" />
            </div>
          </td>
        </tr>
      </table>
    </main>
  </div>
</template>

