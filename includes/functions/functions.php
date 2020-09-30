<?php

    function security( $data ){
        $data = strip_tags($data); // to remove tags from inputs
        return ltrim( $data, " " ); // to remove spaces after string
    }
    
    function getInputValue($name){
        if (isset($_POST[$name])){
            echo $_POST[$name];
        }
    }

    function create_session( $session_name , $session_value ){
        $_SESSION["$session_name"] = "$session_value" ;
    }

    function getAdmininfo( $table , $session , $valueGet ){ // depende on UserID
        global $con;
        $stmt = $con->prepare("SELECT * FROM users WHERE $table = ? LIMIT 1");
        $stmt->execute( array( $session ) );
        $row = $stmt->fetch();
        return $row["$valueGet"];
    }

    function checkProject($select, $from, $value){
        global $con;
        $statment = $con->prepare("SELECT $select FROM $from WHERE $select = ?");
        $statment ->execute(array($value));
        $count =  $statment->rowCount();
        return $count;
    }

    function getAllProjects(){
        global $con;
        $stmt = $con->prepare("SELECT * FROM `projects` ORDER BY project_id DESC");
        $stmt ->execute(array( ));
        $rows =  $stmt->fetchAll();
        return $rows;
    }

    function getProjectById( $projectid ){ // depende on itemid
        global $con;
        $stmt = $con->prepare(" SELECT * FROM projects WHERE project_id = ? LIMIT 1 ");
        $stmt->execute( array( $projectid ) );
        $row = $stmt->fetch();
        return $row ;
    }

    function checkProjectExist( $projectid ){
        global $con;
        $stmt = $con->prepare("SELECT * FROM projects WHERE project_id = ? ");
        $stmt->execute( array( $projectid ) );
        $count =  $stmt->rowCount();
        return $count; 
    }