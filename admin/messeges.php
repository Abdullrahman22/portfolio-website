<?php
    $pagetitle = "Messeges"; 
    include("../includes/template/admin_header.php");
    if( !isset( $_SESSION["loginAdmin"] ) ){
        header("Location: ../index.php");

    }
?>


    <?php

        $stmt = $con->prepare(" SELECT *  FROM `messege` ORDER BY messege_id DESC ");
        $stmt->execute();
        $stmt->execute( array( ) );
        $rows = $stmt->fetchAll();


    ?>

    <div class="messege-page">
        

            <h1 class="text-center" style="padding: 50px 0" >  <i class="fas fa-comment-alt"></i> Messege Page  </h1>
            <div class="container">

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#id</th>
                                <th scope="col"> <i class="fas fa-user"></i> Name </th>
                                <th scope="col"> <i class="fas fa-comment-alt"></i>  Messege </th>
                                <th scope="col"> <i class="fas fa-envelope"></i> Email</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($rows as $row) {
                                    echo '<tr>';
                                    echo '<th scope="row">'. $row["messege_id"] .'</th>';
                                    echo '<th scope="row">'. $row["messege"] .'</th>';
                                    echo '<th scope="row">'. $row["name"] .'</th>';
                                    echo '<th scope="row">'. $row["email"] .'</th>';
                                    
                                } 
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        

    </div>



<?php
    include("../includes/template/admin_footer.php");
?>


