<template>
  <main class="wrapper">
    <section class="show_item">
      <img src="../assets/search_logo_img.svg" width="170px" height="100px" class="search_logo" />
      <div></div>
      <img src="../assets/market_Img.svg" width="171px" height="153px" class="market" />
    </section>

    <section class="shop_main">
      <div class="container-wrapper">
        <!-- <img src="../assets/search_logo_img.svg" width="170px" height="100px" class="search_logo"> -->
        <div class="search-section">
          <div class="searchbar">
            <div class="searchbar__main">
              <form role="search" class="searchbar-input" autocomplete="off">
                <input
                  class="searchbar-input_input"
                  maxlength="128"
                  placeholder="商品搜尋..."
                  autocomplete="off"
                />
              </form>
              <button type="button" class="search_btn">
                <img
                  src="../assets/icon/search_icon.svg"
                  class="search_icon"
                  width="24px"
                  height="24px"
                />
              </button>
            </div>
          </div>
          <div class="hot-words">
            <div class="hot-words_list">
              <a class="hot-words_item" href>週末親子旅遊</a>
              <a class="hot-words_item" href>桃園山區採果</a>
              <a class="hot-words_item" href>富士蘋果</a>
              <a class="hot-words_item" href>愛文芒果</a>
              <a class="hot-words_item" href>大湖草莓</a>
            </div>
          </div>
        </div>
        <!-- <img src="../assets/market_Img.svg" width="171px" height="153px" class="market"> -->
      </div>
      <div class="blog_line_box">
        <img src="../assets/blog_line.svg" class="blog_line" width="90%" />
      </div>

      <div class="shop_container">
        <aside class="filter-panel">
          <img src="../assets/market_choose_right_mountain_only.svg" class="mountain" />
          <div class="filter-status">
            <img src="../assets/icon/filter.svg" width="20px" style="margin-right: 10px;" />
            <div class="filter-status_text">條件篩選</div>
          </div>
          <form class="filter-group">
            <div class="filter-group_header">運送方式：</div>
            <div class="folding-items">
              <div class="checkbox-filter">
                <div class="checkbox">
                  <label class="checkbox__control">
                    <input type="checkbox" value="24hour" />
                    <span class="checkbox__label">24小時到府</span>
                  </label>
                </div>
              </div>
              <div class="checkbox-filter">
                <div class="checkbox">
                  <label class="checkbox__control">
                    <input type="checkbox" value="home" />
                    <span class="checkbox__label">宅配到府</span>
                  </label>
                </div>
              </div>
              <div class="checkbox-filter">
                <div class="checkbox">
                  <label class="checkbox__control">
                    <input type="checkbox" value="store" />
                    <span class="checkbox__label">超商取貨</span>
                  </label>
                </div>
              </div>
            </div>
          </form>
          <form class="filter-group">
            <div class="filter-group_header">分類：</div>
            <div class="folding-items">
              <div class="checkbox-filter">
                <div class="checkbox">
                  <label class="checkbox__control">
                    <input type="checkbox" value="gift_box" />
                    <span class="checkbox__label">禮盒</span>
                  </label>
                </div>
              </div>
              <div class="checkbox-filter">
                <div class="checkbox">
                  <label class="checkbox__control">
                    <input type="checkbox" value="promotion" />
                    <span class="checkbox__label">促銷商品</span>
                  </label>
                </div>
              </div>
              <div class="checkbox-filter">
                <div class="checkbox">
                  <label class="checkbox__control">
                    <input type="checkbox" value="coming_soon" />
                    <span class="checkbox__label">即將放送</span>
                  </label>
                </div>
              </div>
              <div class="checkbox-filter">
                <div class="checkbox">
                  <label class="checkbox__control">
                    <input type="checkbox" value="machining" />
                    <span class="checkbox__label">加工產品</span>
                  </label>
                </div>
              </div>
              <div class="checkbox-filter">
                <div class="checkbox">
                  <label class="checkbox__control">
                    <input type="checkbox" value="dried_fruit" />
                    <span class="checkbox__label">果乾</span>
                  </label>
                </div>
              </div>
              <div class="checkbox-filter">
                <div class="checkbox">
                  <label class="checkbox__control">
                    <input type="checkbox" value="fresh_fruit" />
                    <span class="checkbox__label">新鮮水果</span>
                  </label>
                </div>
              </div>
              <div class="checkbox-filter">
                <div class="checkbox">
                  <label class="checkbox__control">
                    <input type="checkbox" value="organic_fruit" />
                    <span class="checkbox__label">有機水果</span>
                  </label>
                </div>
              </div>
            </div>
          </form>
        </aside>

        <aside class="hot_commodity">
          <img src="../assets/market_choose_right_mountain_only.svg" class="mountain" />
          <div class="hot_commodity_filter-status">
            <img src="../assets/icon/podium.svg" width="30px" style="margin-right: 10px;" />
            <div class="hot_commoditystatus_text">明星商品</div>
          </div>
          <div>
            <ul>
              <li>木瓜乾 零添加</li>
              <li>木瓜乾 零添加</li>
              <li>木瓜乾 零添加</li>
              <li>木瓜乾 零添加</li>
              <li>木瓜乾 零添加</li>
            </ul>
          </div>
        </aside>

        <div class="search-item-result_items">
          <div class="commodity">
            <div class="card_img_box">
              <img src="../assets/ia_300000017.jpg" width="270px" height="100%" />
            </div>

            <div class="card_content">
              <div class="commodity_title">
                <div class="commodity_title_text">蜜蕉乾 零添加</div>
              </div>

              <div class="card_tag">
                <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                <span class="card_tag_text">24hr宅配到府</span>
              </div>

              <div class="card_price">
                <span class="money">550</span>
              </div>

              <div class="buy">
                <a href="#" class="card_btn">加入購物籃</a>
                <a href="#" class="card_btn">直接購買</a>
              </div>
            </div>
          </div>
          <div class="commodity">
            <div class="card_img_box">
              <img src="../assets/ia_300000017.jpg" width="270px" height="100%" />
            </div>

            <div class="card_content">
              <div class="commodity_title">
                <div class="commodity_title_text">蜜蕉乾 零添加</div>
              </div>

              <div class="card_tag">
                <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                <span class="card_tag_text">24hr宅配到府</span>
              </div>

              <div class="card_price">
                <span class="money">550</span>
              </div>

              <div class="buy">
                <a href="#" class="card_btn">加入購物籃</a>
                <a href="#" class="card_btn">直接購買</a>
              </div>
            </div>
          </div>
          <div class="commodity">
            <div class="card_img_box">
              <img src="../assets/ia_300000017.jpg" width="270px" height="100%" />
            </div>

            <div class="card_content">
              <div class="commodity_title">
                <div class="commodity_title_text">蜜蕉乾 零添加</div>
              </div>

              <div class="card_tag">
                <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                <span class="card_tag_text">24hr宅配到府</span>
              </div>

              <div class="card_price">
                <span class="money">550</span>
              </div>

              <div class="buy">
                <a href="#" class="card_btn">加入購物籃</a>
                <a href="#" class="card_btn">直接購買</a>
              </div>
            </div>
          </div>
          <div class="commodity">
            <div class="card_img_box">
              <img src="../assets/ia_300000017.jpg" width="270px" height="100%" />
            </div>

            <div class="card_content">
              <div class="commodity_title">
                <div class="commodity_title_text">蜜蕉乾 零添加</div>
              </div>

              <div class="card_tag">
                <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                <span class="card_tag_text">24hr宅配到府</span>
              </div>

              <div class="card_price">
                <span class="money">550</span>
              </div>

              <div class="buy">
                <a href="#" class="card_btn">加入購物籃</a>
                <a href="#" class="card_btn">直接購買</a>
              </div>
            </div>
          </div>
          <div class="commodity">
            <div class="card_img_box">
              <img src="../assets/ia_300000017.jpg" width="270px" height="100%" />
            </div>

            <div class="card_content">
              <div class="commodity_title">
                <div class="commodity_title_text">蜜蕉乾 零添加</div>
              </div>

              <div class="card_tag">
                <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                <span class="card_tag_text">24hr宅配到府</span>
              </div>

              <div class="card_price">
                <span class="money">550</span>
              </div>

              <div class="buy">
                <a href="#" class="card_btn">加入購物籃</a>
                <a href="#" class="card_btn">直接購買</a>
              </div>
            </div>
          </div>
          <div class="commodity">
            <div class="card_img_box">
              <img src="../assets/ia_300000017.jpg" width="270px" height="100%" />
            </div>

            <div class="card_content">
              <div class="commodity_title">
                <div class="commodity_title_text">蜜蕉乾 零添加</div>
              </div>

              <div class="card_tag">
                <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                <span class="card_tag_text">24hr宅配到府</span>
              </div>

              <div class="card_price">
                <span class="money">550</span>
              </div>

              <div class="buy">
                <a href="#" class="card_btn">加入購物籃</a>
                <a href="#" class="card_btn">直接購買</a>
              </div>
            </div>
          </div>
          <div class="commodity">
            <div class="card_img_box">
              <img src="../assets/ia_300000017.jpg" width="270px" height="100%" />
            </div>

            <div class="card_content">
              <div class="commodity_title">
                <div class="commodity_title_text">蜜蕉乾 零添加</div>
              </div>

              <div class="card_tag">
                <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                <span class="card_tag_text">24hr宅配到府</span>
              </div>

              <div class="card_price">
                <span class="money">550</span>
              </div>

              <div class="buy">
                <a href="#" class="card_btn">加入購物籃</a>
                <a href="#" class="card_btn">直接購買</a>
              </div>
            </div>
          </div>
          <div class="commodity">
            <div class="card_img_box">
              <img src="../assets/ia_300000017.jpg" width="270px" height="100%" />
            </div>

            <div class="card_content">
              <div class="commodity_title">
                <div class="commodity_title_text">蜜蕉乾 零添加</div>
              </div>

              <div class="card_tag">
                <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                <span class="card_tag_text">24hr宅配到府</span>
              </div>

              <div class="card_price">
                <span class="money">550</span>
              </div>

              <div class="buy">
                <a href="#" class="card_btn">加入購物籃</a>
                <a href="#" class="card_btn">直接購買</a>
              </div>
            </div>
          </div>
          <div class="commodity">
            <div class="card_img_box">
              <img src="../assets/ia_300000017.jpg" width="270px" height="100%" />
            </div>

            <div class="card_content">
              <div class="commodity_title">
                <div class="commodity_title_text">蜜蕉乾 零添加</div>
              </div>

              <div class="card_tag">
                <img src="../assets/icon/tag.svg" alt width="16px" height="16px" class="tag_icon" />
                <span class="card_tag_text">24hr宅配到府</span>
              </div>

              <div class="card_price">
                <span class="money">550</span>
              </div>
              <div class="buy">
                <a href="#" class="card_btn">加入購物籃</a>
                <a href="#" class="card_btn">直接購買</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </main>
</template>