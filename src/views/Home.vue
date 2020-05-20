<template>
  <div id="test" class="home">
    <homePage />
  </div>
</template>

<script>
import "@/js/home";
import homePage from "@/components/homePage";

export default {
  name: "Home",
  components: {
    homePage
  }
};
</script>
