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
               <button class="load-more btn btn-info" v-if="moreExist"  @click.prevent="loadMore"> Load More &nbsp <i class="fas fa-spinner"></i> </button>
        </div>
     </div>

</template>
<script>
     export default {
          data(){
               return{
                    paginationPage: 1,
                    projects: {},
                    projectsPageData: {},
                    rotate: 360,
               }
          },
          computed: {
               moreExist(){
                    if( this.projectsPageData.current_page < this.projectsPageData.last_page )
                         return true;
                    else
                         return false; 
               }
          },
          mounted(){
               this.getProjects();
          },
          methods:{
               getProjects(){
                    axios.get("/api/all-proejcts/?page=" + this.paginationPage)
                    .then( 
                         resquest => {  
                              // console.log(resquest.data);
                              this.projectsPageData = resquest.data
                              this.projects = resquest.data.data
                         }
                    )
                    .catch( error => console.log(error) )
               },
               loadMore(){
                    /*========= Load Projects ===========*/
                    this.paginationPage = this.paginationPage + 1 ;
                    axios.get("/api/all-proejcts/?page=" + this.paginationPage)
                    .then( 
                         resquest => {  
                              // console.log(resquest.data);
                              this.projectsPageData = resquest.data
                              resquest.data.data.forEach(data => {
                                   this.projects.push(data)
                              })
                         }
                    )
                    .catch( error => console.log(error) )
                    /*========= Add Icon Animation ===========*/
                    var icon = document.getElementsByClassName("fa-spinner")[0];
                    icon.style.transform =  'rotate(' + this.rotate + 'deg)';
                    this.rotate += 360;
               }
          }
     }
</script>