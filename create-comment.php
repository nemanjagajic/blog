<?php include 'db.php';

    if(isset($_POST['postId'])){
        $postId = $_POST['postId'];
    }

    if(isset($_POST['author'])){
        $author = $_POST['author'];
    }

    if(isset($_POST['text'])){
        $text = $_POST['text'];
    }

    if(isset($postId) && isset($author) && isset($text)){
        $sql1 = "INSERT INTO comments (author, text, post_id) VALUES ('$author', '$text', '$postId')";
        $statement1 = $connection->prepare($sql1);
        $statement1->execute();

        header("Location: single-post.php?post_id=$postId");
    }
