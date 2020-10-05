<template>
     <div id="project-info">
        <div class="inner">
               <div class="container">
                    <p class="text-center project-name"> {{ project.title }} </p>
                    <div class="row">
                         <div class="col-md-6 col-12">
                              <p class="project-date"> <i class="fas fa-clock"></i> Date :  {{ project.date }} </p>
                         </div>
                         <div class="col-md-6 col-12 ">
                              <a :href="project.date"  target="_blank"  class="project-link">
                                   Live Preview <i class="fas fa-eye"></i> 
                              </a>
                         </div>
                    </div>
                    <div class="site-img text-center">
                         <img :src=" '/images/sites-img/' + project.img " alt="" >
                    </div>
                    <div class="project-info">
                         <h4 class="text-center"> About Site  </h4>
                         <p class='description'>
                             {{ project.desc }}
                         </p>
                    </div>
                    <div class="footer-links">
                         <div class="row text-center">
                              <div class="col-4 "> <i class="fas fa-arrow-left"></i> </div>
                              <div class="col-4 "> <router-link to="/"> Home Page </router-link> </div>
                              <div class="col-4 "> <i class="fas fa-arrow-right"></i>  </div>
                         </div>
                    </div>
               </div>
        </div>
    </div>
</template>
<script>
     export default {
          data(){
               return{
                    project: {}
               }
          },
          mounted(){
               this.getProject();
          },
          methods:{
               getProject(){
                    axios.get("/api/project/" + this.$route.params.slug )
                    .then( 
                         resquest => {  
                              // console.log(resquest.data);
                              this.project = resquest.data.project
                         }
                    )
                    .catch( error => console.log(error) )
               }
          }
     }
</script>