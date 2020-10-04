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
                         <form>
                              <!--visitorName Field-->
                              <div class="form-group">
                                   <input type="text" name='visitorName' placeholder="Name.." class="custom-input" required="required" value="" autocomplete="off" />
                              </div>
                              <!--email Field-->
                              <div class="form-group">
                                   <input type="email" name='email' placeholder="@Email.." class="custom-input" required="required"  value="" autocomplete="off" />
                              </div>
                              <!--messege Field-->
                              <div class="form-group">
                                   <textarea name="messege" id="messege" cols="20" rows="5" placeholder="Messege.." class="custom-input"  autocomplete="off" > </textarea>
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