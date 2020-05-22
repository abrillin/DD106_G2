<template>
  <div id="test" class="hello">
    <main id="home_main">
      <button id="scroll_btn">&#9660;</button>
      <div id="scroll_section">
        <button id="scroll_top" class="scroll_section_btn">Top</button>
        <button id="scroll_knowledge" class="scroll_section_btn">知識百科</button>
        <button id="scroll_market" class="scroll_section_btn">水果市集</button>
        <button id="scroll_blog" class="scroll_section_btn">果農日誌</button>
        <button id="scroll_member" class="scroll_section_btn">會員中心</button>
        <button id="scroll_footer" class="scroll_section_btn">End</button>
      </div>
      <div id="mainLOGO">
        <img src="../assets/LOGO.svg" alt />
      </div>
      <div
        id="mainText"
      >以「水果王國」名聞全世界的台灣，水果種類豐富，一年四季皆可嚐到新鮮可口的水果，但多數人可能不知道這些水果的產地、產季、甚至是色香味等等，因此希望能藉由我們的網站帶大家認識台灣獨特的水果文化。</div>
      <div id="knowledge_container">
        <div class="season">
          <div class="spring_tab tab -on" data-target="tab1">春</div>
          <div class="summer_tab tab" data-target="tab2">夏</div>
          <div class="fall_tab tab" data-target="tab3">秋</div>
          <div class="winter_tab tab" data-target="tab4">冬</div>
        </div>
        <div class="knowledge_page_parent">
          <div class="knowledge_page tab1 -on">
            <div class="knowledge_page_back">
              <div class="knowledge_page_title">水果介紹</div>
              <div class="knowledge_page_content">
                <p>以「水果王國」名聞全世界的台灣，水果種類豐富，一年四季皆可嚐到新鮮可口的水果，但多數人可能不知道這些水果的產地、產季、甚至是色香味等等，因此希望能藉由我們的網站帶大家認識台灣獨特的水果文化。</p>
                <div class="knowledge_page_content_spring"></div>
              </div>
            </div>
          </div>
          <div class="knowledge_page tab2">
            <div class="knowledge_page_back">
              <div class="knowledge_page_title">水果市集</div>
              <div class="knowledge_page_content">
                <div class="knowledge_page_content_summer">
                  <div>
                    <div></div>
                  </div>
                </div>
                <span>
                  <img src="../assets/tagspic.svg" alt />
                  <span>知識類</span>
                </span>
              </div>
            </div>
          </div>
          <div class="knowledge_page tab3">
            <div class="knowledge_page_back">
              <div class="knowledge_page_title">果農日誌</div>
              <div class="knowledge_page_content knowledge_page_content_fall"></div>
            </div>
          </div>
          <div class="knowledge_page tab4">
            <div class="knowledge_page_back">
              <div class="knowledge_page_title">水果目錄</div>
              <div class="knowledge_page_content">
                <div class="knowledge_page_content_winter">
                  <h2>
                    <span>春</span>
                    <span style="float:right;">Page.1</span>
                  </h2>
                  <h2>
                    <span>夏</span>
                    <span style="float:right;">Page.12</span>
                  </h2>
                  <h2>
                    <span>秋</span>
                    <span style="float:right;">Page.23</span>
                  </h2>
                  <h2>
                    <span>冬</span>
                    <span style="float:right;">Page.34</span>
                  </h2>
                  <h2>
                    <span>長年</span>
                    <span style="float:right;">Page.45</span>
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <router-link to="/main/book/bookIndex">
          <button class="home_title" style="left:53%;">知識百科</button>
        </router-link>
      </div>
      <div id="market_container">
        <router-link to="/main/shop">
          <button class="home_title">水果市集</button>
        </router-link>
        <div id="market_page">
          <div class="market_pic">
            <img src="../assets/marketitem01.png" alt />
          </div>
          <div class="market_intro">
            <h3>蜜焦乾 零添加</h3>
            <div class="market_tags">
              <img src="@/assets/blog-img/blog-tag.png" alt />
              <a href>24小時宅配到府</a>
            </div>

            <div class="pay_cart">
              <button>加入購物籃</button>
              <button>直接購買</button>
            </div>
          </div>
        </div>
      </div>
      <div id="blog_container">
        <router-link to="/main/blog-landing">
          <button class="home_title">果農日誌</button>
        </router-link>
        <div id="blog_page">
          <div class="blog_tags_area">
            <h2>Tags</h2>
            <div>
              <img src="../assets/tagspic.svg" alt />
              <span>果農心得</span>
            </div>
            <div>
              <img src="../assets/tagspic.svg" alt />
              <span>水果產品</span>
            </div>
            <div>
              <img src="../assets/tagspic.svg" alt />
              <span>旅遊日誌</span>
            </div>
            <div>
              <img src="../assets/tagspic.svg" alt />
              <span>水果知識</span>
            </div>
          </div>
        </div>
      </div>
      <div id="member_container">
        <router-link to="/main/member/information">
          <button class="home_title">會員中心</button>
        </router-link>
        <div id="member_page">
          <img src="../assets/memberpic.png" alt />
        </div>
      </div>
    </main>
    <div class="home_footer">
      <p>Copyright © 2020 台灣果語 rights reserved</p>
    </div>
  </div>
</template>
