<template>
  <div class="book_layout">
    <!-- knowledge_blog -->
    <div class="bk_ct bk_ct_left_2">
      <a href>
        <h2>果農日誌 GOGOGO</h2>
      </a>

      <div class="bk_blog_line1"></div>
      <div class="bk_blog_line2"></div>
      <div id="bk_blog_knowledge">
        <p>2020-04-26</p>
        <h3>“酸澀到芳香，望梅止渴？”</h3>
        <div class="bk_blog_up">
          <div class="bk_blog_reporter">
            <div class="bk_blog_rpt_img">
              <a href>
                <img src="@/assets/book_img/reporter.png" />
              </a>
            </div>
            <div class="bk_blog_rpt_name">
              <a href="#">蓬蓬阿姨</a>
              <div class="bk_blog_star">
                <img src="@/assets/memberstar.svg" />
                <img src="@/assets/memberstar.svg" />
                <img src="@/assets/memberstar.svg" />
                <img src="@/assets/memberstar.svg" />
                <img src="@/assets/memberstar.svg" />
              </div>
            </div>
            <!-- <div class="bk_blog_rpt_button">
              <button>＋追蹤</button>
            </div> -->
            <!-- 標籤 -->
            <div class="bk_blog_tag">
              <a href>
                <img src="@/assets/icon/tag2.svg" /> 梅子
              </a>
              <a href>
                <img src="@/assets/icon/tag2.svg" /> 百科知識
              </a>
            </div>
          </div>
          <div class="bk_blog_img">
            <img src="@/assets/book_img/spring/plum/plum03.jpg" />
          </div>
        </div>
        <div class="bk_blog_line3">
          <img src="@/assets/book_img/bk_blog_line3.svg" />
        </div>
      </div>
      <div id="bk_blog_content">
        <p>白石湖是大台北難得仍保存農業風味的鄉村地區，當地多產白色沉積砂岩石塊故而得名，近年轉型成為休閒農業區，區內種植草莓聞名，每年12月至5月的草莓產季來臨，絡繹不絕的人潮湧入內湖一帶的草莓園。我們一早就來到莓圃休閒農園，是個擁有果園、菜園和庭園咖啡等多元場域，其中溫室草莓園吸引家長帶著孩子體驗採果樂，不用擔心腳底褲管沾到泥巴。特別提醒台北內湖的莓園幾乎是假日上午11點開放，當天採摘到一定數量便掛上「本日已採完」的告示牌，若想採草莓的朋友建議早點排隊。</p>
      </div>
    </div>
    <!-- knowledge_market -->
    <div class="bk_ct bk_ct_right_2">
      <a href="#">
        <h2>水果市集 GOGOGO</h2>
      </a>
      <div class="bk_product">
        <div class="bk_product_img bk_pd1">
          <img src="@/assets/book_img/plum_pd.png" />
        </div>
        <div class="bk_pd_description">
          <h4>會說話的梅精</h4>
          <p>$970/罐</p>
          <br />
          <a href="#">商品詳情...</a>
        </div>
      </div>
      <div class="bk_product bk_product2">
        <div class="bk_pd_description2">
          <h4>會說話的梅精</h4>
          <p>$970/罐</p>
          <br />
          <a href="#">商品詳情...</a>
        </div>
        <div class="bk_product_img bk_pd2">
          <img src="@/assets/book_img/pd1.jpg" />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: { page: Number },
  methods: {
    content: function() {
      console.log(this.page);
    },
  }
};
</script>