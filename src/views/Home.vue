<template>
  <div id="test" class="home">
    <homePage />
  </div>
</template>
<script>
import homePage from "@/components/homePage";
import $ from "jquery";
import * as THREE from "three";
import { gsap, TweenMax, Power1, Power3, TimelineMax, Linear } from "gsap";
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

export default {
  name: "Home",
  components: {
    homePage
  },
  mounted() {
    gsap.registerPlugin(MotionPathPlugin);

    let renderer, scene, camera;

    function init() {
      scene = new THREE.Scene();

      //相機設定與 OrbitControls

      let camerafov = 60;

      if (window.innerWidth <= 574) {
        camerafov = 90;
      } else if (window.innerWidth <= 1199) {
        camerafov = 80;
      } else {
        camerafov = 60;
      }
      camera = new THREE.PerspectiveCamera(
        camerafov,
        window.innerWidth / window.innerHeight,
        0.1,
        2800
      );

      camera.position.set(0, 800, 1500);
      camera.lookAt(0, 800, 0);

      // 渲染器設定
      renderer = new THREE.WebGLRenderer({ alpha: true });

      renderer.setSize(window.innerWidth, window.innerHeight);

      let loader = new THREE.TextureLoader();

      loader.load(cloudWhite);
      loader.load(cloud2White);
      loader.load(cloudGreen);
      loader.load(cloud2Green);
      loader.load(cloudSkin);
      loader.load(cloudPink);
      loader.load(cloudsmoke);
      loader.load(cloudlight01);
      loader.load(cloudlight02);

      var geometry = new THREE.PlaneGeometry(300, 160);
      var materialcloud1 = new THREE.MeshBasicMaterial({
        map: loader.load(cloudWhite),
        transparent: true,
        depthWrite: false,
        alphaTest: 0.7
      });
      materialcloud1.map.minFilter = THREE.LinearFilter;
      var materialcloud2 = new THREE.MeshBasicMaterial({
        map: loader.load(cloud2White),
        transparent: true,
        depthWrite: false,
        alphaTest: 0.2
      });
      materialcloud2.map.minFilter = THREE.LinearFilter;
      var materialcloud3 = new THREE.MeshBasicMaterial({
        map: loader.load(cloudGreen),
        transparent: true,
        depthWrite: false,
        alphaTest: 0
      });
      materialcloud3.map.minFilter = THREE.LinearFilter;
      var materialcloud4 = new THREE.MeshBasicMaterial({
        map: loader.load(cloud2Green),
        transparent: true,
        depthWrite: false,
        alphaTest: 0.8
      });
      materialcloud4.map.minFilter = THREE.LinearFilter;
      var materialcloud5 = new THREE.MeshBasicMaterial({
        map: loader.load(cloudSkin),
        transparent: true,
        depthWrite: false,
        alphaTest: 0.5
      });
      materialcloud5.map.minFilter = THREE.LinearFilter;
      var materialcloud6 = new THREE.MeshBasicMaterial({
        map: loader.load(cloudPink),
        transparent: true,
        depthWrite: false,
        alphaTest: 0.6
      });
      materialcloud6.map.minFilter = THREE.LinearFilter;

      var materialcloud7 = new THREE.MeshBasicMaterial({
        map: loader.load(cloudsmoke),
        transparent: true,
        depthWrite: false,
        alphaTest: 0.8
      });
      materialcloud7.map.minFilter = THREE.LinearFilter;

      var materialcloudlight = new THREE.MeshBasicMaterial({
        map: loader.load(cloudlight01),
        transparent: true,
        depthWrite: false,
        alphaTest: 0,
        blending: THREE.CustomBlending,
        blendSrc: THREE.OneFactor,
        blendDst: THREE.OneMinusSrcAlphaFactor
      });

      var materialcloudlight2 = new THREE.MeshBasicMaterial({
        map: loader.load(cloudlight02),
        transparent: true,
        depthWrite: false,
        alphaTest: 0,
        blending: THREE.CustomBlending,
        blendSrc: THREE.OneFactor,
        blendDst: THREE.OneMinusSrcAlphaFactor
      });

      // instantiate a loader
      let cloud1 = new THREE.Mesh(geometry, materialcloud1);
      cloud1.position.set(180, 680, 1200);
      scene.add(cloud1);

      TweenMax.to(cloud1.position, 40, {
        x: 400,
        repeat: -1,
        yoyo: true,
        ease: Linear.easeIn
      });

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

      let cloud5 = new THREE.Mesh(
        new THREE.PlaneGeometry(140, 90),
        materialcloud6
      );
      cloud5.position.set(-200, 690, 1100);
      scene.add(cloud5);

      TweenMax.to(cloud5.position, 30, {
        x: -300,
        repeat: -1,
        yoyo: true,
        ease: Linear.easeIn
      });

      let cloud6 = new THREE.Mesh(
        new THREE.PlaneGeometry(360, 240),
        materialcloud2
      );
      cloud6.position.set(-350, 950, 1000);
      scene.add(cloud6);

      TweenMax.to(cloud6.position, 40, {
        x: -300,
        repeat: -1,
        yoyo: true,
        ease: Linear.easeIn
      });

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

      TweenMax.to(cloud7.position, 40, {
        x: -100,
        repeat: -1,
        yoyo: true,
        ease: Linear.easeIn
      });

      let cloud8 = new THREE.Mesh(
        new THREE.PlaneGeometry(220, 150),
        materialcloud1
      );
      cloud8.position.set(-220, 680, 900);
      scene.add(cloud8);

      TweenMax.to(cloud8.position, 30, {
        x: -320,
        repeat: -1,
        yoyo: true,
        ease: Linear.easeIn
      });

      let cloud9 = new THREE.Mesh(
        new THREE.PlaneGeometry(2020, 1250),
        materialcloud2
      );
      cloud9.position.set(0, 200, 300);
      scene.add(cloud9);

      TweenMax.to(cloud9.position, 40, {
        x: 400,
        repeat: -1,
        yoyo: true,
        ease: Linear.easeIn
      });

      let cloud10 = new THREE.Mesh(
        new THREE.PlaneGeometry(360, 240),
        materialcloud2
      );
      cloud10.position.set(0, 1300, 600);
      scene.add(cloud10);

      let cloud11 = new THREE.Mesh(
        new THREE.PlaneGeometry(280, 150),
        materialcloud5
      );
      cloud11.position.set(-1200, 900, 0);
      scene.add(cloud11);

      TweenMax.to(cloud11.position, 30, {
        x: -900,
        repeat: -1,
        yoyo: true,
        ease: Linear.easeIn
      });

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

      TweenMax.to(cloud14.position, 30, {
        x: 400,
        repeat: -1,
        yoyo: true,
        ease: Linear.easeIn
      });

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

      let cloud19 = new THREE.Mesh(
        new THREE.PlaneGeometry(50, 30),
        materialcloud6
      );
      cloud19.position.set(100, 250, -185);
      cloud19.rotation.x = -0.5 * Math.PI;
      scene.add(cloud19);

      let cloud20 = new THREE.Mesh(
        new THREE.PlaneGeometry(50, 30),
        materialcloud1
      );
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

      let cloud22 = new THREE.Mesh(
        new THREE.PlaneGeometry(70, 35),
        materialcloud5
      );
      cloud22.position.set(100, 250, -10);
      cloud22.rotation.x = -0.5 * Math.PI;
      scene.add(cloud22);

      let cloud23 = new THREE.Mesh(
        new THREE.PlaneGeometry(40, 20),
        materialcloud7
      );
      cloud23.position.set(150, 250, -310);
      cloud23.rotation.x = -0.5 * Math.PI;
      scene.add(cloud23);

      let cloud24 = new THREE.Mesh(
        new THREE.PlaneGeometry(40, 20),
        materialcloud7
      );
      cloud24.position.set(170, 251, -300);
      cloud24.rotation.x = -0.5 * Math.PI;
      scene.add(cloud24);

      //台灣
      const planeGeometry = new THREE.PlaneGeometry(600, 900);
      const planeMaterial = new THREE.MeshLambertMaterial({
        map: loader.load(taiwan),
        transparent: true,
        depthWrite: false,
        opacity: 0.5
      });
      planeMaterial.map.minFilter = THREE.LinearFilter;
      let plane = new THREE.Mesh(planeGeometry, planeMaterial);
      plane.rotation.x = -0.5 * Math.PI;
      plane.position.set(0, 0, 0);

      scene.add(plane);

      // const planeGeometry1 = new THREE.PlaneGeometry(430, 500);
      // const planeMaterial1 = new THREE.MeshLambertMaterial({
      //     map: loader.load('treemont.png'),
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
        map: loader.load(knowledgeHead),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialknowledgehead.map.minFilter = THREE.LinearFilter;
      var knowledgehead = new THREE.Mesh(
        planeGeometryknowledgehead,
        planeMaterialknowledgehead
      );
      knowledgehead.rotation.x = -0.5 * Math.PI;
      knowledgehead.position.set(22, 31, -449);

      scene.add(knowledgehead);
      TweenMax.fromTo(
        knowledgehead.position,
        1,
        {
          x: 50,
          z: -448,
          repeat: -1,
          yoyo: true
        },
        {
          x: 51,
          z: -449,
          repeat: -1,
          yoyo: true
        }
      );

      const planeGeometryknowledge = new THREE.PlaneGeometry(160, 120);
      const planeMaterialknowledge = new THREE.MeshLambertMaterial({
        map: loader.load(knowledge01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialknowledge.map.minFilter = THREE.LinearFilter;
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
        map: loader.load(memberLeft),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialmember.map.minFilter = THREE.LinearFilter;
      var member = new THREE.Mesh(planeGeometrymember, planeMaterialmember);
      member.rotation.x = -0.5 * Math.PI;
      member.position.set(-180, 30, 200);
      scene.add(member);

      const planeGeometrymemberRight = new THREE.PlaneGeometry(100, 180);
      const planeMaterialmemberRight = new THREE.MeshLambertMaterial({
        map: loader.load(memberRight01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialmemberRight.map.minFilter = THREE.LinearFilter;
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
        map: loader.load(market01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialshop.map.minFilter = THREE.LinearFilter;
      var shop = new THREE.Mesh(planeGeometryshop, planeMaterialshop);
      shop.rotation.x = -0.5 * Math.PI;
      shop.position.set(-200, 30, -80);
      scene.add(shop);

      const planeGeometryshopfruit = new THREE.PlaneGeometry(160, 140);
      const planeMaterialshopfruit = new THREE.MeshBasicMaterial({
        map: loader.load(marketfruit03),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialshopfruit.map.minFilter = THREE.LinearFilter;
      var shopfruit = new THREE.Mesh(
        planeGeometryshopfruit,
        planeMaterialshopfruit
      );
      shopfruit.rotation.x = -0.5 * Math.PI;
      shopfruit.position.set(-250, 25, -100);
      scene.add(shopfruit);

      TweenMax.fromTo(
        shopfruit.position,
        1,
        {
          z: -100,
          repeat: -1,
          yoyo: true,
          ease: Power1.easeOut
        },
        {
          z: -130,
          repeat: -1,
          yoyo: true,
          ease: Power1.easeOut
        }
      );

      const planeGeometrymarketfruit02 = new THREE.PlaneGeometry(100, 70);
      const planeMaterialmarketfruit02 = new THREE.MeshBasicMaterial({
        map: loader.load(marketfruit04),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialmarketfruit02.map.minFilter = THREE.LinearFilter;
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
        map: loader.load(mont001),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialmont01.map.minFilter = THREE.LinearFilter;
      var mont01 = new THREE.Mesh(planeGeometrymont01, planeMaterialmont01);
      mont01.rotation.x = -0.5 * Math.PI;
      mont01.position.set(-20, 40, -60);
      scene.add(mont01);

      const planeGeometrymont02 = new THREE.PlaneGeometry(170, 130);
      const planeMaterialmont02 = new THREE.MeshBasicMaterial({
        map: loader.load(mont002),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialmont02.map.minFilter = THREE.LinearFilter;
      var mont02 = new THREE.Mesh(planeGeometrymont02, planeMaterialmont02);
      mont02.rotation.x = -0.5 * Math.PI;
      mont02.position.set(110, 40, -240);
      scene.add(mont02);

      const planeGeometrymont03 = new THREE.PlaneGeometry(80, 40);
      const planeMaterialmont03 = new THREE.MeshBasicMaterial({
        map: loader.load(mont003),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialmont03.map.minFilter = THREE.LinearFilter;
      var mont03 = new THREE.Mesh(planeGeometrymont03, planeMaterialmont03);
      mont03.rotation.x = -0.5 * Math.PI;
      mont03.position.set(240, 40, -340);
      scene.add(mont03);

      //樹

      const planeGeometrytree01 = new THREE.PlaneGeometry(80, 70);
      const planeMaterialtree01 = new THREE.MeshBasicMaterial({
        map: loader.load(tree001),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialtree01.map.minFilter = THREE.LinearFilter;
      var tree01 = new THREE.Mesh(planeGeometrytree01, planeMaterialtree01);
      tree01.rotation.x = -0.5 * Math.PI;
      tree01.position.set(0, 40, -300);
      scene.add(tree01);

      const planeGeometrytree02 = new THREE.PlaneGeometry(70, 90);
      const planeMaterialtree02 = new THREE.MeshBasicMaterial({
        map: loader.load(tree002),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialtree02.map.minFilter = THREE.LinearFilter;
      var tree02 = new THREE.Mesh(planeGeometrytree02, planeMaterialtree02);
      tree02.rotation.x = -0.5 * Math.PI;
      tree02.position.set(130, 40, -360);
      scene.add(tree02);

      //部落格
      const planeGeometryblog = new THREE.PlaneGeometry(130, 160);
      const planeMaterialblog = new THREE.MeshLambertMaterial({
        map: loader.load(blog01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialblog.map.minFilter = THREE.LinearFilter;
      var blog = new THREE.Mesh(planeGeometryblog, planeMaterialblog);
      blog.rotation.x = -0.5 * Math.PI;
      blog.position.set(180, 50, -100);
      scene.add(blog);

      const planeGeometryblogwatermelon = new THREE.PlaneGeometry(60, 40);
      const planeMaterialblogwatermelon = new THREE.MeshLambertMaterial({
        map: loader.load(blogwatermelon01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialblogwatermelon.map.minFilter = THREE.LinearFilter;
      var blogwatermelon = new THREE.Mesh(
        planeGeometryblogwatermelon,
        planeMaterialblogwatermelon
      );
      blogwatermelon.rotation.x = -0.5 * Math.PI;
      blogwatermelon.position.set(153, 60, -115);
      scene.add(blogwatermelon);

      TweenMax.fromTo(
        blogwatermelon.position,
        1,
        {
          z: -115,
          repeat: -1,
          yoyo: true,
          ease: Power1.easeOut
        },
        {
          z: -130,
          repeat: -1,
          yoyo: true,
          ease: Power1.easeOut
        }
      );

      //水梨
      const planeGeometrywaterpear = new THREE.PlaneGeometry(40, 30);
      const planeMaterialwaterpear = new THREE.MeshLambertMaterial({
        map: loader.load(waterpear01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialwaterpear.map.minFilter = THREE.LinearFilter;
      var waterpear = new THREE.Mesh(
        planeGeometrywaterpear,
        planeMaterialwaterpear
      );
      waterpear.rotation.x = -0.5 * Math.PI;
      waterpear.position.set(70, 50, -300);
      scene.add(waterpear);

      const planeGeometrywaterpearline = new THREE.PlaneGeometry(180, 140);
      const planeMaterialwaterpearline = new THREE.MeshLambertMaterial({
        map: loader.load(waterpearline01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialwaterpearline.map.minFilter = THREE.LinearFilter;
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
        map: loader.load(fruitbox01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialfruitbox.map.minFilter = THREE.LinearFilter;
      var fruitbox = new THREE.Mesh(
        planeGeometryfruitbox,
        planeMaterialfruitbox
      );
      fruitbox.rotation.x = -0.5 * Math.PI;
      fruitbox.position.set(90, 50, -50);
      scene.add(fruitbox);

      const planeGeometryfruitboxline = new THREE.PlaneGeometry(110, 80);
      const planeMaterialfruitboxline = new THREE.MeshLambertMaterial({
        map: loader.load(fruitboxline01),
        transparent: true,
        depthWrite: false,
        opacity: 0.9
      });
      planeMaterialfruitboxline.map.minFilter = THREE.LinearFilter;
      var fruitboxline = new THREE.Mesh(
        planeGeometryfruitboxline,
        planeMaterialfruitboxline
      );
      fruitboxline.rotation.x = -0.5 * Math.PI;
      fruitboxline.position.set(10, 45, 20);
      scene.add(fruitboxline);

      //spotlight 照亮物體
      var light = new THREE.AmbientLight(0xffffff);
      light.position.set(2000, 2000, 2000);
      scene.add(light);
      // let spotHelper = new THREE.SpotLightHelper(spotLight)
      // scene.add(spotHelper)

      // 將渲染出來的畫面放到網頁上的 DOM
      const div = document.getElementById("test");

      div.appendChild(renderer.domElement);
      // document.body.appendChild(renderer.domElement);

      // var controls = new THREE.OrbitControls(camera, renderer.domElement);
      // controls.target.set(0, 0.5, 0); //控制焦點

      var requestId = null;
      var triggerOffset = document.documentElement.clientHeight / 2;
      var tl = new TimelineMax({
        paused: true,
        useFrames: true
      })
        .to(
          camera.position,
          {
            ease: Power3.easeInOut,

            duration: 3000,

            onUpdate: function() {
              camera.lookAt(0, 800, 0);
              if (window.pageYOffset > 500) {
                $("div#mainLOGO").fadeOut();
              } else {
                $("div#mainLOGO").fadeIn();
              }
            },
            x: 0,
            y: 900,
            z: 0
          },
          0
        )
        .to(
          camera.position,
          {
            ease: Power3.easeInOut,

            duration: 2000,
            onUpdate: function() {
              camera.lookAt(camera.position.x, 100, camera.position.z);
            },
            x: 22,
            y: 300,
            z: -420
          },
          4000
        )
        .to(
          camera.position,
          {
            ease: Power1.easeInOut,
            duration: 1500,
            onUpdate: function() {
              camera.lookAt(camera.position.x, 100, camera.position.z);
            },

            x: 22,
            y: 300,
            z: -420
          },
          6500
        )
        .to(
          waterpear.position,
          {
            ease: Power1.easeInOut,
            duration: 2000,
            motionPath: {
              path: [
                {
                  x: 70,
                  z: -300
                },
                {
                  x: 40,
                  z: -250
                },
                {
                  x: 10,
                  z: -200
                },
                {
                  x: -20,
                  z: -150
                },
                {
                  x: -45,
                  z: -120
                }
              ],
              curviness: 1
            }
          },
          8500
        )
        .to(
          camera.position,
          {
            ease: Power1.easeInOut,
            duration: 2000,
            onUpdate: function() {
              camera.lookAt(camera.position.x, 100, camera.position.z);
            },
            x: -200,
            y: 300,
            z: -100
          },
          8500
        )
        .to(
          waterpear.position,
          {
            ease: Power1.easeInOut,
            duration: 3000,
            motionPath: {
              type: "quadratic",
              path: [
                {
                  x: -80,
                  z: -190
                },
                {
                  x: 0,
                  z: -180
                },
                {
                  x: 30,
                  z: -165
                },
                {
                  x: 110,
                  z: -180
                }
              ],
              curviness: 1
            }
          },
          13500
        )
        .to(
          camera.position,
          {
            ease: Power1.easeInOut,
            duration: 3000,
            onUpdate: function() {
              camera.lookAt(camera.position.x, 100, camera.position.z);
            },
            x: 180,
            y: 300,
            z: -100
          },
          13500
        )
        .to(
          fruitbox.position,
          {
            ease: Power1.easeInOut,
            duration: 4000,
            motionPath: {
              type: "quadratic",
              path: [
                {
                  x: 90,
                  z: -50
                },
                {
                  x: 0,
                  z: 70
                }
              ],
              curviness: 1
            }
          },
          19500
        )
        .to(
          camera.position,
          {
            ease: Power1.easeInOut,
            duration: 4000,
            onUpdate: function() {
              camera.lookAt(camera.position.x, 100, camera.position.z);
            },

            x: -100,
            y: 300,
            z: 200
          },
          19500
        )
        .to(
          member.position,
          {
            ease: Power1.easeInOut,
            duration: 2000,

            x: -250
          },
          20500
        )
        .to(
          memberRight.position,
          {
            ease: Power1.easeInOut,
            duration: 2000,

            x: 50
          },
          20500
        )
        .to(
          camera.position,
          {
            ease: Power1.easeInOut,
            duration: 3000,
            onUpdate: function() {
              camera.lookAt(camera.position.x, 100, camera.position.z);
            },

            x: -100,
            y: 900,
            z: 200
          },
          25500
        )
        .to(
          camera.position,
          {
            ease: Power1.easeInOut,
            duration: 3000,
            onUpdate: function() {
              camera.lookAt(camera.position.x, 100, camera.position.z);
            },

            x: 0,
            y: 900,
            z: 0
          },
          25500
        )
        .to(
          camera.position,
          {
            ease: Power1.easeInOut,
            duration: 3000,
            onUpdate: function() {
              camera.lookAt(0, 800, 0);
            },

            x: 0,
            y: 900,
            z: 1400
          },
          28500
        );

      function htmlelement() {
        if (window.pageYOffset > 800 && window.pageYOffset < 1300) {
          $("div#mainText").fadeIn();
        } else {
          $("div#mainText").fadeOut();
        }

        if (window.pageYOffset > 5500 && window.pageYOffset < 7500) {
          $("#knowledge_container").fadeIn();
          $(".home_title::before").css({
            bottom: "-19px"
          });
        } else {
          $("#knowledge_container").fadeOut();
        }
        if (window.pageYOffset > 10000 && window.pageYOffset < 13000) {
          $("#market_container").fadeIn();
        } else {
          $("#market_container").fadeOut();
        }
        if (window.pageYOffset > 16000 && window.pageYOffset < 19000) {
          $("#blog_container").fadeIn();
        } else {
          $("#blog_container").fadeOut();
        }
        if (window.pageYOffset > 22500 && window.pageYOffset < 25000) {
          $("#member_container").fadeIn();
        } else {
          $("#member_container").fadeOut();
        }

        if (window.pageYOffset > 30000) {
          $(".home_footer").fadeIn();
        } else {
          $(".home_footer").fadeOut();
        }

        if (window.pageYOffset > 32000) {
          $("#scroll_btn").html("&#9650;");
        } else {
          $("#scroll_btn").html("&#9660;");
        }
      }

      function scrollsection() {
        if (window.pageYOffset >= 0 && window.pageYOffset < 5500) {
          $(".scroll_section_btn").removeClass("scroll_section_btn_add");
          $("#scroll_top").addClass("scroll_section_btn_add");
        } else if (window.pageYOffset >= 5500 && window.pageYOffset < 7500) {
          $(".scroll_section_btn").removeClass("scroll_section_btn_add");
          $("#scroll_knowledge").addClass("scroll_section_btn_add");
        } else if (window.pageYOffset >= 7500 && window.pageYOffset < 13000) {
          $(".scroll_section_btn").removeClass("scroll_section_btn_add");
          $("#scroll_market").addClass("scroll_section_btn_add");
        } else if (window.pageYOffset >= 13000 && window.pageYOffset < 19000) {
          $(".scroll_section_btn").removeClass("scroll_section_btn_add");
          $("#scroll_blog").addClass("scroll_section_btn_add");
        } else if (window.pageYOffset >= 19000 && window.pageYOffset < 25000) {
          $(".scroll_section_btn").removeClass("scroll_section_btn_add");
          $("#scroll_member").addClass("scroll_section_btn_add");
        } else {
          $(".scroll_section_btn").removeClass("scroll_section_btn_add");
          $("#scroll_footer").addClass("scroll_section_btn_add");
        }
      }

      // Set timeline time to scrollTop
      function update() {
        tl.time(window.pageYOffset + triggerOffset);
        requestId = null;
      }

      // Only update on animation frames
      window.addEventListener("scroll", function() {
        // $(function() {
        //   if ($(window).scrollTop() > 0 || $(window).scrollLeft() > 0) {
        //     $("#nav").css({ "background-color": "whitesmoke", opacity: "0.9" });
        //   } else {
        //     $("#nav").css({ "background-color": "transparent" });
        //   }
        // });
        if (!requestId) {
          requestId = requestAnimationFrame(update);
        }
        htmlelement();
        scrollsection();
      });
      scrollsection();
      update();
    }
    init();

    function render() {
      requestAnimationFrame(render);
      renderer.render(scene, camera);
      renderer.setClearColor(new THREE.Color("rgb(255, 212, 195)"), 1);
    }

    window.addEventListener("resize", function() {
      if (window.innerWidth <= 574) {
        camera.fov = 90;
      } else if (window.innerWidth <= 1199) {
        camera.fov = 80;
      } else {
        camera.fov = 60;
      }

      if (window.innerWidth <= 767) {
        $("#scroll_section").css({ display: "none" });
        $("#scroll_btn").css({ display: "block" });
      } else {
        $("#scroll_section").css({ display: "block" });
        $("#scroll_btn").css({ display: "none" });
      }
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
      renderer.setSize(window.innerWidth, window.innerHeight);
    });

    if (window.innerWidth <= 767) {
      $("#scroll_section").css({ display: "none" });
      $("#scroll_btn").css({ display: "block" });
    } else {
      $("#scroll_section").css({ display: "block" });
      $("#scroll_btn").css({ display: "none" });
    }

    // const home = document.getElementById("home");

    // home.addEventListener("click", init);
    // home.addEventListener("click", render);

    render();

    $(function() {
      $("div.tab").on("click", function() {
        /* 將頁籤列表移除所有 -on，再將指定的加上 -on */
        $(this)
          .closest(".season")
          .find("div.tab")
          .removeClass("-on");
        $(this).addClass("-on");

        /* 找到對應的頁籤內容，加上 -on 來顯示 */
        $("div.knowledge_page").removeClass("-on");
        $("div.knowledge_page." + $(this).attr("data-target")).addClass("-on");
      });
    });
    // $(function() {
    //   // hamburger icon 的切換
    // //   $("div.hamburger").on("click", function() {
    // //     $(this).toggleClass("is-active");
    // //     $("div.nav_back").slideToggle();
    // //     $("#nav").toggleClass("is-active");
    // //   });
    // // });
    // $(function() {
    //   $("a.page").on("click", function() {
    //     if ($("div.hamburger").hasClass("is-active") == true) {
    //       $("div.nav_back").slideToggle();
    //       $("div.hamburger").removeClass("is-active");
    //     }
    //   });
    //   // $("img.logo").on("click", function() {
    //   //   if ($("div.hamburger").hasClass("is-active") == true) {
    //   //     $("div.nav_back").slideToggle();
    //   //     $("div.hamburger").removeClass("is-active");
    //   //   }
    //   // });
    //   $("a.login_logout").on("click", function() {
    //     if ($("div.hamburger").hasClass("is-active") == true) {
    //       $("div.nav_back").slideToggle();
    //       $("div.hamburger").removeClass("is-active");
    //     }
    //   });
    // });

    $(function() {
      function stopScrolling(e) {
        e.preventDefault();
        e.stopPropagation();
        return false;
      }

      function btnStop() {
        $("#scroll_btn").attr("disabled", false);
        $("html").off("scroll mousewheel touchmove", stopScrolling);
      }

      function scrollbtnStop() {
        $(".scroll_section_btn").attr("disabled", false);
      }

      $("#scroll_btn").on("click", function() {
        $("#scroll_btn").attr("disabled", true);

        if (window.pageYOffset >= 0 && window.pageYOffset < 7400) {
          $("html").animate(
            { scrollTop: 7400 },
            (7400 - window.pageYOffset) / 2
          );
          setTimeout(btnStop, (7400 - window.pageYOffset) / 2);

          $("html").on("scroll mousewheel touchmove", stopScrolling);
        } else if (window.pageYOffset >= 7400 && window.pageYOffset < 12900) {
          $("html").animate(
            { scrollTop: 12900 },
            (12900 - window.pageYOffset) / 2
          );
          setTimeout(btnStop, (12900 - window.pageYOffset) / 2);

          $("html").on("scroll mousewheel touchmove", stopScrolling);
        } else if (window.pageYOffset >= 12900 && window.pageYOffset < 18900) {
          $("html").animate(
            { scrollTop: 18900 },
            (18900 - window.pageYOffset) / 2
          );
          setTimeout(btnStop, (18900 - window.pageYOffset) / 2);

          $("html").on("scroll mousewheel touchmove", stopScrolling);
        } else if (window.pageYOffset >= 18900 && window.pageYOffset < 24900) {
          $("html").animate(
            { scrollTop: 24900 },
            (24900 - window.pageYOffset) / 2
          );
          setTimeout(btnStop, (24900 - window.pageYOffset) / 2);

          $("html").on("scroll mousewheel touchmove", stopScrolling);
        } else if (window.pageYOffset >= 24900 && window.pageYOffset < 31900) {
          $("html").animate(
            { scrollTop: 33000 },
            (33000 - window.pageYOffset) / 2
          );
          setTimeout(btnStop, (33000 - window.pageYOffset) / 2);

          $("html").on("scroll mousewheel touchmove", stopScrolling);
          $("#scroll_btn").html("&#9650;");
        } else {
          $("html").animate({ scrollTop: 0 }, 5000);
          setTimeout(btnStop, 5000);
          $("html").on("scroll mousewheel touchmove", stopScrolling);
        }
      });

      $("#scroll_top").on("click", function() {
        $(".scroll_section_btn").attr("disabled", true);
        $("html").animate({ scrollTop: 0 }, 2000);
        setTimeout(scrollbtnStop, 2000);
      });
      $("#scroll_knowledge").on("click", function() {
        $(".scroll_section_btn").attr("disabled", true);
        $("html").animate({ scrollTop: 7400 }, 2000);
        setTimeout(scrollbtnStop, 2000);
      });
      $("#scroll_market").on("click", function() {
        $(".scroll_section_btn").attr("disabled", true);
        $("html").animate({ scrollTop: 12900 }, 2000);
        setTimeout(scrollbtnStop, 2000);
      });
      $("#scroll_blog").on("click", function() {
        $(".scroll_section_btn").attr("disabled", true);
        $("html").animate({ scrollTop: 18900 }, 2000);
        setTimeout(scrollbtnStop, 2000);
      });
      $("#scroll_member").on("click", function() {
        $(".scroll_section_btn").attr("disabled", true);
        $("html").animate({ scrollTop: 24900 }, 2000);
        setTimeout(scrollbtnStop, 2000);
      });
      $("#scroll_footer").on("click", function() {
        $(".scroll_section_btn").attr("disabled", true);
        $("html").animate({ scrollTop: 33000 }, 2000);
        setTimeout(scrollbtnStop, 2000);
      });
    });
  }
};
</script>
