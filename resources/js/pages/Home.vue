<template>

     <div id="Home-page">
          <!-------- Header ----->
          <custom-header></custom-header>

          <!-------- MyWorks ----->
          <my-works></my-works>

          <!-------- AboutMe ----->
          <about-me></about-me>

          <!-------- ContactMe ----->
          <contact-me></contact-me>

          <!-------- Footer ----->
          <custom-footer></custom-footer>
     </div>

</template>
<script>
     import CustomHeader from './../components/Header.vue'
     import MyWorks from './../components/MyWorks.vue'
     import AboutMe from './../components/AboutMe.vue'
     import ContactMe from './../components/ContactMe.vue'
     import CustomFooter from './../components/Footer.vue'

     export default {
          components:{
               CustomHeader,
               MyWorks,
               AboutMe,
               ContactMe,
               CustomFooter,
          }
     }
</script>