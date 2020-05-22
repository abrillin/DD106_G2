<template>
  <div class="fruit_start">
    <h1>{{index[type].item[typeName].name}}</h1>
    <div class="fruit_start_img">
      <div class="img_content">
        <img src="@/assets/book_img/spring/plum/plum04.jpg" alt />
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: { type: Number, page: Number },
  data() {
    return {
      index: [
        {
          item: [
            {
              name: "梅子"
            },
            {
              name: "李子"
            },
            {
              name: "桃子"
            },
            {
              name: "琵琶"
            }
          ]
        },
        {
          item: [
            {
              name: "西瓜"
            },
            {
              name: "芒果"
            },
            {
              name: "火龍果"
            },
            {
              name: "荔枝"
            }
          ]
        },
        {
          item: [
            {
              name: "柿子"
            },
            {
              name: "梨子"
            },
            {
              name: "柚子"
            },
            {
              name: "百香果"
            }
          ]
        },
        {
          item: [
            {
              name: "草莓"
            },
            {
              name: "柳丁"
            },
            {
              name: "番茄"
            },
            {
              name: "棗子"
            }
          ]
        },
        {
          item: [
             {
              name: "木瓜"
            },
            {
              name: "鳳梨"
            },
            {
              name: "香蕉"
            },
            {
              name: "芭樂"
            }
          ]
        }
      ]
    };
  },
  computed: {
    typeName: function() {
      return Math.floor(this.page / 2);
    }
  }
};
</script>