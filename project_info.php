<?php
    $pagetitle = "Project Info"; 
    include("includes/template/header.php");

    

    if( isset($_GET["projectid"]) && is_numeric($_GET["projectid"]) ){
        $projectid = intval( $_GET["projectid"] );
    }else{
        $projectid = 0;
        header("Location: index.php");
    }
    if( checkProjectExist($projectid) == 0 ){
        header("Location: index.php");
    }
    $row = getProjectById($projectid);
?>

    <div id="project-info-page">

        <div class="inner">
            <div class="container">


                <p class="text-center project-name"> <?php echo $row["name"]; ?> </p>
                <div class="row ">
                    <div class="col-md-6 col-12">
                        <p class="project-date"> <i class="fas fa-clock"></i> Date :  <?php echo $row["date"]; ?> </p>
                    </div>
                    <div class="col-md-6 col-12 ">
                        <a  href='<?php echo $row['link']; ?>'  target="_blank"  class="project-link">
                            Live Preview <i class="fas fa-eye"></i> 
                        </a>
                    </div>
                </div>

                <div class="site-img text-center">
                    <img src="assets/images/sites-img/<?php echo $row['pic']; ?>" alt="">
                </div>

                <div class="project-info">
                    <h4 class="text-center">About Site  </h4>
                    <p class='description'>
                        <?php echo $row['description']; ?>
                    </p>
                </div>


                <div class="footer-links">
                    <div class="row text-center">
                        <div class="col-4 "> <i class="fas fa-arrow-left"></i> </div>
                        <div class="col-4 "> <a href="index.php"> Home Page </a> </div>
                        <div class="col-4 "> <i class="fas fa-arrow-right"></i>  </div>
                    </div>
                </div>

            </div>
        </div>

    </div>




<?php
    include("includes/template/footer.php");
?>
<!--
    <a  href='sites/<?php echo $row['link']; ?>'  target="_blank"  class="project-link"> Live Preview <i class="fas fa-eye"></i> </button>
-->