<?php
    $pagetitle = "Projects Page"; 
    include("../includes/template/admin_header.php");
    if( !isset( $_SESSION["loginAdmin"] ) ){
        header("Location: ../index.php");
    }else{
         

    


        $do = "";
        if(isset($_GET["do"])){
            $do = $_GET["do"];
        }else{
            $do = "manage";
        }

        /*=================================================================================================
        ===================================================================================================
        ================================ Manage Page ====================================================*/
        if($do == "manage"){ 

            $stmt = $con->prepare(" SELECT * FROM `projects` ORDER BY project_id DESC ");
            $stmt->execute();
            $rows = $stmt->fetchAll();

            ?>
                <div class="table-container manage-project">

                    <h1 class="text-center" style="padding: 30px 0" >  <i class="fas fa-clipboard-list"></i> Projects Page  </h1>

                    <?php
                        if( isset($_SESSION["add_project_success"])){
                            echo '<div class="add-project-success-messege "> ';
                                echo '<p class="text-center">';
                                    echo $_SESSION["add_project_success"] ;
                                echo '</p>';
                            echo '</div>';
                        }
                        elseif ( isset($_SESSION["add_project_failed"]) ) {
                            echo '<div class="add-project-failed-messege"> ';
                                echo '<p class="text-center">';
                                    echo $_SESSION["add_project_failed"] ;
                                echo '</p>';
                            echo '</div>';
                        }
                        unset( $_SESSION["add_project_success"] );
                        unset( $_SESSION["add_project_failed"] );
                    ?>

                    <?php
                        if( isset($_SESSION["edit_project_success"])){
                            echo '<div class="edit-project-success-messege "> ';
                                echo '<p class="text-center">';
                                    echo $_SESSION["edit_project_success"] ;
                                echo '</p>';
                            echo '</div>';
                        }
                        elseif ( isset($_SESSION["edit_project_failed"]) ) {
                            echo '<div class="edit-project-failed-messege"> ';
                                echo '<p class="text-center">';
                                    echo $_SESSION["edit_project_failed"] ;
                                echo '</p>';
                            echo '</div>';
                        }
                        unset( $_SESSION["edit_project_success"] );
                        unset( $_SESSION["edit_project_failed"] );
                    ?>

                    <a href="projects.php?do=add" class="btn btn-primary" style="margin-bottom:20px"> <i class="fas fa-plus"></i> Add New Project</a>
                    <div class="table-responsive ">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#id</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach( $rows as $row){
                                        echo '<tr>';
                                            echo '<th scope="row">'. $row["project_id"] .'</th>';
                                            echo '<th scope="row"> <img src="../assets/images/sites-img/'. $row["pic"] .'" alt="" /></th>';
                                            echo '<th scope="row">'. $row["name"] .'</th>';
                                            echo '<th scope="row">'. $row["description"] .'</th>';
                                            echo '<th scope="row">'. $row["date"] .'</th>';
                                            echo '<th scope="row">'. $row["link"] .'</th>';
                                            echo '<th scope="row"> <a href="projects.php?do=edit&projectid='. $row["project_id"] .'" class="btn btn-block btn-info" style="color:#fff"> <i class="fas fa-edit"></i>  Edit</a> </th>';
                                            echo '<th scope="row"> <a href="projects.php?do=delete&projectid='. $row["project_id"] .'" class="btn btn-block btn-danger checked-btn "> <i class="far fa-trash-alt"></i> Delete</a> </th>';
                                        echo '<tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php    
        } 
        /*============================== Manage Page ======================================================
        ===================================================================================================
        ================================ Add Page =======================================================*/
        if ($do == "add"){  
            // Add Page

            if(isset($_POST["addProjectBtn"])){


                $ProjectName      = $_POST['ProjectName'];
                $description      = $_POST['description'];
                $date             = $_POST['date'];
                $link             = $_POST['link'];
        


                $img_name           =  $_FILES["img"]["name"] ;
                $img_name_rand      = rand(0 , 1000) . "_" . $img_name;
                $tmp_name           =  $_FILES["img"]["tmp_name"] ;
                $store_files        =  "../assets/images/sites-img";
                $extentions         = array("jpg" ,"png" , "jpeg" );
                $get_file_extention = explode("." , $img_name);
                $get_extention      = strtolower( end($get_file_extention) ) ;


                $ProjectName_status = $description_status = $date_status = $link_status = $img_status = 1 ;  // make status not empty;



                //===================== ProjectName Validation ==============================
                if( empty( $ProjectName ) ){
                    $ProjectName_error = "Project Name is required";
                    $ProjectName_status = ""; 
                }else {
                    if(strlen($ProjectName) > 25 || strlen($ProjectName) < 5 ){
                        $ProjectName_error = "Project Name must be between 5 and 25 characters";
                        $ProjectName_status = "";   
                    }
                }

                //===================== description Validation ==============================
                if( empty( $description ) ){
                    $description_error = "description is required";
                    $description_status = ""; 
                }else {
                    if(strlen($description) > 250 || strlen($description) < 5 ){
                        $description_error = "description must be between 5 and 250 characters";
                        $description_status = "";   
                    }
                }

                //===================== date Validation ==============================
                if( empty( $date ) ){
                    $date_error = "date is required";
                    $date_status = ""; 
                }else {
                    if(strlen($date) > 30 || strlen($date) < 5 ){
                        $date_error = "date must be between 5 and 30 characters";
                        $date_status = "";   
                    }
                }

                //===================== link Validation ==============================
                if( empty( $link ) ){
                    $link_error = "link is required";
                    $link_status = ""; 
                }else {
                    if(strlen($link) > 250 || strlen($link) < 5 ){
                        $link_error = "link must be between 5 and 250 characters";
                        $link_status = "";   
                    }
                }


                //===================== Img Validation ==============================
                if( empty( $img_name ) ){
                    $img_error = "Upload photo is required";
                    $img_status = ""; // make img_status  empty
                }else{ 
                    if( !in_array( $get_extention ,  $extentions ) ) { 
                        $img_error = "You must upload only photos";
                        $img_status = ""; // make img_status  empty
                    }
                }


                //===================== Insert into DB ==============================
                if( !empty($ProjectName_status) && !empty($description_status) && !empty($date_status)  && !empty($link_status)   && !empty($img_status)    ){

                    move_uploaded_file( $tmp_name , "$store_files/$img_name_rand");

                    $stmt = $con->prepare(" INSERT INTO 
                                                    projects ( name , `date` , pic , description , link )
                                                    VALUES( :zname , :zdate , :zpic ,  :zdescription , :zlink )");
                    $stmt->execute(array(

                        ":zname"          => $ProjectName,
                        ":zdate"          => $date,
                        ":zpic"           => $img_name_rand,
                        ":zdescription"   => $description,
                        ":zlink"          => $link,

                    ));
                    if($stmt->rowCount() > 0){  // because rowCount() must be 1 at inserting database
                        create_session( "add_project_success" , " <i class='fas fa-check'></i> &nbsp; successfuly created New project " );
                        header("Location: projects.php?do=manage");
                    }else{
                        create_session( "add_project_failed" , " <i class='fas fa-times'></i>  &nbsp; Failed to create New project" );
                        header("Location: projects.php?do=manage");
                    }


                }

            }

            ?>
                <h1 class="text-center">Add Projects</h1>
                <div class="container add-project-page">
                    <div class="form-inner">

                        <form class="form-horizontal" style="margin-top:70px" action="?do=add" method="POST" enctype="multipart/form-data">
                            
                            <!--ProjectName Field-->
                            <div class="form-group">
                                <input type="text"  name="ProjectName" placeholder="Project Name" class="form-control" value="<?php  echo getInputValue("ProjectName");  ?>" required="required" autocomplete="off"/>
                                <?php
                                    if( isset( $ProjectName_error ) ){
                                        echo '<p class="error-messege">' . $ProjectName_error . '</p>'; 
                                    }
                                ?>
                            </div>


                            <!--description Field-->
                            <div class="form-group">
                                <input type="text"  name="description" placeholder="Description" class="form-control"  value="<?php  echo getInputValue("description");  ?>"  required="required" autocomplete="off"/>
                                <?php
                                    if( isset( $description_error ) ){
                                        echo '<p class="error-messege">' . $description_error . '</p>'; 
                                    }
                                ?>
                            </div>


                            <!--date Field-->
                            <div class="form-group">
                                <input type="text"  name="date" placeholder="Date" class="form-control"  value="<?php  echo getInputValue("date");  ?>"  required="required" autocomplete="off"/>
                                <?php
                                    if( isset( $date_error ) ){
                                        echo '<p class="error-messege">' . $date_error . '</p>'; 
                                    }
                                ?>
                            </div>


                            <!--link Field-->
                            <div class="form-group">
                                <input type="text"  name="link" placeholder="Project Link" class="form-control"  value="<?php  echo getInputValue("link");  ?>"  required="required" autocomplete="off"/>
                                <?php
                                    if( isset( $link_error ) ){
                                        echo '<p class="error-messege">' . $link_error . '</p>'; 
                                    }
                                ?>
                            </div>


                            <!--Upload Image Field-->
                            <div class="upload-input">
                                <label for="file" id="file-label">  <i class="fas fa-cloud-upload-alt"></i> &nbsp; Choose image...  </label>
                                <input type="file" class="file form-control" id="file" name="img"   /> 
                                <?php
                                    if( isset( $img_error ) ){
                                        echo '<p class="error-messege">' . $img_error . '</p>'; 
                                    }
                                ?>
                            </div>
                            

                            <br>
                            <br>
                            <br>
                            <br>


                            <input type="submit" name="addProjectBtn" value="Add Project"  class="form-control btn btn-primary"/>
                                       


                        </form>

                    </div>
                </div>
            <?php

        }
        /*============================== Add Page =========================================================
        ===================================================================================================
        ================================ Edit Page ====================================================*/ 
        elseif($do == "edit"){
            if( isset($_GET["projectid"]) && is_numeric($_GET["projectid"]) ){
                $projectid = intval( $_GET["projectid"] );
            }else{
                $projectid = 0;
            }
            // $projectid = isset($_GET["projectid"]) && is_numeric($_GET["projectid"]) ? intval($_GET["projectid"]) : 0 ;

            $stmt = $con ->prepare("SELECT * FROM  projects WHERE project_id = ? LIMIT  1 "); // for one result
            $stmt ->execute(array($projectid));
            $project = $stmt->fetch(); // for comming info and it will get it as array
            $count = $stmt->rowCount();
            if( $count > 0){ 



                if(isset($_POST["editProjectBtn"])){


                    $ProjectName      = $_POST['ProjectName'];
                    $description      = $_POST['description'];
                    $date             = $_POST['date'];
                    $link             = $_POST['link'];
            
    
    
                    $img_name           =  $_FILES["img"]["name"] ;
                    $img_name_rand      = rand(0 , 1000) . "_" . $img_name;
                    $tmp_name           =  $_FILES["img"]["tmp_name"] ;
                    $store_files        =  "../assets/images/sites-img";
                    $extentions         = array("jpg" ,"png" , "jpeg" );
                    $get_file_extention = explode("." , $img_name);
                    $get_extention      = strtolower( end($get_file_extention) ) ;
    
    
                    $ProjectName_status = $description_status = $date_status = $link_status = $img_status = 1 ;  // make status not empty;
    
    
    
                    //===================== ProjectName Validation ==============================
                    if( empty( $ProjectName ) ){
                        $ProjectName_error = "Project Name is required";
                        $ProjectName_status = ""; 
                    }else {
                        if(strlen($ProjectName) > 25 || strlen($ProjectName) < 5 ){
                            $ProjectName_error = "Project Name must be between 5 and 25 characters";
                            $ProjectName_status = "";   
                        }
                    }
    
                    //===================== description Validation ==============================
                    if( empty( $description ) ){
                        $description_error = "description is required";
                        $description_status = ""; 
                    }else {
                        if(strlen($description) > 250 || strlen($description) < 5 ){
                            $description_error = "description must be between 5 and 250 characters";
                            $description_status = "";   
                        }
                    }
    
                    //===================== date Validation ==============================
                    if( empty( $date ) ){
                        $date_error = "date is required";
                        $date_status = ""; 
                    }else {
                        if(strlen($date) > 30 || strlen($date) < 5 ){
                            $date_error = "date must be between 5 and 30 characters";
                            $date_status = "";   
                        }
                    }
    
                    //===================== link Validation ==============================
                    if( empty( $link ) ){
                        $link_error = "link is required";
                        $link_status = ""; 
                    }else {
                        if(strlen($link) > 250 || strlen($link) < 5 ){
                            $link_error = "link must be between 5 and 250 characters";
                            $link_status = "";   
                        }
                    }
    
    
                    //===================== Img Validation ==============================
                    if( !empty( $img_name ) ){

                        if( !in_array( $get_extention ,  $extentions ) ) { 
                            $img_error = "You must upload only photos";
                            $img_status = ""; // make img_status  empty
                        }

                    }
    

        
                    //===================== UPDATE into DB ==============================
                    if( !empty($ProjectName_status) && !empty($description_status) && !empty($date_status)  && !empty($link_status)   && !empty($img_status)    ){
        


                        if( empty( $img_name ) ){
                            $img_name_upload = $project["pic"];
                        }else{
                            move_uploaded_file( $tmp_name , "$store_files/$img_name_rand");
                            $img_name_upload = $img_name_rand;
                        }

                        $stmt = $con->prepare("UPDATE
                                                    projects
                                                SET
                                                    name = ? , `date` = ? , pic = ? ,  description = ? , link = ? 
                                                WHERE
                                                project_id = ?");
                        $stmt->execute(array( $ProjectName , $date , $img_name_upload , $description , $link ,  $projectid  ));

                        if($stmt->rowCount() > 0){  // because rowCount() must be 1 at inserting database
                            create_session( "edit_project_success" , " <i class='fas fa-check'></i> &nbsp; successfuly Edit project " );
                            header("Location: projects.php?do=manage");
                        }else{
                            create_session( "edit_project_failed" , " <i class='fas fa-times'></i>  &nbsp; Failed to Edit project" );
                            header("Location: projects.php?do=manage");
                        }

        
                    }
        
                }

                ?>
                    <h1 class="text-center"> <i class="fas fa-edit"></i>  Edit Projects </h1>
                    <div class="container edit-project-page">
                        <div class="form-inner">
                            <form class="form-horizontal" style="margin-top:70px" action="?do=edit&projectid=<?php echo $projectid ;?>" method="POST" enctype="multipart/form-data">

                                <!--Hidden Field-->
                                <input type="hidden" value="<?php echo $projectid ?>" name="projectid"/>
                                

                                <!--ProjectName Field-->
                                <div class="form-group">
                                    <input type="text"  name="ProjectName" placeholder="Project Name" class="form-control" value="<?php  echo $project["name"];  ?>" required="required" autocomplete="off"/>
                                    <?php
                                        if( isset( $ProjectName_error ) ){
                                            echo '<p class="error-messege">' . $ProjectName_error . '</p>'; 
                                        }
                                    ?>
                                </div>


                                <!--description Field-->
                                <div class="form-group">
                                    <input type="text"  name="description" placeholder="Description" class="form-control"  value="<?php  echo $project["description"];  ?>"  required="required" autocomplete="off"/>
                                    <?php
                                        if( isset( $description_error ) ){
                                            echo '<p class="error-messege">' . $description_error . '</p>'; 
                                        }
                                    ?>
                                </div>


                                <!--date Field-->
                                <div class="form-group">
                                    <input type="text"  name="date" placeholder="Date" class="form-control"  value="<?php  echo $project["date"]; ?>"  required="required" autocomplete="off"/>
                                    <?php
                                        if( isset( $date_error ) ){
                                            echo '<p class="error-messege">' . $date_error . '</p>'; 
                                        }
                                    ?>
                                </div>


                                <!--link Field-->
                                <div class="form-group">
                                    <input type="text"  name="link" placeholder="Project Link" class="form-control"  value="<?php  echo $project["link"]; ?>" required="required" autocomplete="off"/>
                                    <?php
                                        if( isset( $link_error ) ){
                                            echo '<p class="error-messege">' . $link_error . '</p>'; 
                                        }
                                    ?>
                                </div>


                                <!--Upload Image Field-->
                                <div class="upload-input">
                                    <label for="file" id="file-label">  <i class="fas fa-cloud-upload-alt"></i> &nbsp; Choose image...  </label>
                                    <input type="file" class="file form-control" id="file" name="img"   /> 
                                    <?php
                                        if( isset( $img_error ) ){
                                            echo '<p class="error-messege">' . $img_error . '</p>'; 
                                        }
                                    ?>
                                </div>
                                

                                <br>
                                <br>
                                <br>
                                <br>


                                <input type="submit" name="editProjectBtn" value="Edit Project"  class="form-control btn btn-primary"/>
                                




                            </form>
                        </div>
                    </div>
                <?php
            }
        }
        /*============================== Update Page ======================================================
        ===================================================================================================
        ================================ Delete Page ====================================================*/        
        elseif($do == "delete"){
            echo "<h1 class='text-center delete-project-title'>  <i class='far fa-trash-alt'></i> Delete Project</h1>";
            if( isset($_GET["projectid"]) && is_numeric($_GET["projectid"]) ){
                $projectid = intval( $_GET["projectid"] );
            }else{
                $projectid = 0;
            }
            // short if condition 
            //$projectid = isset($_GET["projectid"]) && is_numeric($_GET["projectid"]) ? intval($_GET["projectid"]) : 0 ;
            $check = checkProject("project_id", "projects", $projectid) ;
            if( $check > 0){ 
                $stmt = $con->prepare("DELETE FROM 
                                                projects 
                                            WHERE 
                                            project_id = ?"); // i can get code from phpMyAdmin when i detele from user
                $stmt->execute(array(  $projectid )); // execute the statment 
                $count = $stmt->rowCount();
                if( $count > 0){ 
                    echo "<div class='text-center alert alert-primary' role='alert' style='margin:100px auto;width:350px'>
                            Project is Deleted
                    </div>";
                    header("refresh:2; url=projects.php");
                }else{
                    echo "<div class='text-center alert alert-primary' role='alert' style='margin:100px auto;width:350px'>
                            Error
                    </div>";
                    header("refresh:2; url=projects.php");
                }
            }else{
                echo "<div class='text-center alert alert-danger' role='alert' style='margin:100px auto;width:350px'>
                    this id isn't Exist
                </div>";
                header("refresh:2; url=projects.php");
            }        
        }



    include("../includes/template/admin_footer.php");
    }




?>
