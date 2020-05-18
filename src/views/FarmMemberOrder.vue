<template>
    <div class="FarmOrder">
        <div class="FarmOrder_head">
            <div class="FarmOrder_head_text">
                <h2>商品管理</h2>
            </div>
        </div>
        <div class="plusbutton">
            <div class="plus">
                <router-link to="/farm/product">
                    <p>新增商品</p>
                </router-link>

            </div>
        </div>
        <div class="FarmOrder_bottom">
            <div class="list_1">
                <div class="Ordernum">
                    <p class="title">商品編號</p>
                    <p>xxxx</p>
                    <p>xxxx</p>
                    <p>xxxx</p>
                    <p>xxxx</p>
                    <p>xxxx</p>
                    <p>xxxx</p>
                    <p>xxxx</p>
                    <p>xxxx</p>
                    <p>xxxx</p>
                    <p>xxxx</p>
                    <p>xxxx</p>
                    <p>xxxx</p>
                </div>
                <div class="Ordername">
                    <p class="title">名稱</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                    <p>慶中秋!台南玉璽文旦...</p>
                </div>
                <div class="Orderprice">
                    <p class="title">價格</p>
                    <p>200</p>
                    <p>200</p>
                    <p>200</p>
                    <p>200</p>
                    <p>200</p>
                    <p>200</p>
                    <p>200</p>
                    <p>200</p>
                    <p>200</p>
                    <p>200</p>
                    <p>200</p>
                    <p>200</p>
                </div>
                <div class="Ordertime">
                    <p class="title">上傳時間</p>
                    <p>2020-04-16 11:22</p>
                    <p>2020-04-16 11:22</p>
                    <p>2020-04-16 11:22</p>
                    <p>2020-04-16 11:22</p>
                    <p>2020-04-16 11:22</p>
                    <p>2020-04-16 11:22</p>
                    <p>2020-04-16 11:22</p>
                    <p>2020-04-16 11:22</p>
                    <p>2020-04-16 11:22</p>
                    <p>2020-04-16 11:22</p>
                    <p>2020-04-16 11:22</p>
                    <p>2020-04-16 11:22</p>
                </div>
                <div class="Orderputon">
                    <p class="title">上架狀態</p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable" 
                    for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch" /><label class="statuslable"
                            for="switch">Toggle<div class="after"></div></label></p>
                    <p><input class="statusBtn" type="checkbox" id="switch"  /><label class="statuslable"
                            for="switch" >Toggle<div class="after"></div></label></p>
                </div>
            </div>


            <div class="pagination_block">
                <ul class="pagination">
                    <li><a href="#">&lt;</a></li>
                    <li><a href="#" class="-on">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a href="#">10</a></li>
                    <li><a href="#">&gt;</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>
// <script>
import $ from "jquery";
export default {
    
 mounted(){
     $('.statuslable').click(function(){
          $(this).find(".after").toggleClass("scrol");
         
         
          if($(".after").hasClass("scrol")){
              $(".statuslable").addClass("color");
          }
     })

 },
};
</script>
