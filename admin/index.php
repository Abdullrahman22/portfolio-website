<?php
    $pagetitle = "Home"; 
    include("../includes/template/admin_header.php");

    if( isset( $_SESSION["loginAdmin"] ) ){
        header("Location: messeges.php");
    }


    

    if (isset($_POST["loginBtn"])) {
        


        $username          =  security( $_POST["username"] ); 
        $password          =  security( $_POST["password"] ); 

        $username_status = $password_status = 1 ;  // make status not empty;


    
        //===================== Username Validation ==============================

        if( empty( $username) ){
            $username_error = "Username is required";
            $username_status = ""; 
        }else{
            if(strlen($username) > 16 || strlen($username) < 5 ){
                $username_error = "Username must be between 5 and 25 characters";
                $username_status = "";   
            }
        }
        

    
        //===================== Password Validation ==============================


        if( empty( $password ) ){
            $password_error = "Password is required";
            $password_status = "";
        }else{
            if(strlen($password) > 25 || strlen($password) < 5 ){
                $password_error = "Password must be between 5 and 25 characters";
                $password_status = "";  // make password_status  empty
            }else{
                if( preg_match("/[^A-Za-z0-9]/" , $password)){
                    $password_error = "Password must only contain numbers and letters";
                    $password_status = ""; // make password_status  empty
                }
            }
        }


        //===================== Check if user in DB ==============================
        if( !empty($username_status) && !empty($password_status)  ){

            $hashPassword = md5($password);
            //========== For User ===========

            $stmt = $con->prepare("SELECT * FROM users WHERE username = ? AND `password` = ?  "); 
            $stmt->execute(array( $username , $hashPassword)) ;
            
            if($stmt->rowCount() > 0){  // because rowCount() must be 1 when this user has table in db
                $loginAdmin = getAdmininfo( "username", $username , "user_ID" );// get UserID by Username
                create_session( "loginAdmin" , $loginAdmin );
                header("Location: messeges.php");
            }else {
                $password_error = "Username or password is incorrect";
                $password_status = "";                
            }

      


        }










    }







?>


    <div class="admin-login">
        
        <div class="form-box">
            
            
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="text-center">
                <h1 class="text-center"> Admin Login </h1>

                <!-- name Field-->
                <div class="form-group">
                    <input type="text" name='username' placeholder="Name.." class="form-control" required="required" value="<?php echo getInputValue("username"); ?>" autocomplete="off" />
                    <?php
                        if( isset( $username_error ) ){
                            echo '<p class="error-messege">' . $username_error . '</p>'; 
                        }
                    ?>  
                </div>

                <!-- pass Field-->
                <div class="form-group">
                    <input type="password" name='password' placeholder="Password" class="form-control" required="required"  value="<?php echo getInputValue("password"); ?>" autocomplete="new-password" />
                    <?php
                        if( isset( $password_error ) ){
                            echo '<p class="error-messege">' . $password_error . '</p>'; 
                        }
                    ?>  
                </div>
                <button type="submit" name="loginBtn"> Login <i class="fas fa-sign-in-alt"></i>  </button>

            </form>

        </div>

    </div>



<?php
    include("../includes/template/admin_footer.php");
?>
<!--












-->



