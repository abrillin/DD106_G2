import $ from "jquery";
import * as THREE from "three";
import {
    gsap,
    TweenMax,
    Power1,
    Power3,
    TimelineMax,
    TimeLite
} from "gsap";
import MotionPathPlugin from "gsap/MotionPathPlugin";

import cloudWhite from "@/assets/cloudWhite.png";
import cloud2White from "@/assets/cloud2White.png";
import cloudGreen from "@/assets/cloudGreen.png";
import cloud2Green from "@/assets/cloud2Green.png";
import cloudSkin from "@/assets/cloudSkin.png";
import cloudPink from "@/assets/cloudPink.png";
import cloudsmoke from "@/assets/cloudsmoke.png";
import cloudlight01 from "@/assets/cloudlight.png";
import cloudlight02 from "@/assets/cloudlight02.png";
import taiwan from "@/assets/taiwan.png";
import knowledgeHead from "@/assets/knowledgeHead.png";
import knowledge01 from "@/assets/knowledge.png";
import memberLeft from "@/assets/memberLeft.png";
import memberRight01 from "@/assets/memberRight.png";
import market01 from "@/assets/market.png";
import marketfruit03 from "@/assets/marketfruit.png";
import marketfruit04 from "@/assets/marketfruit02.png";
import mont001 from "@/assets/mont01.png";
import mont002 from "@/assets/mont02.png";
import mont003 from "@/assets/mont03.png";
import tree001 from "@/assets/tree01.png";
import tree002 from "@/assets/tree02.png";
import blog01 from "@/assets/blog.png";
import blogwatermelon01 from "@/assets/blogwatermelon.png";
import waterpear01 from "@/assets/waterpear.png";
import waterpearline01 from "@/assets/waterpearline.png";
import fruitbox01 from "@/assets/fruitbox.png";
import fruitboxline01 from "@/assets/fruitboxline.png";

$(function () {
    $("div.tab").on("click", function () {
        /* 將頁籤列表移除所有 -on，再將指定的加上 -on */
        $(this)
            .closest("#knowledge_container")
            .find("div.tab")
            .removeClass("-on");
        $(this).addClass("-on");

        /* 找到對應的頁籤內容，加上 -on 來顯示 */
        $("div.knowledge_page").removeClass("-on");
        $("div.knowledge_page." + $(this).attr("data-target")).addClass("-on");
    });
});

$(function () {
    // hamburger icon 的切換
    $("div.hamburger").on("click", function () {
        $(this).toggleClass("is-active");
    });
});
gsap.registerPlugin(MotionPathPlugin);
let renderer, scene, camera;

function init() {
    scene = new THREE.Scene();

    // 相機設定與 OrbitControls
    camera = new THREE.PerspectiveCamera(
        60,
        window.innerWidth / window.innerHeight,
        0.1,
        3000
    );

    camera.position.set(0, 800, 1500);
    camera.lookAt(0, 800, 0);

    // 渲染器設定
    renderer = new THREE.WebGLRenderer();

    renderer.setSize(window.innerWidth, window.innerHeight);

    // var texturecloud1 = new THREE.TextureLoader().load('@/assets/cloudWhite.png');
    var texturecloud1 = new THREE.TextureLoader().load(cloudWhite);
    var texturecloud2 = new THREE.TextureLoader().load(cloud2White);
    var texturecloud3 = new THREE.TextureLoader().load(cloudGreen);
    var texturecloud4 = new THREE.TextureLoader().load(cloud2Green);
    var texturecloud5 = new THREE.TextureLoader().load(cloudSkin);
    var texturecloud6 = new THREE.TextureLoader().load(cloudPink);
    var texturecloud7 = new THREE.TextureLoader().load(cloudsmoke);
    var materialcloudlight = new THREE.TextureLoader().load(cloudlight01);
    var materialcloudlight2 = new THREE.TextureLoader().load(cloudlight02);

    var geometry = new THREE.PlaneGeometry(300, 160);
    var materialcloud1 = new THREE.MeshBasicMaterial({
        map: texturecloud1,
        transparent: true,
        depthWrite: false,
        alphaTest: 0.7,
    });
    var materialcloud2 = new THREE.MeshBasicMaterial({
        map: texturecloud2,
        transparent: true,
        depthWrite: false,
        alphaTest: 0.2,
    });
    var materialcloud3 = new THREE.MeshBasicMaterial({
        map: texturecloud3,
        transparent: true,
        depthWrite: false,
        alphaTest: 0,
    });
    var materialcloud4 = new THREE.MeshBasicMaterial({
        map: texturecloud4,
        transparent: true,
        depthWrite: false,
        alphaTest: 0.8,
    });
    var materialcloud5 = new THREE.MeshBasicMaterial({
        map: texturecloud5,
        transparent: true,
        depthWrite: false,
        alphaTest: 0.5,
        // alphaTest: 0,
        // blending: THREE.CustomBlending,
        // // blendSrc: THREE.OneFactor,
        // blendDst: THREE.OneMinusSrcAlphaFactor,
    });
    var materialcloud6 = new THREE.MeshBasicMaterial({
        map: texturecloud6,
        transparent: true,
        depthWrite: false,
        alphaTest: 0.6,
    });

    var materialcloud7 = new THREE.MeshBasicMaterial({
        map: texturecloud7,
        transparent: true,
        depthWrite: false,
        alphaTest: 0.8,
    });

    var materialcloudlight = new THREE.MeshBasicMaterial({
        map: materialcloudlight,
        transparent: true,
        depthWrite: false,
        alphaTest: 0,
        blending: THREE.CustomBlending,
        blendSrc: THREE.OneFactor,
        blendDst: THREE.OneMinusSrcAlphaFactor,
    });

    var materialcloudlight2 = new THREE.MeshBasicMaterial({
        map: materialcloudlight2,
        transparent: true,
        depthWrite: false,
        alphaTest: 0,
        blending: THREE.CustomBlending,
        blendSrc: THREE.OneFactor,
        blendDst: THREE.OneMinusSrcAlphaFactor,
    });

    // instantiate a loader
    let cloud1 = new THREE.Mesh(geometry, materialcloud1);
    cloud1.position.set(180, 680, 1200);
    scene.add(cloud1);

    let cloud2 = new THREE.Mesh(
        new THREE.PlaneGeometry(240, 140),
        materialcloud2
    );
    cloud2.position.set(280, 750, -1100);
    scene.add(cloud2);

    let cloud3 = new THREE.Mesh(
        new THREE.PlaneGeometry(240, 140),
        materialcloud6
    );
    cloud3.position.set(-950, 680, -1100);
    scene.add(cloud3);

    let cloud4 = new THREE.Mesh(
        new THREE.PlaneGeometry(240, 140),
        materialcloud1
    );
    cloud4.position.set(-850, 620, -1109);
    scene.add(cloud4);

    let cloud5 = new THREE.Mesh(new THREE.PlaneGeometry(140, 90), materialcloud6);
    cloud5.position.set(-200, 690, 1100);
    scene.add(cloud5);

    let cloud6 = new THREE.Mesh(
        new THREE.PlaneGeometry(360, 240),
        materialcloud2
    );
    cloud6.position.set(-350, 950, 1000);
    scene.add(cloud6);
    let cloudlight = new THREE.Mesh(
        new THREE.PlaneGeometry(120, 90),
        materialcloudlight
    );
    cloudlight.position.set(-220, 807, 1000);
    scene.add(cloudlight);
    let cloud7 = new THREE.Mesh(
        new THREE.PlaneGeometry(220, 150),
        materialcloud1
    );
    cloud7.position.set(-350, 650, 1150);
    scene.add(cloud7);

    let cloud8 = new THREE.Mesh(
        new THREE.PlaneGeometry(220, 150),
        materialcloud1
    );
    cloud8.position.set(-220, 680, 900);
    scene.add(cloud8);

    let cloud9 = new THREE.Mesh(
        new THREE.PlaneGeometry(2020, 1250),
        materialcloud2
    );
    cloud9.position.set(0, 200, 300);
    scene.add(cloud9);

    let cloud10 = new THREE.Mesh(
        new THREE.PlaneGeometry(360, 240),
        materialcloud4
    );
    cloud10.position.set(0, 1300, 600);
    scene.add(cloud10);

    let cloud11 = new THREE.Mesh(
        new THREE.PlaneGeometry(280, 150),
        materialcloud5
    );
    cloud11.position.set(-1200, 900, 0);
    scene.add(cloud11);

    let cloud12 = new THREE.Mesh(
        new THREE.PlaneGeometry(280, 150),
        materialcloud1
    );
    cloud12.position.set(700, 1100, 500);
    scene.add(cloud12);

    let cloud13 = new THREE.Mesh(
        new THREE.PlaneGeometry(280, 150),
        materialcloud6
    );
    cloud13.position.set(850, 1200, 400);
    scene.add(cloud13);

    let cloud14 = new THREE.Mesh(
        new THREE.PlaneGeometry(280, 150),
        materialcloud5
    );
    cloud14.position.set(670, 860, 300);
    scene.add(cloud14);

    let cloudlight2 = new THREE.Mesh(
        new THREE.PlaneGeometry(180, 140),
        materialcloudlight2
    );
    cloudlight2.position.set(650, 980, 500);
    scene.add(cloudlight2);

    let cloud15 = new THREE.Mesh(
        new THREE.PlaneGeometry(240, 160),
        materialcloud2
    );
    cloud15.position.set(340, 301, 80);
    cloud15.rotation.x = -0.5 * Math.PI;
    scene.add(cloud15);

    let cloud16 = new THREE.Mesh(
        new THREE.PlaneGeometry(120, 70),
        materialcloud6
    );
    cloud16.position.set(-520, 300, -120);
    cloud16.rotation.x = -0.5 * Math.PI;
    scene.add(cloud16);

    let cloud17 = new THREE.Mesh(
        new THREE.PlaneGeometry(120, 70),
        materialcloud1
    );
    cloud17.position.set(-550, 300, -150);
    cloud17.rotation.x = -0.5 * Math.PI;
    scene.add(cloud17);

    let cloud18 = new THREE.Mesh(
        new THREE.PlaneGeometry(120, 70),
        materialcloud1
    );
    cloud18.position.set(0, 330, -400);
    cloud18.rotation.x = -0.5 * Math.PI;
    scene.add(cloud18);

    let cloud19 = new THREE.Mesh(new THREE.PlaneGeometry(50, 30), materialcloud6);
    cloud19.position.set(100, 250, -185);
    cloud19.rotation.x = -0.5 * Math.PI;
    scene.add(cloud19);

    let cloud20 = new THREE.Mesh(new THREE.PlaneGeometry(50, 30), materialcloud1);
    cloud20.position.set(80, 251, -170);
    cloud20.rotation.x = -0.5 * Math.PI;
    scene.add(cloud20);

    let cloud21 = new THREE.Mesh(
        new THREE.PlaneGeometry(100, 50),
        materialcloud6
    );
    cloud21.position.set(150, 251, 10);
    cloud21.rotation.x = -0.5 * Math.PI;
    scene.add(cloud21);

    let cloud22 = new THREE.Mesh(new THREE.PlaneGeometry(70, 35), materialcloud5);
    cloud22.position.set(100, 250, -10);
    cloud22.rotation.x = -0.5 * Math.PI;
    scene.add(cloud22);

    let cloud23 = new THREE.Mesh(new THREE.PlaneGeometry(40, 20), materialcloud7);
    cloud23.position.set(150, 250, -310);
    cloud23.rotation.x = -0.5 * Math.PI;
    scene.add(cloud23);

    let cloud24 = new THREE.Mesh(new THREE.PlaneGeometry(40, 20), materialcloud7);
    cloud24.position.set(170, 251, -300);
    cloud24.rotation.x = -0.5 * Math.PI;
    scene.add(cloud24);

    //台灣
    const planeGeometry = new THREE.PlaneGeometry(600, 900);
    const planeMaterial = new THREE.MeshLambertMaterial({
        map: THREE.ImageUtils.loadTexture(taiwan),
        transparent: true,
        depthWrite: false,
        opacity: 0.5,
    });
    let plane = new THREE.Mesh(planeGeometry, planeMaterial);
    plane.rotation.x = -0.5 * Math.PI;
    plane.position.set(0, 0, 0);

    scene.add(plane);

    // const planeGeometry1 = new THREE.PlaneGeometry(430, 500);
    // const planeMaterial1 = new THREE.MeshLambertMaterial({
    //     map: THREE.ImageUtils.loadTexture('treemont.png'),
    //     transparent: true,
    //     depthWrite: false,
    //     opacity: 0.9,
    // });
    // let plane1 = new THREE.Mesh(planeGeometry1, planeMaterial1);
    // plane1.rotation.x = -0.5 * Math.PI;
    // plane1.position.set(60, 10, -150);

    // scene.add(plane1);

    //知識百科
    const planeGeometryknowledgehead = new THREE.PlaneGeometry(50, 35);
    const planeMaterialknowledgehead = new THREE.MeshLambertMaterial({
        map: THREE.ImageUtils.loadTexture(knowledgeHead),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var knowledgehead = new THREE.Mesh(
        planeGeometryknowledgehead,
        planeMaterialknowledgehead
    );
    knowledgehead.rotation.x = -0.5 * Math.PI;
    knowledgehead.position.set(22, 31, -449);

    scene.add(knowledgehead);
    var knowledgeheadtween = TweenMax.fromTo(
        knowledgehead.position,
        1, {
            x: 50,
            z: -448,
            repeat: -1,
            yoyo: true,
        }, {
            x: 51,
            z: -449,
            repeat: -1,
            yoyo: true,
        }
    );

    const planeGeometryknowledge = new THREE.PlaneGeometry(160, 120);
    const planeMaterialknowledge = new THREE.MeshLambertMaterial({
        map: THREE.ImageUtils.loadTexture(knowledge01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var knowledge = new THREE.Mesh(
        planeGeometryknowledge,
        planeMaterialknowledge
    );
    knowledge.rotation.x = -0.5 * Math.PI;
    knowledge.position.set(30, 30, -380);

    scene.add(knowledge);
    //會員中心
    const planeGeometrymember = new THREE.PlaneGeometry(100, 180);
    const planeMaterialmember = new THREE.MeshLambertMaterial({
        map: THREE.ImageUtils.loadTexture(memberLeft),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var member = new THREE.Mesh(planeGeometrymember, planeMaterialmember);
    member.rotation.x = -0.5 * Math.PI;
    member.position.set(-180, 30, 200);
    scene.add(member);

    const planeGeometrymemberRight = new THREE.PlaneGeometry(100, 180);
    const planeMaterialmemberRight = new THREE.MeshLambertMaterial({
        map: THREE.ImageUtils.loadTexture(memberRight01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var memberRight = new THREE.Mesh(
        planeGeometrymemberRight,
        planeMaterialmemberRight
    );
    memberRight.rotation.x = -0.5 * Math.PI;
    memberRight.position.set(-20, 30, 200);
    scene.add(memberRight);

    //商城

    const planeGeometryshop = new THREE.PlaneGeometry(160, 140);
    const planeMaterialshop = new THREE.MeshBasicMaterial({
        map: THREE.ImageUtils.loadTexture(market01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var shop = new THREE.Mesh(planeGeometryshop, planeMaterialshop);
    shop.rotation.x = -0.5 * Math.PI;
    shop.position.set(-200, 30, -80);
    scene.add(shop);

    const planeGeometryshopfruit = new THREE.PlaneGeometry(160, 140);
    const planeMaterialshopfruit = new THREE.MeshBasicMaterial({
        map: THREE.ImageUtils.loadTexture(marketfruit03),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var shopfruit = new THREE.Mesh(
        planeGeometryshopfruit,
        planeMaterialshopfruit
    );
    shopfruit.rotation.x = -0.5 * Math.PI;
    shopfruit.position.set(-250, 25, -100);
    scene.add(shopfruit);

    var shopfruittween = TweenMax.fromTo(
        shopfruit.position,
        1, {
            z: -100,
            repeat: -1,
            yoyo: true,
            ease: Power1.easeOut,
        }, {
            z: -105,
            repeat: -1,
            yoyo: true,
            ease: Power1.easeOut,
        }
    );

    const planeGeometrymarketfruit02 = new THREE.PlaneGeometry(100, 70);
    const planeMaterialmarketfruit02 = new THREE.MeshBasicMaterial({
        map: THREE.ImageUtils.loadTexture(marketfruit04),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var marketfruit02 = new THREE.Mesh(
        planeGeometrymarketfruit02,
        planeMaterialmarketfruit02
    );
    marketfruit02.rotation.x = -0.5 * Math.PI;
    marketfruit02.position.set(-175, 30, 30);
    scene.add(marketfruit02);

    //山
    const planeGeometrymont01 = new THREE.PlaneGeometry(130, 130);
    const planeMaterialmont01 = new THREE.MeshBasicMaterial({
        map: THREE.ImageUtils.loadTexture(mont001),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var mont01 = new THREE.Mesh(planeGeometrymont01, planeMaterialmont01);
    mont01.rotation.x = -0.5 * Math.PI;
    mont01.position.set(-20, 40, -60);
    scene.add(mont01);

    const planeGeometrymont02 = new THREE.PlaneGeometry(170, 130);
    const planeMaterialmont02 = new THREE.MeshBasicMaterial({
        map: THREE.ImageUtils.loadTexture(mont002),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var mont02 = new THREE.Mesh(planeGeometrymont02, planeMaterialmont02);
    mont02.rotation.x = -0.5 * Math.PI;
    mont02.position.set(110, 40, -240);
    scene.add(mont02);

    const planeGeometrymont03 = new THREE.PlaneGeometry(80, 40);
    const planeMaterialmont03 = new THREE.MeshBasicMaterial({
        map: THREE.ImageUtils.loadTexture(mont003),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var mont03 = new THREE.Mesh(planeGeometrymont03, planeMaterialmont03);
    mont03.rotation.x = -0.5 * Math.PI;
    mont03.position.set(240, 40, -340);
    scene.add(mont03);

    //樹

    const planeGeometrytree01 = new THREE.PlaneGeometry(80, 70);
    const planeMaterialtree01 = new THREE.MeshBasicMaterial({
        map: THREE.ImageUtils.loadTexture(tree001),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var tree01 = new THREE.Mesh(planeGeometrytree01, planeMaterialtree01);
    tree01.rotation.x = -0.5 * Math.PI;
    tree01.position.set(0, 40, -300);
    scene.add(tree01);

    const planeGeometrytree02 = new THREE.PlaneGeometry(70, 90);
    const planeMaterialtree02 = new THREE.MeshBasicMaterial({
        map: THREE.ImageUtils.loadTexture(tree002),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var tree02 = new THREE.Mesh(planeGeometrytree02, planeMaterialtree02);
    tree02.rotation.x = -0.5 * Math.PI;
    tree02.position.set(130, 40, -360);
    scene.add(tree02);

    //部落格
    const planeGeometryblog = new THREE.PlaneGeometry(130, 160);
    const planeMaterialblog = new THREE.MeshLambertMaterial({
        map: THREE.ImageUtils.loadTexture(blog01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var blog = new THREE.Mesh(planeGeometryblog, planeMaterialblog);
    blog.rotation.x = -0.5 * Math.PI;
    blog.position.set(180, 50, -100);
    scene.add(blog);

    const planeGeometryblogwatermelon = new THREE.PlaneGeometry(60, 40);
    const planeMaterialblogwatermelon = new THREE.MeshLambertMaterial({
        map: THREE.ImageUtils.loadTexture(blogwatermelon01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var blogwatermelon = new THREE.Mesh(
        planeGeometryblogwatermelon,
        planeMaterialblogwatermelon
    );
    blogwatermelon.rotation.x = -0.5 * Math.PI;
    blogwatermelon.position.set(153, 60, -115);
    scene.add(blogwatermelon);

    var blogwatermelon = TweenMax.fromTo(
        blogwatermelon.position,
        1, {
            z: -115,
            repeat: -1,
            yoyo: true,
            ease: Power1.easeOut,
        }, {
            z: -130,
            repeat: -1,
            yoyo: true,
            ease: Power1.easeOut,
        }
    );

    //水梨
    const planeGeometrywaterpear = new THREE.PlaneGeometry(40, 30);
    const planeMaterialwaterpear = new THREE.MeshLambertMaterial({
        map: THREE.ImageUtils.loadTexture(waterpear01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var waterpear = new THREE.Mesh(
        planeGeometrywaterpear,
        planeMaterialwaterpear
    );
    waterpear.rotation.x = -0.5 * Math.PI;
    waterpear.position.set(70, 50, -300);
    scene.add(waterpear);

    const planeGeometrywaterpearline = new THREE.PlaneGeometry(180, 140);
    const planeMaterialwaterpearline = new THREE.MeshLambertMaterial({
        map: THREE.ImageUtils.loadTexture(waterpearline01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var waterpearline = new THREE.Mesh(
        planeGeometrywaterpearline,
        planeMaterialwaterpearline
    );
    waterpearline.rotation.x = -0.5 * Math.PI;
    waterpearline.position.set(20, 45, -210);
    scene.add(waterpearline);

    //箱子
    const planeGeometryfruitbox = new THREE.PlaneGeometry(40, 40);
    const planeMaterialfruitbox = new THREE.MeshLambertMaterial({
        map: THREE.ImageUtils.loadTexture(fruitbox01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var fruitbox = new THREE.Mesh(planeGeometryfruitbox, planeMaterialfruitbox);
    fruitbox.rotation.x = -0.5 * Math.PI;
    fruitbox.position.set(90, 50, -50);
    scene.add(fruitbox);

    const planeGeometryfruitboxline = new THREE.PlaneGeometry(110, 80);
    const planeMaterialfruitboxline = new THREE.MeshLambertMaterial({
        map: THREE.ImageUtils.loadTexture(fruitboxline01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9,
    });
    var fruitboxline = new THREE.Mesh(
        planeGeometryfruitboxline,
        planeMaterialfruitboxline
    );
    fruitboxline.rotation.x = -0.5 * Math.PI;
    fruitboxline.position.set(10, 45, 20);
    scene.add(fruitboxline);

    //  spotlight 照亮物體
    var light = new THREE.AmbientLight(0xffffff);
    light.position.set(2000, 2000, 2000);
    scene.add(light);
    // let spotHelper = new THREE.SpotLightHelper(spotLight)
    // scene.add(spotHelper)

    // 將渲染出來的畫面放到網頁上的 DOM
    document.body.appendChild(renderer.domElement);

    // var controls = new THREE.OrbitControls(camera, renderer.domElement);
    // controls.target.set(0, 0.5, 0); //控制焦點

    var requestId = null;
    var triggerOffset = document.documentElement.clientHeight / 2;
    var tl = new TimelineMax({
            paused: true,
            useFrames: true,
        })
        .to(
            camera.position, {
                ease: Power3.easeInOut,

                duration: 3000,
                onUpdate: function () {
                    camera.lookAt(0, 800, 0);
                },
                x: 0,
                y: 900,
                z: 0,
            },
            0
        )
        .to(
            camera.position, {
                ease: Power3.easeInOut,

                duration: 2000,
                onUpdate: function () {
                    camera.lookAt(camera.position.x, 100, camera.position.z);
                },
                x: 22,
                y: 300,
                z: -420,
            },
            4000
        )
        .to(
            camera.position, {
                ease: Power1.easeInOut,
                duration: 1500,
                onUpdate: function () {
                    camera.lookAt(camera.position.x, 100, camera.position.z);
                },
                x: 22,
                y: 300,
                z: -420,
            },
            6500
        )
        .to(
            waterpear.position, {
                ease: Power1.easeInOut,
                duration: 2000,
                motionPath: {
                    path: [{
                            x: 70,
                            z: -300,
                        },
                        {
                            x: 40,
                            z: -250,
                        },
                        {
                            x: 10,
                            z: -200,
                        },
                        {
                            x: -20,
                            z: -150,
                        },
                        {
                            x: -45,
                            z: -120,
                        },
                    ],
                    curviness: 1,
                },
            },
            8500
        )
        .to(
            camera.position, {
                ease: Power1.easeInOut,
                duration: 2000,
                onUpdate: function () {
                    camera.lookAt(camera.position.x, 100, camera.position.z);
                },
                x: -200,
                y: 300,
                z: -100,
            },
            8500
        )
        .to(
            waterpear.position, {
                ease: Power1.easeInOut,
                duration: 3000,
                motionPath: {
                    type: "quadratic",
                    path: [{
                            x: -80,
                            z: -190,
                        },
                        {
                            x: 0,
                            z: -180,
                        },
                        {
                            x: 30,
                            z: -165,
                        },
                        {
                            x: 110,
                            z: -180,
                        },
                    ],
                    curviness: 1,
                },
            },
            11500
        )
        .to(
            camera.position, {
                ease: Power1.easeInOut,
                duration: 3000,
                onUpdate: function () {
                    camera.lookAt(camera.position.x, 100, camera.position.z);
                },
                x: 180,
                y: 300,
                z: -100,
            },
            11500
        )
        .to(
            fruitbox.position, {
                ease: Power1.easeInOut,
                duration: 4000,
                motionPath: {
                    type: "quadratic",
                    path: [{
                            x: 90,
                            z: -50,
                        },
                        {
                            x: 0,
                            z: 70,
                        },
                    ],
                    curviness: 1,
                },
            },
            16500
        )
        .to(
            camera.position, {
                ease: Power1.easeInOut,
                duration: 4000,
                onUpdate: function () {
                    camera.lookAt(camera.position.x, 100, camera.position.z);
                },

                x: -100,
                y: 300,
                z: 200,
            },
            16500
        )
        .to(
            member.position, {
                ease: Power1.easeInOut,
                duration: 2000,

                x: -250,
            },
            18500
        )
        .to(
            memberRight.position, {
                ease: Power1.easeInOut,
                duration: 2000,

                x: 50,
            },
            18500
        )
        .to(
            camera.position, {
                ease: Power1.easeInOut,
                duration: 3000,
                onUpdate: function () {
                    camera.lookAt(camera.position.x, 100, camera.position.z);
                },

                x: -100,
                y: 900,
                z: 200,
            },
            22500
        )
        .to(
            camera.position, {
                ease: Power1.easeInOut,
                duration: 3000,
                onUpdate: function () {
                    camera.lookAt(camera.position.x, 100, camera.position.z);
                },

                x: 0,
                y: 900,
                z: 0,
            },
            22500
        )
        .to(
            camera.position, {
                ease: Power1.easeInOut,
                duration: 3000,
                onUpdate: function () {
                    camera.lookAt(0, 800, 0);
                },

                x: 0,
                y: 900,
                z: 1400,
            },
            26500
        );

    // Set timeline time to scrollTop
    function update() {
        tl.time(window.pageYOffset + triggerOffset);
        requestId = null;
    }

    // Only update on animation frames
    window.addEventListener("scroll", function () {
        if (!requestId) {
            requestId = requestAnimationFrame(update);
        }
    });

    update();
}

function render() {
    requestAnimationFrame(render);
    renderer.render(scene, camera);
    renderer.setClearColor(new THREE.Color("rgb(255, 212, 195)"), 1);
}

window.addEventListener("resize", function () {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
});

init();
render();