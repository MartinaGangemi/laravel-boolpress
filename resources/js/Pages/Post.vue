<template>
  <div class="container my-5">
    <h1>{{post.title}}</h1>
    <h5>{{post.user.name}}</h5>
    <div>
      <strong>Categoria: </strong>{{post.category.name}}
    </div>
    <img :src="'/storage/' + post.img" alt="">
    <p class="mt-4">{{post.content}}</p>

    <div v-if="post.tags.length > 0">
      <span v-for="tag in post.tags" :key="tag.id">
        #{{tag.name}}
      </span>
    </div>
  </div>
</template>

<script>
export default {
    name:'Post',
    data(){
      return{
        post:'',
      }
    },
    mounted(){
      axios.get('/api/posts/'+ this.$route.params.slug)
      .then(response =>{
        
        if(response.data.status_code === 404){
          this.$router.push({name: 'not-found'})
        } else{
          this.post = response.data
        }
      })
      .catch(e => {
      console.error(e);
      })
    }
}
</script>

<style>

</style>