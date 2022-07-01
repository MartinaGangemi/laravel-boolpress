<template>
<div class="row m-0">
  <cards-component />
  <aside-component />
  
</div>
</template>

<script>
import AsideComponent from '../components/AsideComponent.vue'
import CardsComponent from '../components/CardsComponent.vue'

export default {
  components: { AsideComponent, CardsComponent },
    name:'Post'
}
</script>

<style>

</style>