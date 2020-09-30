<?php
    $pagetitle = "Home"; 
    include("includes/template/header.php");

    if( isset( $_POST["sendMessegeBtn"] ) ){
        ?>
            <script>
                var scrollToContact = 1;
            </script>
        <?php

        $visitorName = security( $_POST["visitorName"] ) ;
        $email       = security( $_POST["email"] ) ;
        $messege     = security( $_POST["messege"] ) ;

        $visitorName_status = $email_status = $messege_status = 1 ;  // make status not empty;



        //===================== visitorName Validation ==============================
        if( empty( $visitorName ) ){
            $visitorName_error = "Name is required";
            $visitorName_status = ""; // make email_status empty
        }else {
            if(strlen($visitorName) > 16 || strlen($visitorName) < 5 ){
                $visitorName_error = "Name must be between 5 and 25 characters";
                $visitorName_status = "";   // make email_status  empty
            }
        }
        //===================== email Validation ==============================
        if( empty( $email ) ){
            $email_error = "Pmail is required";
            $email_status = ""; // make email_status empty
        }else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = "Please insert validate email";
                $email_status = "";   // make email_status  empty

            }else{
                if(strlen($email) > 35 || strlen($email) < 5 ){
                    $email_error = "email must be between 5 and 35 characters";
                    $email_status = "";   // make email_status  empty
                }
            }
        }



                
        //===================== messege Validation ==============================
        if( $messege == "" ){
            $messege_error =  "Messege is empty";
            $messege_status = "";

        }else{
            if(strlen($messege) > 240 || strlen($messege) < 5 ){
                $messege_error  =   "messege must be between 5 and 240 characters";
                $messege_status = "";
            }
        }
        //===================== Insert into DB ==============================
        if( !empty($visitorName_status) && !empty($email_status) && !empty($messege_status)    ){


            $stmt = $con->prepare(" INSERT INTO 
                                            messege ( messege , name , email  )
                                            VALUES( :zmessege , :zname , :zemail )");
            $stmt->execute(array(
                ":zmessege" => $messege,
                ":zname"    => $visitorName,
                ":zemail"   => $email
            ));
            if($stmt->rowCount() > 0){  // because rowCount() must be 1 at inserting database
                create_session( "messege_sent" , " Thank you for contact with me <i class='fas fa-handshake'></i> " );
                header("Location: index.php#contact");
            }else{
                create_session( "messege_failed" , " <i class='fas fa-times'></i>  &nbsp; Failed send messege" );
                header("Location: index.php#contact");
            }



            /*
            if($stmt->rowCount() > 0){  // because rowCount() must be 1 at inserting database
                create_session( "messege_sent" , " <i class='fas fa-check'></i> &nbsp; successfuly send messege " );
                header("Location: index.php#contact");
            }else{
                create_session( "messege_failed" , " <i class='fas fa-times'></i>  &nbsp; Failed send messege" );
                header("Location: index.php#contact");
            }

            */

        }








    }




?>

    <nav class="navbar navbar-expand-lg sticky-top transparent-bg  ">
        <div class="container">

            <a class="navbar-brand" href="index.php">Portfolio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">  <i class="fas fa-bars"></i> </span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="home">  <i class="fas fa-home"></i> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="works">  <i class="fas fa-list-ul"></i>  Works </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">  <i class="fas fa-info-circle"></i> About </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">  <i class="fas fa-envelope"></i> Contact </a>
                    </li>


                </ul>
            </div>
            
        </div>
    </nav>

    <div id="home">
        <div class="overlay">
            <div class="container">
                <div class="my-info">
                    <p>Hi There, I'm</p>
                    <p> AbdullRahman Ismael </p>
                    <p>Full Stack Developer </p>
                </div>
                <div class="go-down">
                    <i class="fas fa-angle-double-down"></i>
                </div>
            </div>
        </div>
    </div>

    <div id="works">

        <p class="text-center title"> My Works <i class="fas fa-heart"></i> </p>
        <div class="content-title-underline"></div>

        <div class="container text-center ">
            <div class="row text-center">
                
                <?php
                    $projects = getAllProjects();

                    foreach( $projects as $project ){
                        ?>

                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="work-box text-center" onclick="location.href='project_info.php?projectid=<?php echo $project['project_id'] ;?>'">
                                    <div class="content-img" style="background-image: url('assets/images/sites-img/<?php echo $project["pic"]; ?>');">
                                        <div class="overlay">
                                            <div class="custom-border">
                                            </div>
                                            <div class="project-info">
                                                <span class="name"> <?php echo $project["name"]; ?> </span> <br>
                                                <span> <a> more Details <i class="fas fa-paperclip"></i>  </a> </span>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>


                        <?php
                    }
                ?>
            
            </div>
        </div>
    
    </div>


    <div id="about">
        <div class="container">

            <p class="text-center title"> About Me  <i class="fas fa-info-circle"></i>   </p>
            <div class="content-title-underline"></div>

            <div class="about-inner">
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/images/img/img_1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6"> 
                        <div class="info">
                            <p> Full Stack Developer </p>
                            <p> Lived in Alexandria - Egypt </p>
                            <p> - 23 years old, graduate of Faculty of Education, Department of Science . 
                                But I fell in love with computer science , i am using php / javascript / jquery / bootstarp / ajax /
                                mysql queries and css3 animation , working as a freelancer from 1 Year ago making completely websites or front end pages , i can make a Attractive site and make a responsive website using bootstrap or without any framwork
                                so that users can open site in all devices like moblies.<br>
                                - i can preventing cross-site scripting (XSS) with secure functions <br>
                                - i am using php OOP and i have a big project with it (Messenger) <br>
                                - my future plan learning vue.js and laravel 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

                    <?php
                        if( isset($_SESSION["messege_sent"])){
                            echo '<div class="popup-messege messege-success "> ';
                                echo '<p class="text-center">';
                                    echo $_SESSION["messege_sent"] ;
                                echo '</p>';
                            echo '</div>';


                        }
                        elseif ( isset($_SESSION["messege_failed"]) ) {
                            echo '<div class="popup-messege messege-failed "> ';
                                echo '<p class="text-center">';
                                    echo $_SESSION["messege_failed"] ;
                                echo '</p>';
                            echo '</div>';

                        }

                        if (isset($_SESSION['most_recent_activity']) && 
                            ( time() -   $_SESSION['most_recent_activity'] > 1 ) ) {

 
                            session_destroy();   
                            session_unset();
                             
                        }
                        $_SESSION['most_recent_activity'] = time(); // the start of the session.
                        
                    ?>





                    <?php

                        //unset( $_SESSION["messege_failed"] );
                        //unset( $_SESSION["messege_sent"] );

                    ?>

                         
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">

                        <!--visitorName Field-->
                        <div class="form-group">
                            <input type="text" name='visitorName' placeholder="Name.." class="custom-input" required="required" value="<?php echo getInputValue("visitorName"); ?>" autocomplete="off" />
                            <?php
                                if( isset( $visitorName_error ) ){
                                    echo '<p class="error-messege">' . $visitorName_error . '</p>'; 
                                }
                            ?>
                        </div>
                        
                        <!--email Field-->
                        <div class="form-group">
                            <input type="email" name='email' placeholder="@Email.." class="custom-input" required="required"  value="<?php echo getInputValue("email"); ?>" autocomplete="off" />
                            <?php
                                if( isset( $email_error ) ){
                                    echo '<p class="error-messege">' . $email_error . '</p>'; 
                                }
                            ?>
                        </div>
                        
                        <!--messege Field-->
                        <div class="form-group">
                            <textarea name="messege" id="messege" cols="20" rows="5" placeholder="Messege.." class="custom-input"  autocomplete="off" ><?php echo getInputValue("email"); ?></textarea>
                            <?php
                                if( isset( $messege_error ) ){
                                    echo '<p class="error-messege">' . $messege_error . '</p>'; 
                                }
                            ?>
                        </div>
                        
                        <div class="text-center">
                            <button name="sendMessegeBtn"  >  Send Messege <i class="fas fa-paper-plane"></i> </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div id="footer">
        <div class="container">
            <div class="footer-inner text-center">
                <div class="scroll-top">
                    <i class="fas fa-arrow-up"></i>
                </div>
                <div class="social-media">
                    <span> <a href=" https://www.facebook.com/abdelrahman.esmail.94 ">  <i class="fab fa-facebook-square"></i> </a> </span>
                    <span> <a href=" https://l.facebook.com/l.php?u=https%3A%2F%2Fwa.me%2F%2B2001210811347%3Ffbclid%3DIwAR0RxMBo-VUMOjGUKEYKaGqIfEeU79dddzL02UfkpqQQqFxB_WE7ex38EiY&h=AT2d9RTllRhXdxE7-RdNWipNRq8UCybR9_mFYLkiZnmCmylVXr3dUBu4-FqMW1kuh2qX82vKuK4VscLoTOVCU7Xqul5nY2zMkirSnXhkHKfMWYJNn0bHAJ342vG__S3K42DleQ "> <i class="fab fa-whatsapp-square"></i>   </a> </span>
                    <span> <a href="#"> <i class="fab fa-twitter-square"></i> </a>  </span>
                </div>
                <div class="copyright">
                    © 2019 Zuman. All Rights Reserved. <br>
                    Created by AbdullRahman Ismael
                </div>
            </div>
        </div>
    </div>


<?php
    include("includes/template/footer.php");
?>
