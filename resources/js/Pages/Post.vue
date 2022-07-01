<template>

  <div class="post">
    <div class="post-img mb-4">
        <img :src="'/storage/' + post.img" alt="">
        <div class="title px-2 py-1">
          <h1>{{post.title}}</h1>
        </div>
    </div>
    
      <div class="container">
      <div class="profilo d-flex align-items-center">
        <div class="avatar m-2">
          <img :src="post.user.avatar" alt="">
        </div> 
        <div class="author" v-if="post.user">
          <h5 class="m-0">{{post.user.name}}</h5>
        </div>
      </div>
      <div>
        <div v-if="post.category">
          <strong >Categoria: </strong>{{post.category.name}}
        </div>
        
      </div>
      
      <p class="mt-4">{{post.content}}</p>

      <div v-if="post.tags.length > 0">
        <span v-for="tag in post.tags" :key="tag.id">
          #{{tag.name}}
        </span>
      </div>
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

<style scoped lang="scss">
img{
  width: 100%;
  height: 100%;
   object-fit: cover;
}

.post-img{
  height: 400px;
  position: relative;
  img{
    
    filter: saturate(0.5);
     object-position: center;
    
  }
 
}

.title{
  position: absolute;
  bottom: -10px;
  left: 10px;
  background-color: #F79A92;
  h1{
      margin: 0;
      color: white;
  }
}

 .avatar{
    height: 60px;
    width: 60px;

    img{
      border-radius: 50%;
    }
 }

</style>