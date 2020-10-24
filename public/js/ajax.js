
$(document).ready(function() {
     
     /*====================================================
                              Add New Project 
     ====================================================*/
     $(".project-page button.save-project").click( function (e){
          e.preventDefault();
          var formData = new FormData( $(".create-post")[0] );
          $("small.text-danger").text(""); // empty small (errors) html 
          $.ajax({
               type: "POST",  
               url: "/admin/projects",   
               data: new FormData( $("#CreateProjectModal form")[0] ),  
               processData: false,
               contentType : false , 
               cache    : false,
               success: function ( response ) {
                    // console.log(response);
                    if( response.status == 'error' && response.msg == 'validation error' ){
                         $.each( response.errors , function( key , val ){
                              $("small.text-danger." + key ).text(val[0]);
                         });
                    }
                    if( response.status == 'error' && response.msg == 'insert operation failed'  ){
                         alert("Error at save, please try later.... ");  
                    }
               },
               error: function(response){
                   alert("Error");   // failed to with url
               }
           });
   
     })

});