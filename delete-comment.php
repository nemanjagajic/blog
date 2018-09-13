<?php
    include 'db.php';

    if(isset($_POST['cmtId'])){
        $cmtId = $_POST['cmtId'];
    }
    

    if(isset($_POST['postId'])){
        $postId = $_POST['postId'];
    }

    if(isset($cmtId)){
        $sql2 = "DELETE FROM comments WHERE id = '$cmtId'";
        $statement2 = $connection->prepare($sql2);
        $statement2->execute();
    }

    header("Location: single-post.php?post_id=$postId");