<template>
    <section class ="post col-10">
      <div class="container">
         <div class="row g-5 mt-5">
            <div class="col-4" v-for="post in postsResponse.data" :key="post.id">
                  <!-- card -->
                  <div class="post-card card">
                  <div class="profilo d-flex align-items-center">
                     <div class="avatar m-2">
                        <img :src="post.user.avatar" alt="">
                     </div> 
                     <div class="author" v-if="post.user">
                        <h5 class="m-0">{{post.user.name}}</h5>
                     </div>
                  </div>

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
                  <div class="card_footer p-3">
                     
                     <span v-if="post.category"><strong>Cartegory:</strong> {{post.category.name}}</span>
                     <div class="tags" v-if="post.tags.length > 0"> 
                        <strong>Tags:</strong>
                        
                           <span v-for="tag in post.tags" :key="tag.id">
                           #{{tag.name}}
                           </span>
                     </div>
                  </div>
                  </div>
            
            </div>
         </div>

         <!-- numero pagine -->
         <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center  mt-5">
               <li class="page-item" v-if="postsResponse.current_page > 1">
                  <a class="page-link"  @click="getAllPosts(postsResponse.current_page - 1)">Previous</a>
               </li>
               <li :class="{'page-item' : true , 'active' : page == postsResponse.current_page  }" v-for="page in postsResponse.last_page" :key='page.id'>
                  <a class="page-link" href="#" @click.prevent="getAllPosts(page)">{{ page }}</a>
               </li>
               
               <li class="page-item" v-if="postsResponse.current_page < postsResponse.last_page">
                  <a class="page-link" href="#" @click.prevent="getAllPosts(postsResponse.current_page + 1)">Next</a>
               </li>
            </ul>
         </nav>
      </div>
   </section>
    
</template>

<script>


export default {
   name:'CardsComponent',
 
    data(){
      return {
         postsResponse: '',
         
        }
    },

   methods: {
      //chiamata posts
        getAllPosts(postPage){
         axios.get('/api/posts', {
          params : {
            page: postPage
          }
          
        })
        
      .then((response)=>{
         console.log(response.data);
         //this.posts=response.data.data
         this.postsResponse=response.data
      }).catch(e =>{
         console.error(e);
      })
      },

      trimText(text){
        if(text.length >50 ){
         return text.slice(0,50) + '...'
        }
        return text;
      }

      
   },

   mounted(){
     this.getAllPosts(1);
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
      height: 500px;
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
      

      .avatar{
         height: 50px;
         width: 50px;

        img{
          border-radius: 50%;
        }
      }
     

   }
 
</style>