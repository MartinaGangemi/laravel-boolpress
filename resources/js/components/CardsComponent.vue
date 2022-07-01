<template>
    <section class ="post col-10">
      <div class="container">
         <div class="row g-5 mt-5">
            <div class="col-3" v-for="post in postsResponse.data" :key="post.id">
                  <!-- card -->
                  <div class="product card">
                  <img :src="'storage/' + post.img" :alt="post.title">
                  <div class="card-body">
                     <h5>{{post.title}}</h5>
                     <p>{{trimText(post.content)}}</p>
                     <router-link :to="{name: 'post', params: { slug:post.slug } }">Read More</router-link>
                  </div>
                  <div class="card-footer">
                     <div class="author" v-if="post.user">
                        <strong>Autore:</strong>
                        {{post.user.name}}
                     </div>
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
         console.log(response);
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
   
    .card{
      height: 400px;
      img{
        height: 150px;
         object-fit: cover;
      }

      .card-body{
         overflow: auto;
      }
   }
 
</style>