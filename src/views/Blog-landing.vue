<template>
  <div class="blog-landing-outer">
    <nav id="navbg"></nav>
    <img class="underNavImg" src="@/assets/blog-img/blog-bar.png" />
    <br />
    <div class="blog-landing-container-new">
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
    <div class="blog-landing-container2">
      <div>
        <div>
          <div>
            <img :src="previousValue[0].m_img" class="blog-landing-aunt" />
          </div>
          <div>
            <div>
              <span>{{ previousValue[0].nick }}</span>
            </div>
            <div>
              <img
                src="@/assets/Group 720.svg"
                v-if="
                  previousValue[0].review_total /
                    previousValue[0].review_count >
                    0
                "
              />
              <img
                src="@/assets/Group 720.svg"
                v-if="
                  previousValue[0].review_total /
                    previousValue[0].review_count >
                    1
                "
              />
              <img
                src="@/assets/Group 720.svg"
                v-if="
                  previousValue[0].review_total /
                    previousValue[0].review_count >
                    2
                "
              />
              <img
                src="@/assets/Group 720.svg"
                v-if="
                  previousValue[0].review_total /
                    previousValue[0].review_count >
                    3
                "
              />
              <img
                src="@/assets/Group 720.svg"
                v-if="
                  previousValue[0].review_total /
                    previousValue[0].review_count >
                    4
                "
              />
            </div>
          </div>
          <div>
            <span style="display:none;">+追蹤</span>
          </div>
          <div class="blog-landing-greenline"></div>
          <div class="blog-landing-greenline"></div>
          <div class="blog-landing-greenline"></div>
        </div>
        <div>
          <span>其他關聯文章</span>
          <span
            class="otherLink"
            @click="goToRelatedPage(i, $event)"
            v-for="(i, index) in otherLink"
            :key="index"
            >{{ i.title }}</span
          >
        </div>
      </div>

      <div>
        <div>
          <div>
            <div>{{ previousValue[0].date }}</div>
            <div>
              <img src="@/assets/blog-img/blog-tag.png" />
              <span>草莓</span>
              <img src="@/assets/blog-img/blog-tag.png" />
              <span>旅遊日誌</span>
            </div>
          </div>
          <div></div>
          <div>
            <span>{{ previousValue[0].title }}</span>
          </div>
          <div>
            <img src="@/assets/blog-img/blog-bendingbar2.png" />
          </div>
          <div>
            <img :src="previousValue[0].img[0]" />
          </div>
        </div>
        <div>
          <div>
            <div v-html="previousValue[0].content"></div>
            <div v-html="previousValue[0].content2"></div>
          </div>
          <div>
            <div>
              <img src="../assets/blog-img/blog-trapezoid.png" />
              <div>
                <img
                  v-for="(i, index) in previousValue[0].img"
                  :key="index"
                  :src="i"
                />
                <!-- <img :src="this.previousValue[0].img[2]" />
                <img :src="this.previousValue[0].img[3]" />
                <img :src="this.previousValue[0].img[4]" />-->
                <!--<img src="@/assets/blog-img/blog-trapimg2.png" />-->
              </div>
            </div>
          </div>
        </div>
        <div>
          <div>
            <span>留言{{ blogMsg.length }}筆</span>
            <img
              @click="clap"
              v-if="imgStatus == true"
              src="../assets/blog-img/blog-thumb.png"
            />
            <img
              @click="clap"
              v-else
              src="../assets/blog-img/hollowThumb.png"
            />
            <span>{{ clapQuantity[0].count }}</span>
          </div>
        </div>
        <div>
          <div v-for="(i, index) in blogMsgFilter" :key="index">
            <div>
              <img :src="i.img" />
            </div>
            <div>
              <div>{{ i.nick }}</div>
              <div>{{ i.date }}</div>
            </div>
            <div v-html="i.content" style="font-size:16px;"></div>
            <div>
              <img
                @click="report(i)"
                src="@/assets/blog-img/blog-report.png"
                class="report"
              />
            </div>
          </div>
          <span @click="loadMoreMsg" id="loadMoreMsg">
            <span>載入更多留言...</span>
          </span>
          <!--<div>
            <div>
              <img src="@/assets/blog-img/blog-someoneshead.png" />
            </div>
            <div>
              <div>howhowhasnofriend</div>
              <div>2020-4-14 12:00</div>
            </div>
            <div style="font-size:15px;">這炒飯好吃?我賣水果欸!?鳳梨炒飯?</div>
            <div>
              <img src="@/assets/blog-img/blog-report.png" alt="" />
            </div>
          </div>
          <div>
            <div>
              <img src="@/assets/blog-img/blog-someoneshead.png" />
            </div>
            <div>
              <div>howhowhasnofriend</div>
              <div>2020-4-14 12:00</div>
            </div>
            <div style="font-size:15px;">這炒飯好吃?我賣水果欸!?鳳梨炒飯?</div>
            <div>
              <img src="@/assets/blog-img/blog-report.png" alt="" />
            </div>
          </div>
          <div>
            <div>
              <img src="@/assets/blog-img/blog-someoneshead.png" />
            </div>
            <div>
              <div>howhowhasnofriend</div>
              <div>2020-4-14 12:00</div>
            </div>
            <div style="font-size:15px;">這炒飯好吃?我賣水果欸!?鳳梨炒飯?</div>
            <div>
              <img src="@/assets/blog-img/blog-report.png" alt="" />
            </div>
          </div>
          <div>
            <div>
              <img src="@/assets/blog-img/blog-someoneshead.png" />
            </div>
            <div>
              <div @click.prevent="comment">howhowhasnofriend</div>
              <div>2020-4-14 12:00</div>
            </div>
            <div style="font-size:15px;">這炒飯好吃?我賣水果欸!?鳳梨炒飯?</div>
            <div>
              <img src="@/assets/blog-img/blog-report.png" alt="" />
            </div>
          </div>-->
        </div>
        <div>
          <form action method="get">
            <label for>
              留言:
              <textarea name id></textarea>
            </label>
            <br />
            <div class="blog-landing-button-more" @click.prevent="comment">
              <button-more
                class="blog-landing-button-more2"
                msg="送出"
              ></button-more>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="reportLightBox">
      <div>
        <span @click="closeLightBox">X</span>
        <div>
          <input
            type="radio"
            name
            id="r1"
            value="0"
            v-model="reportRadio"
          />&emsp;
          <label for="r1">仇恨言論</label>
          <br />
          <br />
          <input
            type="radio"
            name
            id="r2"
            value="1"
            v-model="reportRadio"
          />&emsp;
          <label for="r2">侵權</label>
          <br />
          <br />
          <input
            type="radio"
            name
            id="r3"
            value="2"
            v-model="reportRadio"
          />&emsp;
          <label for="r3">色情內容</label>
          <br />
          <br />
          <input
            type="radio"
            name
            id="r4"
            value="3"
            v-model="reportRadio"
          />&emsp;
          <label for="r4">與本網站無關</label>
          <br />
          <br />
          <input
            class="reportBtn"
            type="button"
            value="確定"
            @click="sendReport()"
          />
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss">
.blog-landing-outer {
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
  .underNavImg {
    width: 100%;
  }
  padding-top: 60px;
  background-color: #fbf8ef;
  box-sizing: border-box;
  > img:nth-child(1) {
    width: 100%;
    > div:nth-child(1) {
      > div:nth-child(1) {
        > img:nth-child(1) {
          padding: 10px;
        }
      }
    }
  }
}
.blog-landing-container-new {
  padding-top: 1%;
  width: 95%;
  margin-left: 2.5%;
  > div:nth-child(1) {
    // background-color: #000;
    width: 95%;
    margin-left: 2.5%;
    display: grid;
    grid-template-columns: 4fr 1fr;
    @media (max-width: 1500px) {
      grid-template-columns: 3fr 1fr;
    }
    @media (max-width: 1300px) {
      grid-template-columns: 2fr 1fr;
      padding-bottom: 1%;
    }
    @media (max-width: 992px) {
      grid-template-columns: repeat(1, 1fr);
      padding-bottom: 30px;
    }
    > div:nth-child(1) {
      > img:nth-child(1) {
        // border: olive 10px solid;
        width: 30%;
        // transform: scale(0.4);
        @media (max-width: 1300px) {
          width: 70%;
        }
        @media (max-width: 992px) {
          width: 60%;
          margin-bottom: 2%;
        }
        @media (max-width: 768px) {
          width: 90%;
        }
      }
    }

    font-size: 20px;
    > div:nth-child(2) {
      // background-color: #000;
      // gap: 10px;
      // justify-items: center;
      display: grid;
      position: relative;
      // top: 30%;
      // height: 60%;
      grid-template-rows: 1fr 1fr;
      align-self: center;
      > div:nth-child(1) {
        display: flex;
        // background-color: #000;
        text-align: center;
        justify-content: space-around;
        padding-bottom: 10px;
        border-bottom: solid #007552 3px;
      }
      > div:nth-child(2) {
        // border-bottom: solid #007552 1px;
        align-self: center;
        padding-top: 10px;
        text-align: center;
      }
    }
  }
}
.blog-landing-container2 {
  width: 95%;
  margin-left: 2.5%;
  border: solid #007552 5px;
  margin-top: 1%;
  display: grid;
  grid-template-columns: 0.25fr 1fr;
  @media (max-width: 1600px) {
    grid-template-columns: 0.3fr 1fr;
  }
  @media (max-width: 1300px) {
    margin-left: 2%;
    grid-template-columns: 1fr;
    grid-template-rows: 0.04fr 1fr;
  }
  @media (max-width: 768px) {
    margin-left: 1.5%;
    grid-template-columns: 1fr;
    grid-template-rows: 0.04fr 1fr;
  }
  @media (max-width: 576px) {
    margin-left: 1%;
  }
  @media (max-width: 350px) {
    margin-left: 0.5%;
  }
  > div:nth-child(1) {
    //會員區1
    background-color: #ecdeb6;
    border-right: solid #007552 5px;
    @media (max-width: 1300px) {
      & {
        border-right: solid #007552 0px;
        border-bottom: solid #007552 5px;
      }
    }
    > div:nth-child(1) {
      //蓬蓬姨
      text-align: center;
      display: grid;
      grid-template-columns: 0.5fr 1.2fr 1fr;
      padding: 30% 50px 0px 50px;
      min-width: 50px;
      min-height: 50px;

      @media (max-width: 1500px) {
        padding: 30% 10px 0px 10px;
      }
      @media (max-width: 1300px) {
        border-bottom: solid #007552 2px;
        padding: 30% 10px 10px 10px;
      }
      .blog-landing-aunt {
        object-fit: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
      }
      @media (max-width: 1300px) {
        & {
          padding-top: 20px;
          // background-color: #000;
          display: flex;
          flex-wrap: wrap;
          justify-content: center;

          .blog-landing-aunt {
            object-fit: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
          }
        }
      }
      // > div:nth-child(1) {
      //   > img:nth-child(1) {
      //   }
      // }
      > div:nth-child(2) {
        // background-color: #000;
        display: grid;
        grid-template-rows: 1fr 1fr;
        > div:nth-child(1) {
          align-self: end;
          > span:nth-child(1) {
            //蓬蓬草莓姨span
            padding: 3px;
            font-size: 15px;
            // margin-bottom: 10px;
            display: inline-block;
          }
        }
        > div:nth-child(2) {
          align-self: start;
          > img {
            width: 15px; //star
          }
        }
      }
      > div:nth-child(2) {
        padding-top: 0px;
        display: grid;
        // background-color: #000;
        grid-template-rows: 1fr 0.5fr;
        @media (max-width: 1300px) {
          & {
            padding: 0px 20px;
            // background-color: #000;
          }
        }
        > div:nth-child(1) {
          align-self: end;
          > span:nth-child(1) {
            // background-color: #000;
            font-size: 16px;
          }
        }
        > div:nth-child(2) {
          align-self: start;
        }
      }
      > div:nth-child(3) {
        padding-top: 15px;
        justify-self: end;
        > span {
          //追蹤
          padding: 3px 15px;
          background-color: #007552;
          border-radius: 20px;
          color: #fff;
          font-size: 16px;
        }
      }
      .blog-landing-greenline {
        border-bottom: 1px solid #007552;
        padding-top: 20px;
        @media (max-width: 1300px) {
          & {
            display: none;
          }
        }
      }
    }
    > div:nth-child(2) {
      //會員區--其他連結
      display: grid;
      // border-bottom: 10px solid #000000;
      grid-template-columns: 1fr;
      // background-color: #000;
      padding-top: 20%;
      @media (max-width: 1300px) {
        & {
          padding: 0%;
          padding-bottom: 20px;
          // background-color: #000;
        }
      }
      justify-items: center;
      > span {
        text-align: center;
        line-height: 1.5;
        margin-top: 10px;
        text-decoration: none;
        color: black;
        font-size: 16px;
      }
      .otherLink {
        cursor: pointer;
        color: #007552;
      }
      .otherLink:hover {
        color: rgb(255, 255, 255);
        font-size: 20px;
        // background-color: rgb(51, 51, 51);
        text-shadow: rgb(0, 0, 0) 0px 0px 1px, rgb(0, 0, 0) 0px 0px 2px,
          rgb(0, 0, 0) 0px 0px 3px, rgb(255, 255, 255) 0px 0px 4px,
          rgb(255, 255, 255) 0px 0px 5px, rgb(255, 45, 149) 0px 0px 6px,
          rgb(255, 45, 149) 0px 0px 7px, rgb(255, 45, 149) 0px 0px 8px;
      }
    }
  }
  > div:nth-child(2) {
    //右邊區塊
    padding-bottom: 10%;
    background-color: #fbf8ef;
    > div:nth-child(1) {
      display: grid;
      grid-template-columns: 1fr;
      // border: goldenrod 3px solid;
      padding-left: 10%;
      @media (max-width: 1500px) {
        padding-left: 5%;
        padding-right: 5%;
      }
      > div:nth-child(1) {
        //tags
        display: grid;
        padding-top: 20px;
        grid-template-columns: repeat(2, 1fr);
        > div:nth-child(1) {
          //2020-04-10
          font-size: 16px;
        }
        > div:nth-child(2) {
          //tags
          font-size: 16px;
          justify-self: end;
          padding-right: 60%;
          @media (max-width: 1500px) {
            padding-right: 0%;
          }
        }
      }
      // > div:nth-child(2) {
      //   font-size: 16px; //2020-04-10
      // }
      > div:nth-child(3) {
        padding-top: 10px;
        > span:nth-child(1) {
          font-size: 30px;
          background-color: #ffd3c1; //親子輕旅行 台北白石湖採草莓
          line-height: 1.5;
          @media (max-width: 768px) {
            font-size: 25px;
          }
        }
      }
      > div:nth-child(4) {
        // padding: 30px 0px 30px 0px;
        padding-top: 30px;
        //圖片bendingbar2，collection
        > img:nth-child(1) {
          width: 70%;
          @media (max-width: 1500px) {
            width: 100%;
          }
        }
      }
      > div:nth-child(5) {
        padding-top: 30px;
        // text-align: center;
        // background-color: #000;
        position: relative;
        > img:nth-child(1) {
          //妹妹採水果圖
          width: 70%;
          position: relative;

          @media (max-width: 1500px) {
            width: 100%;
          }
        }
      }
    }
    > div:nth-child(2) {
      //文章圖片區
      // border: solid rgb(199, 72, 72) 5px;
      // padding-top: 10%;
      padding-bottom: 5%;
      padding-left: 10%;
      @media (max-width: 1500px) {
        padding-left: 0%;
      }
      display: grid;
      grid-template-columns: 1fr 0.4fr;
      // gap: 5%;
      position: relative;
      @media (max-width: 1500px) {
        grid-template-columns: 1fr;
      }
      > div:nth-child(1) {
        //文章區
        // display: flex;
        // grid-template-rows: 1fr 1.5fr;
        // flex-direction: column;
        // background-color: #000;
        // border: solid #000 3px;
        // padding-bottom: 6rem;
        // padding-bottom: 20%;
        > div:nth-child(1),
        div:nth-child(2) {
          //文章一、二區
          font-size: 16px;
          column-count: 2;
          // padding: 10rem 0rem 10rem 10rem;
          letter-spacing: 1.5px;
          line-height: 1.5;
          column-gap: 10rem;
          padding-top: 24%;
          padding-right: 15%;
          @media (max-width: 1500px) {
            padding: 10% 5% 0% 5%;
          }
          @media (max-width: 768px) {
            column-count: 1;
          }
        }
        > div:nth-child(1) {
          //文章一區
          // margin-bottom: 10rem;
          // background-color: #000;
          height: 385px;
          position: relative;
          @media (max-width: 1500px) {
            height: auto;
          }
          &::before {
            content: '';
            width: 90%;
            border-bottom: solid #007552 2px;
            position: absolute;
            top: 5%;
            right: 20%;
            @media (max-width: 1500px) {
              right: 5%;
              width: 90%;
            }
            @media (max-width: 576px) {
              top: 10px;
              right: 5%;
              width: 90%;
            }
          }
          &::after {
            content: '';
            width: 75%;
            border-bottom: solid #007552 2px;
            position: absolute;
            bottom: -10%;
            right: 30%;
            @media (max-width: 1500px) {
              right: 5%;
              width: 90%;
            }
            @media (max-width: 576px) {
              bottom: -10px;
              right: 5%;
              width: 90%;
            }
          }
        }
        > div:nth-child(2) {
          //文章二區
          height: 385px;
          padding-bottom: 11%;
          @media (max-width: 1500px) {
            height: auto;
          }
        }
      }
      > div:nth-child(2) {
        //文章圖片區-圖片區-綠色梯形
        // border: solid #000 3px;
        position: absolute;
        // padding-top: 10%;
        right: 0%;
        bottom: 15%;
        @media (max-width: 1700px) {
          // position: relative;
          right: -2.5%;
          bottom: 5%;
        }
        @media (max-width: 1500px) {
          position: relative;
          right: -2.5%;
          bottom: 0%;
        }
        > div:nth-child(1) {
          text-align: right;
          // background-color: #000;
          // position: relative;
          @media (max-width: 1500px) {
            text-align: left;
            // display: none;
          }
          > img:nth-child(1) {
            // border: solid #000 3px;
            // height: 100%;
            @media (max-width: 1500px) {
              //梯形
              display: none;
            }
          }
          > div:nth-child(2) {
            position: absolute;
            // top: 10%;
            right: 1%;
            top: 18%;
            // border: solid black 3px;
            @media (max-width: 1500px) {
              // border: solid 5px #000;
              position: relative;
              right: 2.5%;
              top: 0%;
              display: grid;
              grid-template-columns: repeat(2, 1fr);
              grid-template-rows: repeat(2, 1fr);
              justify-items: center;
              row-gap: 20px;
              // align-content: space-around;
              // justify-content: space-between;
            }
            @media (max-width: 768px) {
              grid-template-columns: repeat(1, 1fr);
            }
            > img {
              // border: solid 3px red;
              margin-bottom: 4%;
              width: 90%;
              height: 100%;
              // max-height: 300px;
              min-height: 200px;
              object-fit: cover;
              @media (max-width: 1500px) {
                // border: solid 5px #000;
                margin-bottom: 0%;
              }
            }
          }
        }
      }
    }
    > div:nth-child(3) {
      //讚數區
      // border-top: 5px solid #007552;
      // border-bottom: 5px solid #007552;
      font-size: 20px;
      padding-left: 10%;
      padding-top: 20px;
      padding-bottom: 20px;
      position: relative;
      &::after {
        content: '';
        width: 90%;
        border-top: 2px solid #007552;
        position: absolute;
        top: 0%;
        right: 5%;
      }
      &::before {
        content: '';
        width: 90%;
        border-top: 2px solid #007552;
        position: absolute;
        bottom: 0%;
        right: 5%;
      }
      > div:nth-child(1) {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        > span:nth-child(1) {
          margin-right: 30px;
        }
        > img:nth-child(2) {
      // background-color: #000;
      cursor: pointer;
          margin-right: 10px;
        }
        > span:nth-child(3) {
          color: #62bc5a;
        }
      }
    }
    > div:nth-child(4) {
      //留言區
      display: grid;
      grid-template-columns: 1fr;
      // background-color: rgb(0, 0, 0);
      > #loadMoreMsg {
        > span {
          // border: steelblue 2px solid;
          color: #808080;
        }
        font-size: 16px;
        margin-top: 2%;
        margin-left: 10%;
        cursor: pointer;
      }
      > div {
        padding-left: 20px;
        display: grid;
        background-color: #fff;
        margin-left: 10%;
        margin-right: 15%;
        margin-top: 2%;
        grid-template-columns: 10% 20% 60% 10%;
        align-items: center;
        @media (max-width: 992px) {
          margin-left: 0%;
          margin-right: 0%;
          grid-template-columns: 15% 75% 10%;
          grid-template-rows: repeat(2, 1fr);
          grid-template-areas:
            'aa1 aa2 aa4'
            'aa1 aa3 aa4';
        }
        > div:nth-child(1) {
          // background-color: #000;
          // border: lightslategrey 2px solid;
          width: 50px;
          height: 50px;
          @media (max-width: 992px) {
            grid-area: aa1;
            align-self: center;
            justify-self: center;
            width: 40px;
          height: 40px;
          }
          @media (max-width: 400px) {
          width: 30px;
          height: 30px;
          }
          > img {
            object-fit: cover;
            width: 100%;
            height: 100%;
            border-radius: 50%;
          }
        }
        > div:nth-child(2) {
          display: grid;
          // background-color: #000;
          grid-template-columns: repeat(1, 1fr);
          gap: 3px;
          position: relative;
          @media (max-width: 992px) {
            grid-template-columns: 1fr 1fr;
            justify-self: start;
            gap: 30px;
            grid-area: aa2;
          }
          &::after {
            content: '';
            position: absolute;
            top: 0px;
            right: 10%;
            border-right: solid 1px #a0a0a0;
            height: 20px;
            @media (max-width: 992px) {
              display: none;
            }
          }
          @media (max-width: 576px) {
            &::before {
              content: '';
              position: absolute;
              top: 3px;
              left: -10px;
              border-right: solid 1px #a0a0a0;
              height: 30px;
              @media (max-width: 576px) {
                left: -5px;
              }
            }
          }
        }
        > div:nth-child(3) {
          // background-color: #000;
          font-size: 16px;
          //這炒飯好吃?
          @media (max-width: 992px) {
            grid-area: aa3;
            align-self: start;
          }
        }
        > div:nth-child(4) {
          //report
          @media (max-width: 992px) {
            grid-area: aa4;
          }
          >img{
          cursor: pointer;

          }
        }
      }
    }
    > div:nth-child(5) {
      //form
      padding-top: 100px;
      padding-left: 10%;
      // background-color: #000;
      > form:nth-child(1) {
        > label:nth-child(1) {
          font-size: 20px;
          > textarea:nth-child(1) {
            margin-left: 3%;
            width: 45%;
            height: 150px;
            @media (max-width: 992px) {
              width: 70%;
            }
          }
        }
        > .blog-landing-button-more {
          // background-color: #000;
          width: 110px;
          text-align: center;
          margin-top: 30px;
          margin-left: 25%;
          font-size: 16px;
          @media (max-width: 992px) {
            margin-left: 35%;
          }
          > .blog-landing-button-more2 {
            width: 100%;
          }
        }
      }
    }
  }
}
.blog-landing-outer {
  position: relative;
  > .reportLightBox {
    display: none;
    position: fixed;
    top: 0%;
    left: 0%;
    background-color: rgba(0, 0, 0, 0.582);
    width: 100%;
    height: 100%;
    > div:nth-child(1) {
      position: relative;
      background-color: #fff;
      width: 320px;
      height: 320px;
      top: 50%;
      left: 50%;
      transform: translateX(-50%) translateY(-50%);
      // padding-top: 10%;
      > span:nth-child(1) {
        position: absolute;
        top: 2%;
        right: 2%;
        font-size: 25px;
        cursor: pointer;
      }
      > div:nth-child(2) {
        // background-color: #fff;
        padding-top: 30%;
        padding-left: 30%;
        font-size: 16px;
        > .reportBtn {
          color: #fff;
          background-color: rgb(0, 0, 0);
          border: none;
          border-radius: 10px;
          padding: 2px 10px;
          font-size: 15px;
          margin-left: 15%;
          margin-top: 5%;
          box-shadow: none;
          text-decoration: none;
        }
      }
    }
  }
}
</style>
<script>
import $ from 'jquery';
export default {
  props: {blogInfProps: Array, c: String},
  data() {
    return {
      msgobj: {
        content: null,
        date: null,
        blogNo: null,
      },
      blogMsg: null,
      blogMsgFilter: [],
      blogMsgCount: 1,
      previousValue: null,
      previousItem: [],
      reportRadio: null,
      beReported: null,
      imgStatus: false,
      thumbSrc: '../assets/blog-img/blog-thumb.png',
      clapQuantity: null,
      otherLink: null,
      sellerNo: null,
    };
  },
  created() {
    // this.previousValue = this.blogInfProps;
    this.msgobj.content = this.blogInfProps.content;
    this.msgobj.blogNo = this.blogInfProps.no;
    var nStartTime = new Date(Date.now());
    let today = `${nStartTime.getFullYear()}-${nStartTime.getMonth() +
      1}-${nStartTime.getDate()}`;
    this.msgobj.date = today;
    // console.log(this.previousValue);

    let api = this.path + 'api_get_msg.php';

    this.$http.post(api, JSON.stringify(this.msgobj)).then((res) => {
      if (res.data != '') {
        this.blogMsg = res.data[0];

        // console.log(this.blogMsg);
        // console.log(res.data);
        if (this.blogMsg.length < 5) {
          for (let i = 0; i <= this.blogMsg.length - 1; i++) {
            this.blogMsgFilter.push(this.blogMsg[i]);
          }
        } else {
          for (let i = 0; i < 5; i++) {
            if (this.blogMsg[i] != undefined) {
              this.blogMsgFilter.push(this.blogMsg[i]);
            }
          }
        }
      }
    });

    let api2 = this.path + 'api_get_blog_content.php';

    this.$http.post(api2).then((res) => {
      if (res.data != '') {
        this.previousValue = res.data;
        this.sellerNo = this.previousValue[0].s_no;
        this.previousValue[0].img = this.previousValue[0].img.split(',');

        for (let j = 0; j < this.previousValue[0].img.length; j++) {
          this.previousValue[0].img[j] =
            this.img + this.previousValue[0].img[j];
        }
        let api5 = this.path + 'api_blog_other_link.php';
        this.$http
          .post(api5, JSON.stringify({no: this.sellerNo}))
          .then((res) => {
            // console.log(res.data);

            this.otherLink = res.data;
          });
      }
    });

    let api3 = this.path + 'api_detect_blog_clap.php';

    this.$http.post(api3).then((res) => {
      if (res.data == 1) {
        this.imgStatus = true;
      } else {
        this.imgStatus = false;
      }

      // console.log(res.data);
    });

    let api4 = this.path + 'api_blog_clap_count.php';

    this.$http.post(api4).then((res) => {
      this.clapQuantity = res.data;
      // console.log(this.clapQuantity);
    });
  },
  updated() {
    // let api = this.path + 'api_blog_clap_count.php';
    // this.$http.post(api).then((res) => {
    //   this.clapQuantity = res.data;
    //   console.log(this.clapQuantity);
    // });
    // let api5 = this.path + 'api_blog_other_link.php';
    // this.$http.post(api5,this.previousValue[0].s_no).then((res) => {
    //   console.log(res.data);
    // });
  },
  computed: {
    // loadComment() {
    //   this.comment();
    //   return this.blogInfProps.no;
    // },
  },
  methods: {
    comment() {
      let msg = document.getElementsByTagName('textarea')[0].value;
      this.msgobj.content = msg;
      let api = this.path + 'api_blog_msg.php';

      this.$http.post(api, JSON.stringify(this.msgobj));
      var pathtopage = window.location.href;

      history.go(0);
    },
    loadMoreMsg() {
      if (this.blogMsg.length - this.blogMsgFilter.length >= 5) {
        for (
          let i = this.blogMsgCount * 5;
          i <= this.blogMsgCount * 5 + 4;
          i++
        ) {
          this.blogMsgFilter.push(this.blogMsg[i]);
        }
      } else {
        for (let i = this.blogMsgFilter.length; i < this.blogMsg.length; i++) {
          this.blogMsgFilter.push(this.blogMsg[i]);
        }
      }

      this.blogMsgCount++;
    },
    report(e) {
      // console.log(e);
      // alert(e)
      document
        .getElementsByClassName('reportLightBox')[0]
        .setAttribute('style', 'display: block;');
      // this.beReported=null
      this.beReported = e;
    },
    closeLightBox() {
      document
        .getElementsByClassName('reportLightBox')[0]
        .setAttribute('style', 'display: none;');
    },
    sendReport() {
      var nStartTime = new Date(Date.now());
      let today = `${nStartTime.getFullYear()}-${nStartTime.getMonth() +
        1}-${nStartTime.getDate()}`;
      this.beReported.date = today;
      this.beReported.reason = null;
      this.beReported.reason = this.reportRadio;
      // console.log(this.beReported);
      if (this.beReported.reason == null) {
        alert('請填寫原因');
      } else {
        let api = this.path + 'api_report_msg.php';

        this.$http.post(api, JSON.stringify(this.beReported)).then((res) => {
          if (res.data == 1) {
            alert('您已經檢舉過了！');
            // console.log(res.data);
          } else {
            alert('檢舉成功！');
          }
        });
        this.closeLightBox();
      }
    },
    clap() {
      if (this.imgStatus == false) {
        let api = this.path + 'api_blog_clap.php';

        this.$http.post(api).then((res) => {
          if (res.data != 123) {
            this.clapQuantity[0].count =
              parseInt(this.clapQuantity[0].count) + 1;
            this.imgStatus = true;
          } else {
            alert('請先登入');
          }
        });
      } else {
        let api = this.path + 'api_blog_unclap.php';

        this.$http.post(api).then((res) => {
          if (res.data != 123) {
            this.clapQuantity[0].count =
              parseInt(this.clapQuantity[0].count) - 1;
            this.imgStatus = false;
          } else {
            alert('請先登入');
          }
        });
      }
    },
    goToRelatedPage(i, e) {
      let api = this.path + 'api_get_msg_ot.php';
      // console.log(i.no)
      this.$http.post(api, i.no).then((res) => {
        if (res.data != '') {
          // console.log(res.data);
          history.go(0);
        } else {
          history.go(0);
          // alert('請先登入');
        }
      });
    },
  },
  // watch: {

  //   blogMsgFilter(newValue, oldValue){

  //     this.blogMsgFilter = newValue;
  //   }
  // },
};
</script>
