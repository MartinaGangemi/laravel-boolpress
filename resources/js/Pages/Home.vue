<template>
    <div class="home">
        <welcome-content/>
        <div class="recent_articles my-5">
            <div class="container">
                <h2>Articoli recenti</h2>
                <div class="row g-5 mt-1">
                    <div class="col-4" v-for="post in posts" :key="post.id">
                        <!-- card -->
                        <div class="post-card card">
                            <div class="post-img">
                                <img :src="'storage/' + post.img" :alt="post.title">
                                <div class="title px-2 py-1">
                                    <h5>{{post.title}}</h5>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                
                                <p>{{trimText(post.content)}}</p>
                                 <router-link :to="{name: 'post', params: { slug:post.slug } }">Read More</router-link>
                            </div>
                            
                        </div>
                    
                    </div>
                </div>
            </div>     
        </div>
    </div>
  
</template>

<script>

import WelcomeContent from '../components/WelcomeContent.vue'
export default {
        components:{
        WelcomeContent,
        },
    name: 'Home',

    data() {
        return {
        posts: '',
        }
    },

    methods:{
        trimText(text){
        if(text.length >50 ){
         return text.slice(0,50) + '...'
        }
        return text;
      }
    },

    mounted(){
        axios.get('/api/posts')
        .then(response => {
            console.log(response.data);
            const posts = response.data.data
            this.posts = posts.slice(0, 6)
        })
        .catch(e => {
            console.error(e)
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

    

    .post-card{
      height: 350px;
      width: 100%;
      
      
    .post-img{
        height: 200px;
        margin: 1rem;
        position: relative;
      }

      .title{
        position: absolute;
        bottom: -10px;
        right: -10px;
        background-color: #F79A92;
        h5{
            margin: 0;
            color: white;
        }
      }

      
   }
 
</style>