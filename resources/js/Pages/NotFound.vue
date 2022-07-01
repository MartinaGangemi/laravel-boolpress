<template>
  <div class="container mb-5 text-center">
    <img src="https://i.ibb.co/d2dxk75/not-found.png" alt="not-found" >
    <h1>Oopsie! Pagina non trovata...</h1>
    <p class="p-4 text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo dolor eligendi minus iusto excepturi aliquid nemo nulla omnis nisi odio!</p>
    <router-link :to= "{name : 'home' }"> 
        <button  class="text-light text-uppercase p-2 px-4">
          Torna alla home page
        </button>
    </router-link>
  </div>
</template>

<script>
 export default {
        name: 'NotFound' 
    }
</script>
    
<style scoped lang="scss">

  button{
    background-color: #FFC7BA;
    border-radius: 20px;
    border: none;
    box-shadow: -2px 5px #F79A92;
    font-size: 1.2rem;
  }

  p{
    font-size: 1.5rem;
    
  }
</style>