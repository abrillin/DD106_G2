<template>
  <div class="hello">
    <main>
      <div id="mainLOGO">
        <img src="../assets/LOGO.svg" alt="" />
      </div>
      <div id="knowledge_container">
        <div>
          <div class="knowledge_page tab1 -on">
            <div class="aa">
              <div>1</div>
            </div>
          </div>
          <div class="knowledge_page tab2">
            <div class="aa">
              <div>2</div>
            </div>
          </div>
          <div class="knowledge_page tab3">
            <div class="aa">
              <div>3</div>
            </div>
          </div>
          <div class="knowledge_page tab4">
            <div class="aa">
              <div>4</div>
            </div>
          </div>
        </div>
        <BtnMore />
        <div id="knowledge_title">
          <img src="../assets/knowledgetitle.svg" alt />
        </div>
        <div class="spring_tab tab -on" data-target="tab1">春</div>
        <div class="summer_tab tab" data-target="tab2">夏</div>
        <div class="fall_tab tab" data-target="tab3">秋</div>
        <div class="winter_tab tab" data-target="tab4">冬</div>
      </div>
      <div id="market_container">
        <div id="market_title">
          <img src="../assets/markettitle.svg" alt />
        </div>
        <div id="market_page">
          <div class="market_pic">
            <img src="../assets/marketitem01.png" alt />
          </div>
          <div class="market_intro">
            <h3>蜜焦乾 零添加</h3>
            <div class="market_tags">
              <img src="../assets/tagspic.svg" alt />
              <a href>24小時宅配到府</a>
            </div>
            <div class="number_price">
              <input class="input_number" type="text" value="1" min="0" />
              <span class="input_number_select">
                <button class="plus_number">+</button>
                <button class="minus_number">-</button>
              </span>
              <span>$ 250/包</span>
            </div>
            <div class="pay_cart">
              <button>加入購物籃</button>
              <button>直接購買</button>
            </div>
          </div>
        </div>
        <BtnMore />
      </div>
      <div id="blog_container">
        <div id="blog_title">
          <img src="../assets/blogtitle.svg" alt="" />
        </div>
        <div id="blog_page">
          <div class="blog_tags_area">
            <h2>Tags</h2>
            <div>
              <img src="../assets/tagspic.svg" alt="" />
              <span>果農心得</span>
            </div>
            <div>
              <img src="../assets/tagspic.svg" alt="" />
              <span>水果產品</span>
            </div>
            <div>
              <img src="../assets/tagspic.svg" alt="" />
              <span>旅遊日誌</span>
            </div>
            <div>
              <img src="../assets/tagspic.svg" alt="" />
              <span>水果知識</span>
            </div>
          </div>
          <BtnMore />
        </div>
      </div>
      <div id="member_container">
        <div id="member_title">
          <img src="../assets/membertitle.svg" alt="" />
        </div>
        <div id="member_page">
          <img src="../assets/memberpic.png" alt="" />
        </div>
        <BtnMore />
      </div>
    </main>
  </div>
</template>
<script>
import "@/home";
import BtnMore from "@/components/btn-more";

export default {
  name: "HelloWorld",
  components: {

    BtnMore
  }
};
</script>
