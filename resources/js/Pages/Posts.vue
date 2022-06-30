<template>
<div class="row m-0">
  <welcome-content/>
  <cards-component />
  <aside-component />
  
</div>
</template>

<script>
import AsideComponent from '../components/AsideComponent.vue'
import CardsComponent from '../components/CardsComponent.vue'
import WelcomeContent from '../components/WelcomeContent.vue'
export default {
  components: { AsideComponent, WelcomeContent, CardsComponent },
    name:'Post'
}
</script>

<style>

</style>