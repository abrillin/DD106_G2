<template>
  <div class="shopping">
    <div class="content">
      <div class="form">
        <div class="form-content">
          <p class="title">購物籃明細：</p>
          <div class="box" v-for="(data, i) in arr" :key="data.seller">
            <p class="seller">{{ data.seller }}</p>
            <div class="tr head-bar">
              <div class="td check-box"></div>
              <div class="td img">圖片</div>
              <div class="td name">名稱</div>
              <div class="td price">單價</div>
              <div class="td amount">數量</div>
              <div class="td subtotal">小計</div>
              <div class="td operating">操作</div>
            </div>
            <div class="tr" v-for="(item, j) in data.item" :key="item.no">
              <div class="td check-box">
                <div class="input">
                  <input
                    :id="'checkbox' + item.no"
                    class="checkbox"
                    :value="data.seller + item.no"
                    v-model="status"
                    @change="checkbox(data, item)"
                    type="checkbox"
                  />
                  <label :for="'checkbox' + item.no"></label>
                </div>
              </div>

              <div class="td img">
                <img src="@/assets/shop/item_001.png" />
              </div>
              <div class="td name">{{ item.name }}</div>
              <div class="td price">$ {{ item.price }}</div>
              <div class="td amount">
                <div class="input">
                  <input type="number" v-model="item.amount" @keydown="setAmount(data, item)" />
                  <div class="button">
                    <button @click="addAmount(data, item)">+</button>
                    <button @click="subAmount(data, item)">-</button>
                  </div>
                </div>
              </div>
              <div class="td subtotal">$ {{ item.amount * item.price }}</div>
              <div class="td operating">
                <div class="btn">
                  <button type="button" @click.prevent="deleteItem(i, j, item.no)">刪除</button>
                </div>
              </div>
            </div>
            <p class="total" v-if="arr[0].seller != ''">總金額 {{ data.total }} 元</p>
            <router-link
              v-if="arr[0].seller != ''"
              to="/main/member/checkInfo"
              type="button"
              class="btn"
            >進行結帳</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      arr: [
        {
          seller: "",
          item: [],
          total: 0
        }
      ],
      cart: [],
      status: []
    };
  },
  computed: {
    // total: function() {
    //   let sum = 0;
    //   for (let i = 0; i < this.cart.length; i++) {
    //     // sum += this.cart[i].amount * this.cart[i].price;
    //     sum += this.cart[i].total;
    //   }
    //   return sum;
    // }
  },
  created() {
    // 獲取 localStorage 物件
    let storage = localStorage;
    // 獲取物件內的 itemNo 欄位值，並用 , 符號切開
    let itemArr = storage["itemNo"];
    // 獲取除去最後一個 , 的字串
    itemArr = itemArr.substr(0, itemArr.length - 1);

    const api = "/api/api_shopping.php";

    this.$http.post(api, JSON.stringify(itemArr)).then(res => {
      const data = res.data;
      this.arr = data;

      for (let i = 0; i < this.arr.length; i++) {
        for (let j = 0; j < this.arr[i].item.length; j++) {
          this.arr[i].item[j]["sub"] = 0;
        }
      }
    });
  },
  methods: {
    setAmount: function(data, item) {},
    addAmount: function(data, item) {
      item.amount++;

      const name = data.seller + item.no;

      for (let i = 0; i < this.status.length; i++) {
        if (this.status[i] == name) {
          data.total += Number(item.price);
        }
      }
    },
    subAmount: function(data, item) {
      if (item.amount <= 1) {
        item.amount = 1;
      } else {
        item.amount--;

        const name = data.seller + item.no;

        for (let i = 0; i < this.status.length; i++) {
          if (this.status[i] == name) {
            data.total -= item.price;
          }
        }
      }
    },
    checkbox: function(data, item) {
      let index = this.cart.indexOf(item);

      if (index < 0) {
        this.cart.push(item);

        data.total += item.amount * item.price;
      } else {
        this.cart.splice(index, 1);

        data.total -= item.amount * item.price;
      }
    },
    deleteItem: function(i, j, no) {
      let storage = localStorage;
      let itemArr = storage["itemNo"];

      itemArr = itemArr.substr(0, itemArr.length - 1);
      itemArr = itemArr.split(",");

      const index = itemArr.indexOf(no);

      this.arr[i].item[j];

      this.arr[i].total = 0;
      this.arr[i].item.splice(j, 1);

      if (this.arr[i].item.length == 0) {
        this.arr.splice(i, 1);
      }

      itemArr.splice(index, 1);

      storage["itemNo"] = itemArr.toString() + ",";
    }
  }
};
</script>
