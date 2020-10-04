<template>

     <div id="contact">
          <div class="container">
               <p class="text-center title"> Contact With Me <i class="fas fa-envelope"></i> </p>
               <div class="content-title-underline"></div>
               <div class="row">
                    <div class="col-md-4">
                         <div class="details">
                              <div class="row">
                                   <div class="col-sm-12 col-6">
                                        <div class="phone">
                                             <h5> <i class="fas fa-phone-square"></i> Phone :</h5>
                                             <p> +201210811347 </p>
                                        </div>
                                   </div>
                                   <div class="col-sm-12 col-6 ">
                                        <div class="phone">
                                             <h5>  <i class="fas fa-envelope"></i> Email :</h5>
                                             <p> abdoesmail3@gmail.com </p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-8">
                         <form @submit.prevent="submitForm">
                              <!--visitorName Field-->
                              <div class="form-group">
                                   <input type="text" name='name' placeholder="Name.." class="custom-input" autocomplete="off" v-model="messege_form.name"/>
                                   <small class="text-danger error-messege" v-if="errors.name"> {{errors.name[0] }} </small> 
                              </div>
                              <!--email Field-->
                              <div class="form-group">
                                   <input type="text" name='email' placeholder="@Email.." class="custom-input"  autocomplete="off" v-model="messege_form.email"/>
                                   <small class="text-danger error-messege" v-if="errors.email"> {{errors.email[0] }} </small> 
                              </div>
                              <!--messege Field-->
                              <div class="form-group">
                                   <textarea name="messege" id="messege" cols="20" rows="5" placeholder="Messege.." class="custom-input"  autocomplete="off" v-model="messege_form.body"> </textarea>
                                   <small class="text-danger error-messege" v-if="errors.body"> {{errors.body[0] }} </small> 
                              </div>
                              <div class="text-center">
                                   <button name="sendMessegeBtn"  >  Send Messege <i class="fas fa-paper-plane"></i> </button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>

</template>
<script>
     export default {
          data(){
               return{
                    messege_form: {},
                    errors: {}
               }
          },
          methods:{
               submitForm(){
                    axios.post('/api/send-messege/' , this.messege_form)
                    .then( 
                         resquest => {  
                              console.log(resquest.data);
                              if( resquest.data.status == 'error' ){
                                   this.errors = resquest.data.errors
                              }
                              else if( resquest.data.status == 'success' ){
                                   this.errors = {}  // empty error var
                                   this.messege_form = {}  
                                   /*========== Go Top Page ===========*/
                                   window.scrollTo(0, 0);
                                   /*======== Sweet Alert ============*/
                                   Vue.swal({
                                        position: 'top-end',
                                        icon: 'success',
                                        text: 'Your Messege Sent Successfully ',
                                        showConfirmButton: false,
                                        timer: 1500
                                   });  
                              }
                         }
                    )
                    .catch( error => console.log(error) )

               }
          }
     }
</script>