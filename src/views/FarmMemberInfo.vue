<template>
    <div class="farminfo">
        <div class="farminfo_head">
            <div class="farminfo_head_text">
                <h2>個人資料</h2>
            </div>
        </div>
        <div class="farminfo_bottom">
            <div class="top_card">
                <div class="card">
                    <div class="up">
                        <div class="imgbox">
                            <img src="@/assets/ia_2300000010.jpg" alt="">
                        </div>
                        <div class="uptext">
                            <p>暱稱:蓬蓬草莓姨</p>
                            <span>評價</span>
                            <p>果園地址</p>
                            <div class="underline"></div>
                        </div>

                    </div>
                    <div class="dowm">
                        <div class="downtext">
                            <p>
                                簡介<br>
                            花菓山富貴果園位於新竹縣竹北市，種植紅龍果、百香果、玉米等作物，果園透過合理化施肥讓農作物生長，品質良好，廣受好評。
                            <br>
                            <br>
                            以自家也能安心食用為初衷，所有作物皆接受嚴格把關，主力產品為紅龍果，我們生產紅龍果以草生栽培，不使用除草劑、農藥，使用政府推薦肥料及用藥，品質嚴格把關，讓大家能安心的食用。
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="bottom_form">
                <div class="person_left">
                    <ul>
                        <li>果粉編號</li>
                        <li>帳號</li>
                        <!-- <li>密碼</li> -->
                        <!-- <li>修改密碼</li> -->
                        <li>果粉姓名</li>
                        <li>暱稱</li>
                        <li>性別</li>
                        <li>連絡電話</li>
                        <li>e-mail</li>
                    </ul>
                </div>
                <div class="person_right">
                    <p>{{no}}</p>
                    <p>{{acc}}</p>
                    <!-- <p>XXXXXXXXXX</p> -->
                    <!-- <input type="text"> -->
                    <!-- <br> -->
                    <p>{{name}}</p>
                    <p>{{nick}}</p>
                    <p>{{gender}}</p>
                    <p>0{{phone}}</p>
                    <p>{{email}}</p>
                    <div class="submit_button">
                        <div class="correct">
                            <p>確定</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

