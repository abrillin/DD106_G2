<template>
  <div class="blog-landing-outer">
    <img src="@/assets/blog-img/blog-bar.png" /><br />
    <div class="blog-landing-container-new">
      <div>
        <div>
          <!--果農日誌LOGO-->
          <img src="@/assets/blog-img/blog_logo.svg" @click="test" />
        </div>
        <div>
          <div>
            <div>
              <img src="@/assets/blog-img/blog-dot.png" alt="" />
              <span> </span>
              <span> 旅遊</span>
            </div>
            <div>
              <img src="@/assets/blog-img/blog-dot.png" alt="" />
              <span> </span>
              <span> 水果知識</span>
            </div>
            <div>
              <img src="@/assets/blog-img/blog-dot.png" alt="" />
              <span> </span>
              <span> 農民樂</span>
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
            <img
              src="@/assets/blog-img/blog-someoneshead.png"
              class="blog-landing-aunt"
            />
          </div>
          <div>
            <div>
              <span>蓬蓬草莓姨</span>
            </div>
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
          <div class="blog-landing-greenline"></div>
          <div class="blog-landing-greenline"></div>
          <div class="blog-landing-greenline"></div>
        </div>
        <div>
          <span>其他文章連結</span>
          <span>其他文章連結</span>
          <span>其他文章連結</span>
        </div>
      </div>

      <div>
        <div>
          <div>
            <div>{{ this.blogInfProps.date }}</div>
            <div>
              <img src="@/assets/blog-img/blog-tag.png" />
              <span> 草莓 </span>
              <img src="@/assets/blog-img/blog-tag.png" />
              <span> 旅遊日誌 </span>
            </div>
          </div>
          <div></div>
          <div>
            <span>{{ this.blogInfProps.title }}</span>
          </div>
          <div>
            <img src="@/assets/blog-img/blog-bendingbar2.png" />
          </div>
          <div>
            <img src="@/assets/blog-img/blog-collection.png" />
          </div>
        </div>
        <div>
          <div>
            <div>
              白石湖是大台北難得仍保存農業風味的鄉村地區，當地多產白色沉積砂岩石塊故而得名，近年轉型成為休閒農業區，區內種植草莓聞名，每年12月至5月的草莓產季來臨，絡繹不絕的人潮湧入內湖一帶的草莓園。我們一早就來到莓圃休閒農園，是個擁有果園、菜園和庭園咖啡等多元場域，其中溫室草莓園吸引家長帶著孩子體驗採果樂，不用擔心腳底褲管沾到泥巴。
              <br />
              <br />
              特別提醒台北內湖的莓園幾乎是假日上午11點開放，當天採摘到一定數量便掛上「本日已採完」的告示牌，若想採草莓的朋友建議早點排隊。
              <br />
              <br />
              採完草莓不過癮，還可以參加糖霜餅乾手做課程。工作人員拿出台北世大運吉祥物「熊讚」草莓餅乾，孩子們吵著也要做一隻熊讚帶回家。「我們先用軟糖霜劃出外圍形狀，從中間一圈一圈慢慢補滿，擠完糖霜後，餅乾表面可能會不平，再利用牙籤撥勻，或用手掌輕拍均勻」，大家跟著老師依樣畫葫蘆，以牙籤沾芝麻妝點眼睛、白糖霜親手描繪各自作品，創作他們心目中的熊讚。
              <br />
              <br />
              除了草莓，莓圃也提供其他蔬果的體驗，6-11月有百香果、火龍果、番茄；7-8月則有水果玉米、小番茄等，讓小朋友一整年都可以體驗小農夫的樂趣。大人們也可以坐在綠意盎然的庭園休憩用餐，享受田園悠閒的氛圍。
            </div>
            <div>
              白石湖是大台北難得仍保存農業風味的鄉村地區，當地多產白色沉積砂岩石塊故而得名，近年轉型成為休閒農業區，區內種植草莓聞名，每年12月至5月的草莓產季來臨，絡繹不絕的人潮湧入內湖一帶的草莓園。我們一早就來到莓圃休閒農園，是個擁有果園、菜園和庭園咖啡等多元場域，其中溫室草莓園吸引家長帶著孩子體驗採果樂，不用擔心腳底褲管沾到泥巴。
              <br />
              <br />
              特別提醒台北內湖的莓園幾乎是假日上午11點開放，當天採摘到一定數量便掛上「本日已採完」的告示牌，若想採草莓的朋友建議早點排隊。
              <br />
              <br />
              採完草莓不過癮，還可以參加糖霜餅乾手做課程。工作人員拿出台北世大運吉祥物「熊讚」草莓餅乾，孩子們吵著也要做一隻熊讚帶回家。「我們先用軟糖霜劃出外圍形狀，從中間一圈一圈慢慢補滿，擠完糖霜後，餅乾表面可能會不平，再利用牙籤撥勻，或用手掌輕拍均勻」，大家跟著老師依樣畫葫蘆，以牙籤沾芝麻妝點眼睛、白糖霜親手描繪各自作品，創作他們心目中的熊讚。
              <br />
              <br />
              除了草莓，莓圃也提供其他蔬果的體驗，6-11月有百香果、火龍果、番茄；7-8月則有水果玉米、小番茄等，讓小朋友一整年都可以體驗小農夫的樂趣。大人們也可以坐在綠意盎然的庭園休憩用餐，享受田園悠閒的氛圍。
            </div>
          </div>
          <div>
            <div>
              <img src="../assets/blog-img/blog-trapezoid.png" />
              <div>
                <img src="@/assets/blog-img/blog-trapimg1.png" />
                <img src="@/assets/blog-img/blog-trapimg2.png" />
                <img src="@/assets/blog-img/blog-trapimg3.png" />
                <img src="@/assets/blog-img/blog-trapimg4.png" />
              </div>
            </div>
          </div>
        </div>
        <div>
          <div>
            <span> 留言5筆 </span>
            <img src="@/assets/blog-img/blog-thumb.png" />
            <span> 301 </span>
          </div>
        </div>
        <div>
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
          </div>
        </div>
        <div>
          <form action="" method="get" @click.prevent="prevent">
            <label for="">
              留言:
              <textarea name="" id=""> </textarea>
            </label>
            <br />
            <div class="blog-landing-button-more" @click.prevent="comment">
              <button-more msg="送出"></button-more>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss">
.blog-landing-outer {
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
      @media (max-width: 1500px) {
        padding: 30% 10px 0px 10px;
      }
      @media (max-width: 1300px) {
        border-bottom: solid #007552 2px;
        padding: 30% 10px 10px 10px;
      }
      .blog-landing-aunt {
        width: 100%;
      }
      @media (max-width: 1300px) {
        & {
          padding-top: 20px;
          // background-color: #000;
          display: flex;
          flex-wrap: wrap;
          justify-content: center;

          .blog-landing-aunt {
            width: 100%;
          }
        }
      }
      > div:nth-child(1) {
        > img:nth-child(1) {
        }
      }
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
          position: relative;
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
          padding-bottom: 11%;
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
            @media (max-width: 1500px) {
              // border: solid 5px #000;
              position: relative;
              right: 0%;
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
              margin-bottom: 4%;
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
          @media (max-width: 992px) {
            grid-area: aa1;
            align-self: center;
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
          // background-color: #000;
          //report
          @media (max-width: 992px) {
            grid-area: aa4;
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
        }
      }
    }
  }
}
</style>
<script>
export default {
  props: {blogInfProps: Object, c: String},
  data() {
    return {
      msgobj: {
        content: null,
        date: null,
        blogNo: null,
      },
    };
  },
  methods: {
    test() {
      console.log(this.blogInfProps, this.c);
    },
    prevent() {},
    comment() {
      let msg = document.getElementsByTagName('textarea')[0].value;
      var nStartTime = new Date(Date.now());
      this.msgobj.content = msg;
      let today = `${nStartTime.getFullYear()}-${nStartTime.getMonth() +
        1}-${nStartTime.getDate()}`;
      this.msgobj.date = today;
      let blogNo = this.blogInfProps.no;
      this.msgobj.blogNo = blogNo;
      // console.log(this.msgobj);

      const api = '/api/api_blog_msg.php';

      this.$http
        .post(api, JSON.stringify(this.msgobj))
        .then((res) => {
          if (res.data != '') {
            console.log(res.data);
          } else {
          }
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>
