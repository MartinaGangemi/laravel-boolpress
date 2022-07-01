<template>
    <div>
        <welcome-content/>
        <div class="recent_articles my-5">
            <div class="container">
                <h2>Articoli recenti</h2>
                <div class="row g-5 ">
                    <div class="col-3" v-for="post in posts" :key="post.id">
                        <!-- card -->
                        <div class="product card">
                            <img :src="'storage/' + post.img" :alt="post.title">
                            <div class="card-body">
                                <h5>{{post.title}}</h5>
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
            this.posts = posts.slice(0, 8)
        })
        .catch(e => {
            console.error(e)
        })

    }
}

    
</script>

<style scoped lang="scss">
   
    .card{
      height: 320px;
      img{
        height: 150px;
         object-fit: cover;
      }

      
   }
 
</style>