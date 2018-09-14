<?php 

    include 'db.php';
    
    if(isset($_POST['postId'])){
        $postId = $_POST['postId'];

        $sql3 = "DELETE FROM comments WHERE post_id = $postId";
        $statement3 = $connection->prepare($sql3);
        $statement3->execute();

        $sql4 = "DELETE FROM posts WHERE id = $postId";
        $statement4 = $connection->prepare($sql4);
        $statement4->execute();

        header('Location: index.php');
    }
