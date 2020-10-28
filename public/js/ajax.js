
$(document).ready(function() {
     
     /*====================================================
                              Add New Project 
     ====================================================*/
     $("#CreateProjectModal button.save-project").click( function (e){
          e.preventDefault();
          $("#CreateProjectModal small.text-danger").text(""); // empty small (errors) html 
          $.ajax({
               type: "POST",  
               url: "/admin/projects/store",   
               data: new FormData( $("#CreateProjectModal form")[0] ),  
               processData: false,
               contentType : false , 
               cache    : false,
               success: function ( response ) {
                    // console.log(response);
                    if( response.status == 'error' && response.msg == 'validation error' ){
                         $.each( response.errors , function( key , val ){
                              $("#CreateProjectModal small.text-danger." + key ).text(val[0]);
                         });
                    }
                    else if( response.status == 'error' && response.msg == 'insert operation failed'  ){
                         alert("Error at save, please try later.... ");  
                    }
                    else if( response.status == 'success' ){
                         alert("Project Saved!");
                         window.location.href = "/admin/projects";
                    }
               },
               error: function(response){
                   alert("Error");   // failed to with url
               }
          });
     })
     /*====================================================
                              Edit Project 
     ====================================================*/
     $(".project-page .btn.edit-btn").click( function (e){
          var project_id = $(this).attr("project_id");
          $("#EditProjectModal form .project_id").attr("value" , project_id);
          $.ajax({
               type: "GET",  
               url: "/admin/projects/edit/" + parseInt(project_id) ,
               data: {
                    id: project_id
               },  
               processData: false,
               contentType : false , 
               cache    : false,
               success: function ( response ) {
                    // console.log(response.project);
                    $.each( response.project , function( key , val ){
                         $("#EditProjectModal .form-control[name='" + key + "']").attr("value" , val );
                    });
                    $("#EditProjectModal .form-control[name='desc']").text( response.project.desc );
               },
               error: function(response){
                   alert("Error");   // failed to with url
               }
          });
     });
     /*====================================================
                              Update Project 
     ====================================================*/
     $("#EditProjectModal button.update-project").click( function (e){
          e.preventDefault();
          $("#EditProjectModal small.text-danger").text(""); // empty small (errors) html 
          // console.log( new FormData( $("#EditProjectModal form")[0] ) );
          $.ajax({
               type: "POST",  
               url: "/admin/projects/update/" + parseInt ( $("#EditProjectModal form .project_id").attr("value") ) ,  // project_id in <input type="hidden"/>
               data: new FormData( $("#EditProjectModal form")[0] ),  
               processData: false,
               contentType : false , 
               cache    : false,
               success: function ( response ) {
                    // console.log(response);
                    if( response.status == 'error' && response.msg == 'validation error' ){
                         $.each( response.errors , function( key , val ){
                              $("#EditProjectModal small.text-danger." + key ).text(val[0]);
                         });
                    }
                    else if( response.status == 'error' && response.msg == 'project not found'  ){
                         window.location.href = "/admin/projects";
                    }
                    else if( response.status == 'error' && response.msg == 'updated operation failed'  ){
                         alert("Error at update, please try later.... ");  
                    }
                    else if( response.status == 'success' ){
                         alert("Project Updated!");
                         window.location.href = "/admin/projects";
                    }
               },
               error: function(response){
                   alert("Error");   // failed to with url
               }
          });
     });
     

});