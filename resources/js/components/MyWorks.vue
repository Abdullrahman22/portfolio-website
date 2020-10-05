<template>
     
     <div id="works">
          <p class="text-center title"> My Works <i class="fas fa-heart"></i> </p>
          <div class="content-title-underline"></div>
          <div class="container text-center ">
               <div class="row text-center">
                    <router-link :to=" '/project/' + project.slug" class="col-md-4 col-sm-6 col-12" v-for="project in projects" :key="project.id">
                         <div class="work-box text-center" >
                              <div class="content-img" :style=" 'background-image: url(/images/sites-img/' + project.img + ')' ">
                                   <div class="overlay">
                                        <div class="custom-border"></div>
                                        <div class="project-info">
                                             <span class="name"> {{ project.title }} </span> <br>
                                             <span> <a> more Details <i class="fas fa-paperclip"></i>  </a> </span>
                                        </div>
                                   </div>    
                              </div>
                         </div>
                    </router-link>
               </div>
        </div>
     </div>

</template>
<script>
     export default {
          data(){
               return{
                    projects: {}
               }
          },
          mounted(){
               this.getProjects();
          },
          methods:{
               getProjects(){
                    axios.get("/api/all-proejcts")
                    .then( 
                         resquest => {  
                              // console.log(resquest.data);
                              this.projects = resquest.data
                         }
                    )
                    .catch( error => console.log(error) )
               }
          }
     }
</script>