<template>
  <div class="blog-post-ousidebox">
    <nav id="navbg"></nav>
    <img class="post2-blog-bar" src="@/assets/blog-img/blog-bar.png" />
    <br />
    <div class="blog-landing-container">
      <div>
        <div>
          <!--果農日誌LOGO-->
          <img src="@/assets/blog-img/blog_logo.svg" />
        </div>
        <div>
          <div>
            <div>
              <img src="@/assets/blog-img/blog-dot.png" alt />
              <span></span>
              <span>旅遊</span>
            </div>
            <div>
              <img src="@/assets/blog-img/blog-dot.png" alt />
              <span></span>
              <span>水果知識</span>
            </div>
            <div>
              <img src="@/assets/blog-img/blog-dot.png" alt />
              <span></span>
              <span>農民樂</span>
            </div>
          </div>
          <div>
            <span>20019/12/16 - 2020/06/05</span>
          </div>
        </div>
      </div>
    </div>
    <div class="blogPost2OuterOuter">
      <div class="blogPost2Outer">
        <div class="blogPost2Main">
          <div>
            <div>{{ blogArrFilterTop[0].date }}</div>
            <div>
              <span>{{ blogArrFilterTop[0].title }}</span>
            </div>
            <div>
              <img :src="blogArrFilterTop[0].m_img" />
            </div>
            <div>{{ blogArrFilterTop[0].nick }}</div>
            <div>
              <img
                src="@/assets/Group 720.svg"
                v-if="
                  blogArrFilterTop[0].review_total /
                    blogArrFilterTop[0].review_count >
                    0
                "
              />
              <img
                src="@/assets/Group 720.svg"
                v-if="
                  blogArrFilterTop[0].review_total /
                    blogArrFilterTop[0].review_count >
                    1
                "
              />
              <img
                src="@/assets/Group 720.svg"
                v-if="
                  blogArrFilterTop[0].review_total /
                    blogArrFilterTop[0].review_count >
                    2
                "
              />
              <img
                src="@/assets/Group 720.svg"
                v-if="
                  blogArrFilterTop[0].review_total /
                    blogArrFilterTop[0].review_count >
                    3
                "
              />
              <img
                src="@/assets/Group 720.svg"
                v-if="
                  blogArrFilterTop[0].review_total /
                    blogArrFilterTop[0].review_count >
                    4
                "
              />
            </div>
            <div>
              <span style="display:none;">+追蹤</span>
            </div>
            <div>
              <img src="@/assets/blog-img/blog-tag.png" />
              <span>草莓</span><br />
              <img src="@/assets/blog-img/blog-tag.png" />
              <span>旅遊日誌</span>
            </div>
            <div>
              <img src="@/assets/blog-img/blog-thumb.png" />
              <span>{{ blogArrFilterTop[0].clapCount }}</span>
            </div>
            <div
              v-html="
                blogArrFilterTop[0].content + blogArrFilterTop[0].content2
              "
            ></div>
          </div>
          <div>
            <div>
              <div id="girlCollectionFruit">
                <!--妹妹採水果/星星-->
              </div>
              <img src="@/assets/blog-img/post/yello-something.png" alt />
            </div>
            <div class="blog-post2-msg-card-box">
              <div
                class="blog-post2-msg-card"
                v-for="(i, index) in topMsg"
                :key="index"
              >
                <div>
                  <img :src="i.img" />
                </div>
                <div>
                  <p>{{ i.nick }}</p>
                  <p>{{ i.date }}</p>
                </div>
                <div>{{ i.content }}</div>
                <div>
                  <img src="@/assets/blog-img/blog-report.png" />
                </div>
              </div>
              <!--<div class="blog-post2-msg-card">
                <div>
                  <img src="@/assets/blog-img/blog-someoneshead.png" />
                </div>
                <div>
                  <p>howhowhasnofriend</p>
                  <p>2020-4-14 12:00</p>
                </div>
                <div>炒飯不好吃炒飯不好吃...</div>
                <div>
                  <img src="@/assets/blog-img/blog-report.png" />
                </div>
              </div>-->
            </div>
            <div>
              <form action method="get">
                <label for>
                  留言:
                  <textarea v-model="topMsgText" name id></textarea>
                </label>
                <br />

                <div class="blogPost2ButtonMore" @click.prevent="comment">
                  <buttonMore class="blogPost2ButtonMore1" msg="送出">
                  </buttonMore>
                </div>
              </form>
            </div>
            <div>
              <!--接水果動畫-->
              <img src="@/assets/blog-img/post/someone-catch-fruit.png" />
              <img src="@/assets/blog-img/post/be-catched-fruit.png" />
              <img src="@/assets/blog-img/post/be-catched-fruit.png" />
              <img src="@/assets/blog-img/post/be-catched-fruit.png" />
            </div>
          </div>
        </div>
        <div class="blog-post-container2">
          <div>
            <!--下面的區塊-->
            <div>
              <!--search-->
              <div>
                <!--籃子圖-->
                <img src="@/assets/blog-img/post/basket.png" />
              </div>
              <div>
                <div>
                  <form action method="get">
                    <input
                      @keydown.enter="searchKeywordMethod"
                      id="searchKeyword"
                      placeholder="水果知識"
                      type="text"
                    />
                    <img class="magnifier" @click="searchKeywordMethod" src="@/assets/blog-img/post/magnifier.png" />
                  </form>
                </div>
                <div>
                  <span>番茄</span>
                  <span>香蕉</span>
                  <span>鳳梨</span>
                  <span>黑魔王</span>
                </div>
              </div>
            </div>
            <img src="@/assets/blog-img/blog-bendingbar2.png" />
            <p>最新日誌</p>
            <select class="blog-post-tri" name id>
              <option value>日誌排序</option>
            </select>
            <!--卡片區-->
            <!--卡片區-->
            <!--卡片區-->
            <div class="blog-post2-card-area">
              <router-link
                to="/main/blog/landing"
                class="blog-post2-long-card-outer"
                v-for="(i, index) in blogArrFilterTop"
                :key="index"
              >
                <div class="blog-post2-long-card" @click="changePage(i)">
                  <div>
                    <img :src="i.img[0]" />
                  </div>
                  <div>
                    <div>
                      <p>{{ i.date }}</p>
                      <p>{{ i.title }}</p>
                      <p>
                        <img src="@/assets/blog-img/blog-thumb.png" />
                        <span>{{ i.clapCount }}</span>
                        <img src="@/assets/blog-img/blog-tag.png" />
                        <span>西瓜</span>
                        <img src="@/assets/blog-img/blog-tag.png" />
                        <span>果農心得</span>
                      </p>
                      <p v-html="i.content"></p>
                    </div>
                    <div>
                      <div>
                        <img :src="i.m_img" />
                      </div>
                      <div>
                        <div>{{ i.nick }}</div>
                        <div>
                          <img
                            src="@/assets/Group 720.svg"
                            v-if="i.review_total / i.review_count > 0"
                          />
                          <img
                            src="@/assets/Group 720.svg"
                            v-if="i.review_total / i.review_count > 1"
                          />
                          <img
                            src="@/assets/Group 720.svg"
                            v-if="i.review_total / i.review_count > 2"
                          />
                          <img
                            src="@/assets/Group 720.svg"
                            v-if="i.review_total / i.review_count > 3"
                          />
                          <img
                            src="@/assets/Group 720.svg"
                            v-if="i.review_total / i.review_count > 4"
                          />

                          <!--<img src="@/assets/blog-img/blog-star.png" />-->
                        </div>
                      </div>
                      <div>
                        <span style="display:none;">+追蹤</span>
                      </div>
                    </div>
                  </div>
                </div>
              </router-link>
              <!--小卡片-->
              <!--小卡片-->
              <!--小卡片-->

              <div class="blog-post2-small-card-container">
                <!--<router-link
                  to="/main/blog/landing"
                  class="blog-post2-small-card"
                >
                  <div>
                    <img src="@/assets/blog-img/post/grape.png" />
                    <div>
                      <div>
                        <img src="@/assets/blog-img/blog-thumb.png" />
                      </div>
                      <div>
                        <span>100</span>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p>2020-04-08</p>
                    <p>親子輕旅行 台北白石湖採草莓、 踏青一日遊</p>
                    <div>
                      <img src="@/assets/blog-img/blog-tag.png" />
                      <span>知識類</span>
                    </div>
                    <p>區內種植草莓聞名，每年12月至5月的草莓產季來臨，的...</p>
                  </div>
                  <div>
                    <div>
                      <img src="@/assets/blog-img/blog-someoneshead.png" />
                    </div>
                    <div>
                      <span>蓬蓬草莓姨</span>
                      <div>
                        <img src="@/assets/blog-img/blog-star.png" />
                        <img src="@/assets/blog-img/blog-star.png" />
                        <img src="@/assets/blog-img/blog-star.png" />
                        <img src="@/assets/blog-img/blog-star.png" />
                        <img src="@/assets/blog-img/blog-star.png" />
                      </div>
                    </div>
                    <div>
                      <span>+追蹤</span>
                    </div>
                  </div>
                </router-link>

                -->

                <router-link
                  to="/main/blog/landing"
                  v-for="(i, index) in blogArrFilter"
                  :key="index"
                  class="blog-post2-small-card"
                >
                  <div @click="changePage(i)">
                    <div>
                      <img :src="i.img[0]" />
                      <div>
                        <div>
                          <img src="@/assets/blog-img/blog-thumb.png" />
                        </div>
                        <div>
                          <span>{{ i.clapCount }}</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>{{ i.date }}</p>
                      <p>{{ i.title }}</p>
                      <div>
                        <img src="@/assets/blog-img/blog-tag.png" />
                        <span>知識類</span>
                      </div>
                      <p v-html="i.content"></p>
                    </div>
                    <div>
                      <div>
                        <img :src="i.m_img" />
                      </div>
                      <div>
                        <span>{{ i.nick }}</span>
                        <div>
                          <img
                            src="@/assets/Group 720.svg"
                            v-if="i.review_total / i.review_count > 0"
                          />
                          <img
                            src="@/assets/Group 720.svg"
                            v-if="i.review_total / i.review_count > 1"
                          />
                          <img
                            src="@/assets/Group 720.svg"
                            v-if="i.review_total / i.review_count > 2"
                          />
                          <img
                            src="@/assets/Group 720.svg"
                            v-if="i.review_total / i.review_count > 3"
                          />
                          <img
                            src="@/assets/Group 720.svg"
                            v-if="i.review_total / i.review_count > 4"
                          />
                        </div>
                      </div>
                      <div>
                        <span style="display:none;">+追蹤</span>
                      </div>
                    </div>
                  </div>
                </router-link>
              </div>
            </div>
            <!---->
            <!---->
            <!---->
            <!---->

            <!--頁簽-->
            <!--頁簽-->
            <!--頁簽-->
            <ul class="page">
              <li class="pageArrow" @click="PreviousPage">
                <img src="@/assets/blog-img/post/arrow-left.png" />
              </li>

              <li
                class="pageBorder"
                v-for="(i, index) in pageArr"
                :key="index"
                v-on="{ click: pageSelect }"
              >
                {{ i }}
              </li>

              <li class="pageArrow" @click="nextPage">
                <img src="@/assets/blog-img/post/arrow-right.png" />
              </li>
            </ul>
          </div>
          <!--上面是左邊區塊-->
          <!--上面是左邊區塊-->
          <!--上面是左邊區塊-->
          <div>
            <!-- tags&leaderblard-->
            <div>
              <img src="@/assets/blog-img/post/tags-header.png" alt />
              <img src="@/assets/blog-img/post/experience.png" alt />
              <img src="@/assets/blog-img/post/product.png" alt />
              <img src="@/assets/blog-img/post/log.png" alt />
              <img src="@/assets/blog-img/post/knowledge.png" alt />
              <img src="@/assets/blog-img/post/tag-footer.png" alt />
            </div>
            <div class="blogPostLeaderBoard">
              <div>1</div>
              <div>2020-04-08</div>
              <div>親子輕旅行 台北白石湖採草莓、 踏青一日遊</div>
              <div>
                <img src="@/assets/blog-img/blog-someoneshead.png" alt />
              </div>
              <div>蓬蓬草苺姨</div>
              <div>
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
              </div>
              <div>
                <img src="@/assets/blog-img/blog-thumb.png" alt />
                <span>300</span>
              </div>
            </div>
            <div class="blogPostLeaderBoard">
              <div>2</div>
              <div>2020-04-08</div>
              <div>親子輕旅行 台北白石湖採草莓、 踏青一日遊</div>
              <div>
                <img src="@/assets/blog-img/blog-someoneshead.png" alt />
              </div>
              <div>蓬蓬草苺姨</div>
              <div>
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
              </div>
              <div>
                <img src="@/assets/blog-img/blog-thumb.png" alt />
                <span>300</span>
              </div>
            </div>
            <div class="blogPostLeaderBoard">
              <div>3</div>
              <div>2020-04-08</div>
              <div>親子輕旅行 台北白石湖採草莓、 踏青一日遊</div>
              <div>
                <img src="@/assets/blog-img/blog-someoneshead.png" alt />
              </div>
              <div>蓬蓬草苺姨</div>
              <div>
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
                <img src="@/assets/blog-img/blog-star.png" />
              </div>
              <div>
                <img src="@/assets/blog-img/blog-thumb.png" alt />
                <span>300</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
.blog-post-ousidebox {
  .post2-blog-bar{
        width: 100%;

  }
  #navbg {
    position: fixed;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    box-sizing: border-box;
    padding: 0px 1%;
    top: 0px;
    transition: all 0.5s;
    height: 60px;
    width: 100%;
    z-index: 998;
    background-color: rgba(251, 248, 239, 0.938);
  }

  padding-top: 60px;
  // overflow: hidden;
  background-color: #fbf8ef;
  > img:nth-child(1) {
    width: 100%;
  }
}
.blogPost2OuterOuter {
  border: solid #007552 5px;
  // background-color: #000;
  width: 85%;
  margin-left: 3.2%;
  padding-left: 7%;
  @media (max-width: 1300px) {
    width: 88%;
    margin-left: 2.5%;
    padding-left: 3%;
    padding-right: 3%;
  }
  @media (max-width: 600px) {
    margin-left: 2%;
  }
  @media (max-width: 400px) {
    margin-left: 1%;
  }
  @media (max-width: 330px) {
    margin-left: 0%;
  }
}
.blogPost2Outer {
  display: flex;
  flex-direction: column;
  // background-color: #000;
}
.blogPost2Main {
  // background-color: #000;
  display: grid;
  grid-template-columns: 1.2fr 2fr;
  position: relative;
  padding-bottom: 5%;
  // column-gap: 10%;
  // width: 95%;
  // margin-left: 2.5%;
  // height: 50vw;
  // padding-bottom: 5%;
  &::before {
    content: "";
    border-bottom: #007552 5px solid;
    width: 105%;
    position: absolute;
    bottom: 0%;
    right: 2%;
    @media (max-width: 1300px) {
      width: 100%;
      right: 0%;
    }
  }
  @media (max-width: 1600px) {
    grid-template-columns: 1fr 1fr;
    column-gap: 10%;
  }
  @media (max-width: 1300px) {
    grid-template-columns: 1fr;
  }
  > div:nth-child(1) {
    &::before {
      content: "";
      display: inline-block;
      border-right: #6baf9b solid 2px;
      height: 50%;
      position: absolute;
      right: -20%;
      bottom: 9%;
      @media (max-width: 1600px) {
        right: -12%;
      }
      @media (max-width: 1600px) {
        display: none;
      }
    }
    &::after {
      border-bottom: #6baf9b solid 2px;
      width: 100%;
      position: absolute;
      bottom: 0%;
      left: 0%;
      @media (max-width: 1300px) {
        content: "";
      }
    }
    // border: 4px solid #000;
    padding-top: 4%;
    // border-right: #000 2px solid;
    // padding-right: 10%;
    position: relative;
    display: grid;
    grid-template-columns: 1.5fr 2fr 1.5fr 3fr;
    grid-template-rows: 0.1fr 1fr 0.5fr 0.5fr 0.4fr 5fr;
    grid-template-areas:
      "aa1 aa1 aa1 aa1"
      "aa2 aa2 aa2 aa2 "
      "aa3 aa4 aa6 aa7"
      "aa3 aa5 aa6 aa7"
      "aa8 aa8 aa8 aa8"
      "aa9 aa9 aa9 aa9";
    @media (max-width: 1600px) {
      // padding-right: 0%;
      grid-template-columns: 0.9fr 1.3fr 1fr 3fr;
    }
    @media (max-width: 1300px) {
      padding-right: 0%;
      grid-template-columns: 0.7fr 1fr 1fr 4.5fr;
      padding-bottom: 4%;
    }
    @media (max-width: 992px) {
      grid-template-columns: 1fr 1.2fr 1fr 4.5fr;
    }
    @media (max-width: 768px) {
      grid-template-columns: 1fr 1.5fr 1fr 3fr;
    }
    @media (max-width: 576px) {
      grid-template-areas:
        "aa1 aa1 aa1 aa1"
        "aa2 aa2 aa2 aa2 "
        "aa3 aa4 aa6 aa6"
        "aa3 aa5 aa7 aa7"
        "aa8 aa8 aa8 aa8"
        "aa9 aa9 aa9 aa9";
      grid-template-columns: 1fr 1.5fr 1fr 1fr;
      // border: solid 1px red;
    }
    > div:nth-child(1) {
      //2020-04-10
      grid-area: aa1;
      // align-self: end;
      font-size: 25px;
      @media (max-width: 768px) {
        font-size: 20px;
      }
    }
    > div:nth-child(2) {
      //親子輕旅行 台北白石湖採草莓
      white-space: nowrap;
      font-size: 30px;
      grid-area: aa2;
      border-bottom: #6baf9b solid 2px;
      align-self: center;
      padding-bottom: 4%;
      line-height: 1.5;
      // margin-bottom: 2%;
      @media (max-width: 1300px) {
        margin-bottom: 2%;
        padding-bottom: 2%;
      }
      @media (max-width: 768px) {
        white-space: pre-wrap;
      }
      > span {
        align-self: start;
        background-color: #ffd3c1;
      }
    }
    > div:nth-child(3) {
      //頭像
      grid-area: aa3;
      justify-self: center;
      align-self: start;
      padding-top: 15%;
      width: 50px;
      height: 50px;
      > img {
        border-radius: 50%;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      @media (max-width: 576px) {
        align-self: center;
      }
    }
    > div:nth-child(4) {
      //暱稱
      font-size: 16px;
      align-self: center;
      padding-top: 0px;
      margin-left: 10px;
      grid-area: aa4;
      @media (max-width: 576px) {
        align-self: end;
      }
    }
    > div:nth-child(5) {
      //星星
      align-self: start;
      margin-left: 10px;
      position: relative;
      bottom: 10px;
      grid-area: aa5;
      > img {
        width: 15px;
      }
      @media (max-width: 576px) {
        align-self: center;
      }
      @media (max-width: 350px) {
        position: relative;
        bottom: 20px;
      }
    }
    > div:nth-child(6) {
      //追蹤
      font-size: 16px;
      align-self: start;
      padding-top: 20px;
      grid-area: aa6;

      @media (max-width: 576px) {
        // padding-top: 20%;
        padding-top: 0px;
        padding-bottom: 0px;
        text-align: end;
        margin-right: 0px;
        align-self: end;
        position: relative;
      }
      > span {
        background-color: #007552;
        color: #fff;
        padding: 1px 15px;
        border-radius: 20px;
      }
    }
    > div:nth-child(7) {
      //tags
      font-size: 16px;
      align-self: start;
      justify-self: end;
      color: #808080;
      padding-top: 20px;
      grid-area: aa7;
      position: relative;
      // border: solid red 2px;
      right: 3%;
      @media (max-width: 576px) {
        font-size: 16px;
        padding-top: 0px;
        grid-area: aa8;
      }
    }
    > div:nth-child(8) {
      //讚讚
      font-size: 20px;
      grid-area: aa8;
      padding-left: 20px;
      align-self: start;
      > span:nth-child(2) {
        color: #62bc5a;
        position: relative;
        top: 5px;
        left: 10px;
      }
    }
    > div:nth-child(9) {
      //文章
      font-size: 16px;
      grid-area: aa9;
      column-count: 2;
      // column-gap: ;
      letter-spacing: 1.5px;
      line-height: 1.5;
      column-gap: 6rem;
      padding-top: 30px;
      @media (max-width: 1500px) {
        column-count: 1;
      }
    }
  }
  > div:nth-child(2) {
    position: relative;
    padding-left: 20%;
    display: flex;
    flex-direction: column;
    // justify-content: flex-end;
    // flex-wrap: wrap;
    align-content: flex-end;
    // align-items: flex-end;
    // text-align: center;
    @media (max-width: 1600px) {
      padding-left: 0%;
      padding-top: 5%;
      padding-right: 10%;
    }
    @media (max-width: 1300px) {
      padding-left: 0%;
      padding-top: 5%;
      padding-right: 0%;
    }
    > div:nth-child(1) {
      position: relative;
      //妹妹
      > div#girlCollectionFruit {
        //妹妹採水果/星星

        position: relative;
        // left: 10%;
        z-index: 2;
        width: 70%;
        padding-top: 70%;
        // background: url('../assets/blog-img/post/blog_aabbcc.svg');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        -webkit-mask: url("../assets/blog-img/post/blog_aabbcc.svg") no-repeat
          center center;
        mask: url("../assets/blog-img/post/blog_aabbcc.svg") no-repeat center
          center;
        @media (max-width: 1600px) {
          width: 100%;
          padding-top: 100%;
          margin-bottom: 5%;
        }
        @media (max-width: 1300px) {
          width: 50%;
          padding-top: 50%;
          margin-left: 25%;
          margin-bottom: 5%;
        }
      }
      > img:nth-child(2) {
        width: 50%;
        z-index: 1;
        position: absolute;
        top: 6%;
        left: 35%;
        @media (max-width: 1600px) {
          display: none;
        }
      }
    }
    > .blog-post2-msg-card-box {
      // display: flex;
      background-color: #fff;
      width: 52rem;
      align-content: center;
      align-items: center;
      margin-bottom: 10px;
      @media (max-width: 1600px) {
        width: 100%;
      }
      height: 160px;
      overflow-y: scroll;
      /*控制整个滚动条*/
      // @media (max-width: 9999px) {
      //   margin-right: 35%;
      // }
      // @media (max-width: 1600px) {
      //   padding-right: 0px;
      // }
      &::-webkit-scrollbar {
        background-color: rgba(211, 211, 211, 0.411);
        width: 6px;
        height: 10px;
        border-radius: 5px;
        background-clip: padding-box;
      }

      /*滚动条两端方向按钮*/
      &::-webkit-scrollbar-button {
        background-color: none;
      }

      /*滚动条中间滑动部分*/
      &::-webkit-scrollbar-thumb {
        background-color: #007552;
        border-radius: 5px;
      }

      /*滚动条右下角区域*/
      &::-webkit-scrollbar-corner {
        background-color: none;
      }

      > .blog-post2-msg-card {
        display: flex;
        background-color: #fff;
        width: 50rem;
        align-content: center;
        align-items: center;
        margin-bottom: 10px;
        @media (max-width: 1600px) {
          width: 100%;
        }
        > div:nth-child(1) {
          width: 50px;
          height: 50px;
          > img {
            border-radius: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
          }
        }
        > div:nth-child(2) {
          //acc、date
          margin-left: 10px;
          // > p:nth-child(1) {
          //   //acc
          // }
          > p:nth-child(2) {
            //date
            color: #a0a0a0;
          }
        }
        > div:nth-child(3) {
          max-width: 30rem;
          margin-left: 20px;
          font-size: 16px;
          flex-grow: 1;
          position: relative;
          overflow: hidden;
          white-space: nowrap;
          text-overflow: ellipsis; /* 出現省略符號 */
          @media (max-width: 1300px) {
            max-width: 80%;

            margin-left: 40px;
          }
          @media (max-width: 840px) {
            // max-width: 50%;
          }
          @media (max-width: 768px) {
            margin-left: 20px;
          }
          @media (max-width: 576px) {
            margin-left: 10px;
          }
          &::before {
            content: "";
            position: absolute;
            height: 25px;
            border-right: #a0a0a0 solid 1px;
            top: -20%;
            left: -3%;
          }
        }
        > div:nth-child(4) {
          margin-right: 5px;
          margin-left: 5px;
        }
      }
    }
    > div:nth-child(3) {
      position: relative;
      @media (max-width: 850px) {
        width: 100%;
      }
      //留言表單
      &::before {
        content: "";
        border-top: solid #a0a0a0 1px;
        width: 50rem;
        position: absolute;
        top: -15%;
        left: 0%;
        @media (max-width: 1600px) {
          top: -10%;
          width: 100%;
        }
      }
      margin-top: 5%;
      > form:nth-child(1) {
        // background-color: #000;
        > label:nth-child(1) {
          font-size: 16px;
          > textarea:nth-child(1) {
            width: 50%;
            height: 100px;
            resize: none;
            @media (max-width: 1600px) {
              width: 85%;
            }
          }
        }
        .blogPost2ButtonMore {
          width: 14%;
          margin-top: 3%;
          margin-left: 25%;
          @media (max-width: 1600px) {
            margin-left: 45%;
          }
          > .blogPost2ButtonMore1 {
            width: 100%;
            // height: 30px;
          }
        }
      }
    }
    > div:nth-child(4) {
      position: absolute;
      bottom: 0%;
      right: -6%;
      @media (max-width: 1600px) {
        display: none;
      }
      > img:nth-child(1) {
        position: relative;
        bottom: 0%;
        right: 100%;
        z-index: 5;
        animation-name: catching;
        animation-duration: 3s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        @keyframes catching {
          0% {
            right: 100%;
          }
          33% {
            right: 150%;
          }
          66% {
            right: 50%;
          }
          100% {
            right: 100%;
          }
        }
      }
      > img:nth-child(2) {
        z-index: 1;
        display: inline-block;
        position: absolute;
        bottom: 200%;
        right: 130%;
        animation-name: falling;
        animation-duration: 3s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        @keyframes falling {
          0% {
            bottom: 200%;
            opacity: 1;
          }
          50% {
            bottom: 85%;
            right: 150%;
            transform: rotate(180deg);
            display: none;
            opacity: 1;
          }
          51% {
            opacity: 0;
          }
          100% {
            opacity: 0;
          }
        }
      }
      > img:nth-child(3) {
        z-index: 1;
        // background-color: #000;
        display: inline-block;
        position: absolute;
        bottom: 200%;
        right: 200%;
        animation-name: falling2;
        animation-duration: 3s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        @keyframes falling2 {
          0% {
            opacity: 0;
          }
          49% {
            opacity: 0;
          }
          50% {
            bottom: 200%;
            opacity: 1;
          }
          100% {
            bottom: 85%;
            right: 130%;
            transform: rotate(250deg);
            display: none;
            opacity: 1;
          }
        }
      }
      > img:nth-child(4) {
        z-index: 1;
        display: inline-block;
        position: absolute;
        bottom: 200%;
        right: 50%;
        animation-name: falling3;
        animation-duration: 3s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        @keyframes falling3 {
          0% {
            opacity: 0;
          }
          28% {
            opacity: 0;
          }
          29% {
            opacity: 1;
          }
          30% {
            bottom: 200%;
            opacity: 1;
          }
          80% {
            bottom: 85%;
            right: 100%;
            transform: rotate(330deg);
            display: none;
            opacity: 1;
          }
          81% {
            opacity: 0;
          }
          100% {
            opacity: 0;
          }
        }
      }
    }
  }
}
.blog-post-tri {
  //select
  background: url("../assets/blog-img/post/triangle.png");
  background-repeat: no-repeat;
  background-position: 95% 60%;
  font-size: 15px;
  padding-left: 30px;
  padding-right: 50px;
  margin-top: 10px;
  border: solid #007552 2px;
  background-color: #fbf8ef;
  appearance: none;
}

.blog-landing-container {
  padding-top: 1%;
  width: 95%;
  margin-left: 2.5%;
  // background-color: #000;
  > div:nth-child(1) {
    // background-color: #000;
    width: 95%;
    margin-left: 2.5%;
    display: grid;
    margin-bottom: 10px;
    grid-template-columns: 75% 25%;
    @media (max-width: 1300px) {
      grid-template-columns: 2fr 1fr;
    }
    @media (max-width: 992px) {
      grid-template-columns: repeat(1, 1fr);
      margin-bottom: 30px;
    }
    > div:nth-child(1) {
      > img:nth-child(1) {
        width: 40%;
        @media (max-width: 1300px) {
          width: 70%;
        }
        @media (max-width: 992px) {
          width: 80%;
        }
        @media (max-width: 768px) {
          width: 90%;
        }
      }
    }

    font-size: 20px;
    > div:nth-child(2) {
      gap: 10px;
      display: grid;
      position: relative;
      top: 30%;
      height: 60%;
      grid-template-columns: 1fr;
      > div:nth-child(1) {
        display: flex;
        text-align: center;
        justify-content: space-around;
        border-bottom: solid #6baf9b 2px;
      }
      > div:nth-child(2) {
        border-bottom: solid #6baf9b 2px;
        text-align: center;
      }
    }
  }
}

.blog-post-container2 {
  // border: solid #007552 3px;
  // width: 90%;
  // background-color: #000;
  // margin-left: 3%;
  display: grid;
  grid-template-columns: 1fr 0.3fr;
  // gap: 20px;
  padding-bottom: 2%;
  margin-top: 3%;
  position: relative;
  @media (max-width: 1300px) {
    grid-template-columns: 1fr;
  }
  > div:nth-child(1) {
    //main
    > div:nth-child(1) {
      // border: solid red 10px;
      display: grid;
      grid-template-columns: 0.3fr 1fr;
      > div:nth-child(1) {
        // background-color: #000;
        //籃子圖
        margin-right: 20px;
        > img {
          width: 100%;
          // position: relative;
          // right: 20px;
        }
      }
      > div:nth-child(2) {
        //input//search
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        align-items: end;
        > div:nth-child(1) {
          // border: solid red 10px;
          //search input
          > form:nth-child(1) {
            position: relative;
            > input:nth-child(1) {
              padding: 5px 0px 5px 30px;
              border: #007552 solid 2px;
              border-radius: 50px;
              width: 80%;
              font-size: 20px;
              position: relative;
            }
            > img:nth-child(2) {
              // border: #000 3px solid;
              cursor: pointer;
              position: absolute;
              right: 20%;
              bottom: 5px;
            }
          }
        }
        > div:nth-child(2) {
          //keyword
          padding-left: 20px;
          align-self: center;
          > span {
            padding-right: 10px;
            color: #808080;
            font-size: 16px;
          }
        }
      }
    }
    > img:nth-child(2) {
      //bendingbar2
      padding: 20px 0px 20px 20px;
      width: 100%;
      position: relative;
      right: 7%;
    }
    > p:nth-child(3) {
      font-size: 20px;
    }
  }
  > div:nth-child(2) {
    // background-color: #000;
    //tags&leaderboard
    position: sticky;
    // position: relative;
    // position: absolute;
    // position: fixed;
    right: 0%;
    top: 0%;
    // border: steelblue 5px solid;
    display: grid;
    justify-self: end;
    // display: none;
    // border: chocolate 3px solid;
    grid-template-rows: 6fr 1fr 1fr 1fr;
    height: 30%;
    @media (max-width: 1300px) {
      display: none;
    }
    > div:nth-child(1) {
      // border: chocolate 3px solid;
      text-align: right;
      display: flex;
      flex-direction: column;
      left: 2px;
      top: 1%;
      width: 380px;
      @media (max-width: 1650px) {
        width: 320px;
      }
      // > img:nth-child(1) {
      // }
      > img:nth-child(2),
      img:nth-child(3),
      img:nth-child(4),
      img:nth-child(5) {
        position: relative;
        transition: 0.5s;
        &:hover {
          right: 20px;
          width: 400px;
        }
        @media (max-width: 1650px) {
          &:hover {
            right: 20px;
            width: 340px;
          }
        }
      }
    }
    > div:nth-child(2),
    > div:nth-child(3),
    > div:nth-child(4) {
      @media (max-width: 1650px) {
        width: 320px;
      }
      width: 380px;
      background-color: #fcded4;
      padding-top: 10px;
      padding-bottom: 15px;
      display: grid;
      grid-template-columns: 1fr 0.5fr 1fr 1fr;
      grid-template-rows: 0.5fr 1.2fr 0.4fr 0.4fr;
      align-items: start;
      border-bottom: #a0a0a0 solid 1px;
      // border: chocolate 3px solid;
      grid-template-areas:
        "aa1 aa2 aa2 aa2"
        "aa1 aa3 aa3 aa3"
        "aa1 aa4 aa5 aa7"
        "aa1 aa4 aa6 aa7";
      > div:nth-child(1) {
        grid-area: aa1;
        font-size: 80px;
        text-align: center;
        align-self: center;
      }
      > div:nth-child(2) {
        grid-area: aa2;
        color: #a0a0a0;
        padding-left: 10px;
      }
      > div:nth-child(3) {
        grid-area: aa3;
        font-size: 20px;
        padding: 0px 10px;
      }
      > div:nth-child(4) {
        grid-area: aa4;
      }
      > div:nth-child(5) {
        font-size: 15px;
        grid-area: aa5;
      }
      > div:nth-child(6) {
        grid-area: aa6;
      }
      > div:nth-child(7) {
        grid-area: aa7;
        > img:nth-child(1) {
          padding-top: 5px;
          padding-right: 5px;
        }
        > span:nth-child(2) {
          color: #62bc5a;
          position: relative;
          top: 5px;
        }
      }
    }
  }
}
.blog-post2-card-area {
  padding-right: 10%;
  margin-top: 20px;
  @media (max-width: 1300px) {
    padding-right: 0%;
  }
  .blog-post2-long-card-outer {
    text-decoration: none;
    > .blog-post2-long-card {
      text-decoration: none;
      display: flex;
      border: #007552 solid 2px;
      @media (max-width: 700px) {
        padding-bottom: 2%;
        flex-direction: column;
      }
      > div:nth-child(1) {
        border-right: solid #007552 1.5px;
        position: relative;
        //妹妹假蠵龜
        // width: 40%;
        max-width: 30%;
        min-width: 30%;
        // max-height: 50%;
        @media (max-width: 700px) {
          max-width: 100%;
          min-width: 100%;
        }
        > img {
          width: 100%;
          height: 100%;
          object-fit: cover;

          // @media (max-width: 700px) {
          //   width: 100%;
          // }
        }
        // width: 500%;
        // padding-top: 310px;
        // background-image: url("../assets/blog-img/post/kidEatsWatermelon.png");
        // background-repeat: no-repeat;
        // background-size: cover;
        // background-position: 0% 50%;
        // @media (max-width: 1800px) {
        //   width: 550%;
        // }
        // @media (max-width: 1700px) {
        //   width: 600%;
        // }
        // @media (max-width: 1500px) {
        //   width: 750%;
        // }
        // @media (max-width: 1400px) {
        //   width: 1000%;
        // }
        // @media (max-width: 768px) {
        //   width: 1200%;
        // }
        // @media (max-width: 700px) {
        //   width: 100%;
        // }
      }
      > div:nth-child(2) {
        padding: 3% 3% 0% 3%;
        // background-color: #000;
        //右邊
        > div:nth-child(1) {
          //右上
          > p:nth-child(1) {
            color: #808080;
            font-size: 14px;
          }
          > p:nth-child(2) {
            margin-top: 5px;
            font-size: 20px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            overflow: hidden;
            color: #000;
            // background-color:#000;
          }
          > p:nth-child(3) {
            margin-top: 25px;
            // > img:nth-child(1) {
            // }
            > span:nth-child(2) {
              color: #62bc5a;
              padding-right: 100px;
              font-size: 14px;
              position: relative;
              top: 5px;
              margin-left: 10px;
            }
            // > img:nth-child(3) {
            // }
            > span:nth-child(4) {
              font-size: 14px;
              color: #a0a0a0;
              margin-left: 5px;
            }
            > img:nth-child(5) {
              margin-left: 20px;
            }
            > span:nth-child(6) {
              margin-left: 5px;
              font-size: 14px;
              color: #a0a0a0;
            }
          }
          > p:nth-child(4) {
            color: #000;
            font-size: 16px;
            line-height: 1.5;
            letter-spacing: 1px;
            margin-top: 20px;
            padding-right: 50px;
            width: 100%;
            display: -webkit-box; /* -webkit-box 尚在實驗性的屬性值 */
            -webkit-box-orient: vertical; /* 用來設定一個元素是水平還是垂直方向排列其內容 */
            -webkit-line-clamp: 3; /* 限制指定的行數 */
            overflow: hidden;
            @media (max-width: 500px) {
              padding-right: 0px;
            }
          }
        }
        > div:nth-child(2) {
          //右下澎澎姨
          display: flex;
          margin-top: 70px;
          position: relative;
          // top: 5%;
          padding-bottom: 2%;
          &::before {
            content: "";
            border-top: solid #007552 1.5px;
            width: 100%;
            top: -15px;
            position: absolute;
          }
          > div:nth-child(1) {
            width: 50px;
            height: 50px;
            > img {
              width: 100%;
              height: 100%;
              object-fit: cover;
              border-radius: 50%;
            }
          }
          > div:nth-child(2) {
            > div:nth-child(1) {
              padding-left: 10px;
              font-size: 16px;
              color: #000;
              padding-top: 10px;
            }
            > div:nth-child(2) {
              padding-top: 5px;
              padding-left: 10px;
            }
          }
          > div:nth-child(3) {
            padding-top: 10px;
            padding-left: 40px;
            > span:nth-child(1) {
              font-size: 14px;
              color: #fbf8ef;
              background-color: #007552;
              padding: 3px 15px;
              border-radius: 15px;
            }
          }
        }
      }
    }
  }
  .blog-post2-small-card-container {
    display: flex;
    flex-wrap: wrap;
    column-gap: 20px;
    justify-content: space-between;
    > a:nth-child(9) {
      @media (max-width: 9999px) {
        display: none;
      }
      @media (max-width: 1896px) {
        display: inline-block;
      }
      @media (max-width: 1400px) {
        display: none;
      }
      @media (max-width: 1300px) {
        display: inline-block;
      }
      @media (max-width: 900px) {
        display: none;
      }
    }
    > .blog-post2-small-card {
      float: left;
      display: inline-block;
      text-decoration: none;
      color: #000;
      margin-top: 15px;
      width: 270px;
      border: solid #007552 2px;
      @media (max-width: 1879px) {
        width: 32%;
      }
      @media (max-width: 1400px) {
        width: 48%;
      }
      @media (max-width: 1300px) {
        width: 32%;
      }
      @media (max-width: 900px) {
        width: 48%;
      }
      @media (max-width: 576px) {
        width: 100%;
      }
      > div:nth-child(1) {
        &.ml {
          margin-left: 10px;
        }
        // &.nine {
        // }

        > div:nth-child(1) {
          //葡萄圖片
          border-bottom: solid #007552 2px;
          position: relative;
          width: 100%;
          height: 270px;
          overflow: hidden;

          > img:nth-child(1) {
            width: 100%;
            min-height: 100%;
            object-fit: cover;
          }
          > div:nth-child(2) {
            position: absolute;
            right: 10px;
            bottom: 10px;
            display: flex;
            > div:nth-child(1) {
              margin-right: 0px;
              margin-top: 5px;
              > img:nth-child(1) {
                width: 80%;
              }
            }
            > div:nth-child(2) {
              background-color: #f7c845;
              border-radius: 50%;
              width: 40px;
              height: 40px;
              position: relative;
              > span:nth-child(1) {
                color: #62bc5a;
                font-size: 16px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
              }
            }
          }
        }
        > div:nth-child(2) {
          //日期、標題、標籤、內文
          border-bottom: #a0a0a0 solid 2px;
          padding-left: 10px;
          padding-right: 20px;
          > p:nth-child(1) {
            //日期
            margin-top: 5px;
            color: #808080;
          }
          > p:nth-child(2) {
            //標題
            margin-top: 5px;
            font-size: 20px;
            // line-height: 1.5;
          }
          > div:nth-child(3) {
            //標籤
            margin-top: 10px;
            color: #a0a0a0;
            font-size: 14px;
          }
          > p:nth-child(4) {
            //內文
            margin-top: 10px;
            padding-bottom: 10px;
            line-height: 1.5;
            letter-spacing: 1px;
            font-size: 16px;
            // background-color:#000;
            overflow: hidden;
            height: 90px;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 5;
          }
        }
        > div:nth-child(3) {
          // background-color: #000;
          display: flex;
          margin-top: 10px;
          padding-left: 10px;
          padding-bottom: 10px;
          //草莓姨
          > div:nth-child(1) {
            //草莓姨照片
            width: 50px;
            height: 50px;
            > img {
              border-radius: 50%;
              width: 100%;
              height: 100%;
              object-fit: cover;
            }
          }
          > div:nth-child(2) {
            //暱稱、星星
            padding-top: 7px;
            margin-left: 10px;
            > span:nth-child(1) {
              //暱稱
              font-size: 16px;
            }
            > div:nth-child(2) {
              //星星
              margin-top: 3px;
            }
          }
          > div:nth-child(3) {
            //追蹤
            padding-top: 10px;
            padding-left: 30px;
            > span:nth-child(1) {
              color: #fbf8ef;
              background-color: #007552;
              font-size: 14px;
              padding: 2px 10px;
              border-radius: 20px;
            }
          }
        }
      }
    }
  }
}

.page {
  display: flex;
  justify-content: center;
  align-content: center;
  align-items: center;
  padding-top: 20px;
  > li {
    font-size: 15px;
    padding: 10px;
    @media (max-width: 500px) {
      padding: 5px;
    }
  }
  > .pageArrow {
    > img:nth-child(1) {
      width: 95%;
      @media (max-width: 500px) {
        width: 20px;
      }
    }
  }
  > li:nth-child(2) {
    cursor: pointer;
    border: solid #007552 2px;
  }
  > .pageBorder {
    // border: solid #007552 2px;
    border-top: solid #007552 2px;
    border-right: solid #007552 2px;
    border-bottom: solid #007552 2px;
    cursor: pointer;
  }
  > li:nth-child(12) {
    border: none;
    > img:nth-child(1) {
      width: 95%;
      @media (max-width: 500px) {
        width: 20px;
      }
    }
  }
  // li:nth-child(2) {
  //   background-color: #ffd3c1;
  //   color: #007552;
  // }
  > .currentPagecolor {
    background-color: #ffd3c1;
    color: #007552;
  }
  > li:nth-child(1) {
    text-align: right;
  }
}
</style>

<script>
import $ from "jquery";
export default {
  data() {
    return {
      member: {
        no: [1, 2, 3],
      },
      blogArr: null,
      blogArrFilter: [],
      blogArrFilterTop: [],
      pageArr: [],
      currentPage: [],
      topMsg: null,
      topMsgText: "",
      sendMsgArr: [],
    };
  },
  beforeMount() {},
  mounted() {
    // console.log(document.getElementsByClassName("pageBorder")[0]);
    // document
    //   .getElementsByClassName("pageBorder")[0]
    //   .classList.add("currentPagecolor");
  },
  updated() {
    for (
      let i = 0;
      i < document.getElementsByClassName("pageBorder").length;
      i++
    ) {
      document
        .getElementsByClassName("pageBorder")
        [i].setAttribute("class", "pageBorder");
      if (
        document.getElementsByClassName("pageBorder")[i].textContent ==
        this.currentPage[0]
      ) {
        document
          .getElementsByClassName("pageBorder")
          [i].classList.add("currentPagecolor");
      }
    }

    document
      .getElementById("girlCollectionFruit")
      .setAttribute(
        "style",
        `background: url('${this.blogArrFilterTop[0].img[0]}');`
      );
  },
  created() {
    let api = this.path + "api_blog.php";

    this.$http.post(api, JSON.stringify(this.member)).then((res) => {
      if (res.data != "") {
        // console.log(res.data);
        this.blogArr = res.data;

        for (let i = 0; i < this.blogArr.length; i++) {
          this.blogArr[i].img = this.blogArr[i].img.split(",");
        }

        // for (let i = 0; i < this.blogArr.length; i++) {
        //   for (let j = 0; j < this.blogArr[i].img.length; j++) {
        //     this.blogArr[i].img[j] = `/api/${this.blogArr[i].img[j]}`;
        //   }
        // }
        this.blogArr.forEach((arr, i) => {
          arr.img.forEach((item, index) => {
            this.blogArr[i].img[index] = this.img + item;
          });
        });

        for (let i in this.blogArr) {
          let api2 = this.path + "api_get_all_blog_claps.php";
          this.$http.post(api2, this.blogArr[i].no).then((res) => {
            if (res.data != "") {
              this.blogArr[i].clapCount = res.data[0].count;
              // console.log(this.blogArr[i].clapCount);
            }
          });
        }

        this.blogArrFilterTop.push(this.blogArr[0]);

        if (this.blogArr.length <= 9) {
          for (let i = 1; i < this.blogArr.length; i++) {
            this.blogArrFilter.push(this.blogArr[i]);
          }
        } else {
          for (let i = 1; i < 10; i++) {
            this.blogArrFilter.push(this.blogArr[i]);
          }
        }

        this.currentPage.push(1);

        if (this.blogArr.length <= 9) {
          this.pageArr.push(1);
        } else if (this.blogArr.length / 9 < 9) {
          for (let i = 1; i <= parseInt(this.blogArr.length / 9) + 1; i++) {
            this.pageArr.push(i);
          }
        } else {
          for (let i = 1; i < 10; i++) {
            this.pageArr.push(i);
          }
        }
        let api3 = this.path + "api_get_msg_blogtop.php";

        this.$http
          .post(api3, JSON.stringify(this.blogArrFilterTop[0].no))
          .then((res) => {
            if (res.data != "") {
              this.topMsg = res.data;
            } else {
            }
          });
      } else {
        // console.log(res.error);
      }
    });
  },
  beforeDestroy() {},
  computed: {},

  methods: {
    pageSelect(e) {
      let pageNum = parseInt(e.target.textContent);
      this.blogArrFilter = [];
      this.blogArrFilterTop = [];
      this.currentPage = [];

      if (this.blogArr.length / 9 > 9) {
        if (pageNum > 5 && pageNum < parseInt(this.blogArr.length / 9) - 5) {
          this.pageArr = [];
          for (let i = pageNum - 4; i < pageNum + 5; i++) {
            this.pageArr.push(i);
          }
        } else if (pageNum >= parseInt(this.blogArr.length / 9) - 5) {
          this.pageArr = [];
          for (
            let i = parseInt(this.blogArr.length / 9) - 8;
            i <= parseInt(this.blogArr.length / 9);
            i++
          ) {
            this.pageArr.push(i);
          }
        } else {
          this.pageArr = [];
          for (let i = 1; i < 10; i++) {
            this.pageArr.push(i);
          }
        }
      }

      this.currentPage.push(pageNum);

      // alert(this.currentPage[0]);
      // alert(parseInt(this.blogArr.length / 9) + 1);

      let currentPage1 = this.currentPage[0];
      this.blogArrFilterTop.push(this.blogArr[(currentPage1 - 1) * 9]);

      if (this.currentPage[0] == parseInt(this.blogArr.length / 9) + 1) {
        for (
          let i = (this.currentPage[0] - 1) * 9 + 1;
          i < this.blogArr.length;
          i++
        ) {
          this.blogArrFilter.push(this.blogArr[i]);
        }
      } else {
        for (
          let i = (currentPage1 - 1) * 9 + 1;
          i < currentPage1 * 9 + 1;
          i++
        ) {
          this.blogArrFilter.push(this.blogArr[i]);
        }
      }

      let api3 = this.path + "api_get_msg_blogtop.php";

      this.$http
        .post(api3, JSON.stringify(this.blogArrFilterTop[0].no))
        .then((res) => {
          if (res.data != "") {
            this.topMsg = res.data;
          } else {
          }
        });
      // for (
      //   let i = 1;
      //   i < document.getElementsByClassName('pageBorder').length;
      //   i++
      // ) {
      //   e.target.parentNode.children[i].setAttribute('class', 'pageBorder');
      // }
    },

    PreviousPage() {
      let currentPage1 = this.currentPage[0];
      // this.currentPage = [];
      this.blogArrFilterTop = [];
      this.blogArrFilter = [];
      if (this.currentPage > 1) {
        this.currentPage = [];
        this.currentPage.push(currentPage1 - 1);
      }
      // this.currentPage.push(currentPage1 - 1);
      let updatePage = this.currentPage[0];

      this.blogArrFilterTop.push(this.blogArr[(updatePage - 1) * 9]);

      for (let i = (updatePage - 1) * 9 + 1; i < updatePage * 9 + 1; i++) {
        this.blogArrFilter.push(this.blogArr[i]);
      }
      if (this.pageArr[0] > 1) {
        this.pageArr.forEach((item, index, array) => {
          this.pageArr[index] = this.pageArr[index] - 1;
        });
      }
      let api3 = this.path + "api_get_msg_blogtop.php";

      this.$http
        .post(api3, JSON.stringify(this.blogArrFilterTop[0].no))
        .then((res) => {
          if (res.data != "") {
            this.topMsg = res.data;
          } else {
          }
        });
    },
    nextPage() {
      let currentPage1 = this.currentPage[0];
      // this.currentPage = [];
      this.blogArrFilterTop = [];
      this.blogArrFilter = [];
      if (this.currentPage < parseInt(this.blogArr.length / 9) + 1) {
        this.currentPage = [];
        this.currentPage.push(currentPage1 + 1);
      }
      let updatePage = this.currentPage[0];

      this.blogArrFilterTop.push(this.blogArr[(updatePage - 1) * 9]);

      if (updatePage == parseInt(this.blogArr.length / 9) + 1) {
        for (let i = (updatePage - 1) * 9 + 1; i < this.blogArr.length; i++) {
          this.blogArrFilter.push(this.blogArr[i]);
        }
      } else {
        for (let i = (updatePage - 1) * 9 + 1; i < updatePage * 9 + 1; i++) {
          this.blogArrFilter.push(this.blogArr[i]);
        }
      }

      if (this.pageArr[8] < parseInt(this.blogArr.length / 9)) {
        this.pageArr.forEach((item, index, array) => {
          this.pageArr[index] = this.pageArr[index] + 1;
        });
      }
      let api3 = this.path + "api_get_msg_blogtop.php";

      this.$http
        .post(api3, JSON.stringify(this.blogArrFilterTop[0].no))
        .then((res) => {
          if (res.data != "") {
            this.topMsg = res.data;
          } else {
          }
        });
    },
    changePage(e) {
      // (blog)a. 往父層傳遞一個 event(blogInf) 的值(this.blogArr)
      // console.log(i);
      // this.$emit('blogInf', {
      //   aa: this.blogArr,
      //   bb: e.target.parentNode.parentNode.children[3].textContent,
      // });
      // console.log(e);
      // console.log('123');
      this.$emit("blogInf", e);
      // console.log(e);

      let api = this.path + "api_session_blog_no.php";

      this.$http.post(api, JSON.stringify(e)).then((res) => {
        if (res.data != "") {
          // console.log(res.data);
        } else {
          // console.log(res.error);
        }
      });
    },
    getThisCard(e) {
      // console.log(e.target.parentNode.parentNode.children[3].textContent);
    },
    comment() {
      let api = this.path + "api_send_blog_msg_top.php";
      var nStartTime = new Date(Date.now());
      let today = `${nStartTime.getFullYear()}-${nStartTime.getMonth() +
        1}-${nStartTime.getDate()}`;
      this.sendMsgArr = [];
      this.sendMsgArr.push(this.topMsgText);
      this.sendMsgArr.push(this.blogArrFilterTop[0].no);
      this.sendMsgArr.push(today);
      this.$http.post(api, JSON.stringify(this.sendMsgArr)).then((res) => {
        if (res.data != "") {
          // console.log(res.data);
        } else {
          // console.log(res.error);
        }
      });
      this.topMsgText = "";
      let api3 = this.path + "api_get_msg_blogtop.php";

      this.$http
        .post(api3, JSON.stringify(this.blogArrFilterTop[0].no))
        .then((res) => {
          if (res.data != "") {
            this.topMsg = res.data;
          } else {
          }
        });
    },
    searchKeywordMethod() {
      let api = this.path + "api_search_blog_keyword.php";
      let aa = document.getElementById("searchKeyword").value.trim();
      // console.log(document.getElementById("searchKeyword").value.trim())
      this.$http.post(api, JSON.stringify(aa)).then((res) => {
        if (res.data != "") {
          // console.log(res.data);
          this.blogArr = null;
          this.blogArrFilter = [];
          this.blogArrFilterTop = [];
          this.pageArr = [];
          this.currentPage = [];
          this.topMsg = null;
          this.topMsgText = "";
          this.sendMsgArr = [];

          this.blogArr = res.data;

          for (let i = 0; i < this.blogArr.length; i++) {
            this.blogArr[i].img = this.blogArr[i].img.split(",");
          }

          // for (let i = 0; i < this.blogArr.length; i++) {
          //   for (let j = 0; j < this.blogArr[i].img.length; j++) {
          //     this.blogArr[i].img[j] = `/api/${this.blogArr[i].img[j]}`;
          //   }
          // }
          this.blogArr.forEach((arr, i) => {
            arr.img.forEach((item, index) => {
              this.blogArr[i].img[index] = this.img + item;
            });
          });

          for (let i in this.blogArr) {
            let api2 = this.path + "api_get_all_blog_claps.php";
            this.$http.post(api2, this.blogArr[i].no).then((res) => {
              if (res.data != "") {
                this.blogArr[i].clapCount = res.data[0].count;
                // console.log(this.blogArr[i].clapCount);
              }
            });
          }

          this.blogArrFilterTop.push(this.blogArr[0]);

          if (this.blogArr.length <= 9) {
            for (let i = 1; i < this.blogArr.length; i++) {
              this.blogArrFilter.push(this.blogArr[i]);
            }
          } else {
            for (let i = 1; i < 10; i++) {
              this.blogArrFilter.push(this.blogArr[i]);
            }
          }

          this.currentPage.push(1);

          if (this.blogArr.length <= 9) {
            this.pageArr.push(1);
          } else if (this.blogArr.length / 9 < 9) {
            for (let i = 1; i <= parseInt(this.blogArr.length / 9) + 1; i++) {
              this.pageArr.push(i);
            }
          } else {
            for (let i = 1; i < 10; i++) {
              this.pageArr.push(i);
            }
          }
          let api3 = this.path + "api_get_msg_blogtop.php";

          this.$http
            .post(api3, JSON.stringify(this.blogArrFilterTop[0].no))
            .then((res) => {
              if (res.data != "") {
                this.topMsg = res.data;
              } else {
              }
            });
        } else {
          // console.log(res.error);
        }
      });
    },
  },
};
</script>
